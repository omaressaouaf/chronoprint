<x-app-layout :title="$category->slug === 'all' ? '' : $category->meta_title ?? $category->name"
   :description="$category->slug === 'all' ? '' : $category->meta_description"
   :keywords="$category->slug === 'all' ? '' : $category->meta_keywords"
   :canonical="'categories/' . $category->slug">
   <x-layout.breadcrumb :active-page="$category->name" />
   <div class="container pb-5 mb-2 mb-md-4">
      <x-products.filters :products="$products" />
      @if (request('search'))
         <h5 class="ms-3 mt-5 d-flex gap-2 align-items-center">
            {{ __('Search results for') }}
            <span class="text-info">"{{ request('search') }}"</span>
            <a
               href="{{ route('categories.show', ['slug' => request('slug'), 'sort' => request('sort')]) }}">
               <i class="text-danger fs-xs ms-3 ci-close
                    "></i>
            </a>
         </h5>

      @endif
      <div class="row pt-3 mx-n2">
         @foreach ($products as $product)
            <x-products.item :product="$product" />
         @endforeach
      </div>
      <hr class="my-3">
      {{ $products->links() }}
   </div>
</x-app-layout>
