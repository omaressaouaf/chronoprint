@extends('layouts.app')

@section('content')
    @include('partials.shop.category-hero' , ["category" => $category])
    <div class="container pb-5 mb-2 mb-md-4">
        @include('partials.shop.filters' , ["products" => $products])
        @if (request('search'))
            <h5 class="ms-3 mt-5 d-flex gap-2 align-items-center">
                {{ __('Search results for') }}
                <span class="text-info">"{{ request('search') }}"</span>
                <a href="{{ route('categories.show', ['slug' => request('slug'), 'sort' => request('sort')]) }}">
                    <i class="text-danger text-sm ms-3 ci-close
                    "></i>
                </a>
            </h5>

        @endif
        <div class="row pt-3 mx-n2">
            @foreach ($products as $product)
                @include('partials.shop.product-item' , ["product" => $product])
            @endforeach
        </div>
        <hr class="my-3">
        {{ $products->links() }}
    </div>
@endsection
