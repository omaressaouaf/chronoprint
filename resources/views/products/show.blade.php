@php
$productTitle = $product->seo_title ?? $product->title;
$productDescription = $product->meta_description ?? $product->details;
@endphp

<x-app-layout :title="$productTitle"
   :description="$productDescription"
   :keywords="$product->meta_keywords"
   :canonical="'products/' . $product->slug"
   :schema-image-url="asset($product->first_image)">
   <x-slot name="schemaGraphs">
      {
      "@type": "Product",
      "name": "{{ $productTitle }}",
      "image": "{{ asset($product->first_image) }}",
      "description": "{{ $productDescription }}",
      "brand": {
      "@type": "Brand",
      "name": "{{ config('app.name') }}"
      },
      "sku": "{{ $product->id }}",
      "offers": {
      "@type": "Offer",
      "url": "{{ config('app.url') }}products/{{ $product->slug }}",
      "priceCurrency": "MAD",
      "price": "{{ $product->allowed_quantities[0]['price'] }}",
      "availability": "https://schema.org/InStock",
      "itemCondition": "https://schema.org/NewCondition"
      }
      }
   </x-slot>
   <x-slot name="schemaBreadcrumbItems">
      @if ($product->category)
         {
         "@type": "ListItem",
         "position": 2,
         "name":"{{ $product->category->seo_title ?? $product->category->name }}",
         "item": "{{ config('app.url') }}categories/{{ $product->category->slug }}"
         },
         {
         "@type": "ListItem",
         "position": 3,
         "name":"{{ $productTitle }}",
         "item": "{{ config('app.url') }}products/{{ $product->slug }}"
         }
      @else
         {
         "@type": "ListItem",
         "position": 2,
         "name":"{{ $productTitle }}",
         "item": "{{ config('app.url') }}products/{{ $product->slug }}"
         }
      @endif
   </x-slot>

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
