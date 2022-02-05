<x-app-layout :title="$product->seo_title ?? $product->title"
   :description="$product->meta_description"
   :keywords="$product->meta_keywords"
   :canonical="'products/' . $product->slug">
   <x-layout.breadcrumb :active-page="$product->title">
      @if ($product->category)
         <li class="breadcrumb-item text-nowrap">
            <a href="{{ route('categories.show', ['slug' => $product->category->slug]) }}">
               {{ $product->category->name }}
            </a>
         </li>
      @endif
   </x-layout.breadcrumb>

   <div class="container">
      <x-products.single :product="$product" />
   </div>
</x-app-layout>
