<?php

namespace App\Http\Livewire\Products\Reviews;

use App\Models\Review;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ["reviewAdded" => '$refresh'];

    public Product $product;

    public array $bgColorPerRating = [
        5 => "success",
        4 => "info",
        3 => "primary",
        2 => "warning",
        1 => "danger"
    ];

    public function render()
    {
        return view('livewire.products.reviews.index', [
            "reviewsCount" => $this->product->reviews()->count(),
            "reviews" => $this->product->reviews()->whereActive(1)->latest()->with("user")->paginate(10),
            "reviewsCountPerRating" => $this->product->reviews()->select(DB::raw("rating,count(*) as count"))->whereActive(1)->groupBy("rating")->get()->keyBy("rating")->toArray()
        ]);
    }

    /**
     * Calculates rating percent in total reviews (ex : 3 stars => 20%)
     *
     * @param array $reviewsCountPerRating
     * @param int $rating
     * @return void
     */
    public function calculateRatingPercent(array $reviewsCountPerRating, int $rating): float
    {
        if (!count($this->product->reviews)) return 0;

        return round(
            (isset($reviewsCountPerRating[$rating]) ? $reviewsCountPerRating[$rating]["count"] : 0) * 100
                / count($this->product->reviews),
            2
        );
    }

    /**
     * Delete a product review
     *
     * @param App\Models\Review $review
     * @return void
     */
    public function deleteReview(Review $review): void
    {
        abort_unless($review->user_id === auth()->id() , 403);
        
        $review->delete();
    }
}
