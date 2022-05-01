@php
$postTitle = $post->seo_title ?? $post->title;
$postDescription = $post->meta_description ?? $post->excerpt;
@endphp

<x-app-layout :title="$postTitle"
   :description="$postDescription"
   :keywords="$post->meta_keywords"
   :canonical="'blog/' . $post->slug"
   :schema-image-url="asset($post->public_image)">
   <x-slot name="schemaGraphs">
      {
      "@type": "BlogPosting",
      "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "{{ config('app.url') }}blog/{{ $post->slug }}"
      },
      "headline": "{{ $postTitle }}",
      "description": "{{ $postDescription }}",
      "image": "{{ asset($post->public_image) }}",
      "author": {
      "@type": "Organization",
      "name": "{{ config('app.name') }}",
      "url": "{{ config('app.url') }}"
      },
      "publisher": {
      "@type": "Organization",
      "name": "{{ config('app.name') }}",
      "logo": {
      "@type": "ImageObject",
      "url": "{{ config('app.url') }}/theme-images/logo.png"
      }
      },
      "datePublished": "{{ $post->created_at->format('Y-m-d') }}",
      "dateModified": "{{ $post->updated_at->format('Y-m-d') }}"
      }
   </x-slot>
   <x-slot name="schemaBreadcrumbItems">
      {
      "@type": "ListItem",
      "position": 2,
      "name": "Blog",
      "item": "{{ config('app.url') }}blog"
      },
      {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $postTitle }}",
      "item": "{{ config('app.url') }}blog/{{ $post->slug }}"
      }
   </x-slot>

   <x-layout.breadcrumb :dark="false"
      :active-page="$post->title">
      <li class="breadcrumb-item text-nowrap">
         <a href="{{ route('blog.index') }}">
            {{ __('Blog') }}
         </a>
      </li>
   </x-layout.breadcrumb>
   <div class="container pb-5">
      <div class="row justify-content-center pt-5 mt-md-2">
         <article class="col-lg-9">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mt-n1">
               <div class="d-flex align-items-center fs-sm mb-2"><a class="blog-entry-meta-link"
                     href="#">
                     <div class="blog-entry-author-ava">
                        <img src="/theme-images/icon.png"
                           alt="{{ config('app.name') }}">
                     </div>
                     {{ config('app.name') }}
                  </a><span class="blog-entry-meta-divider"></span><a class="blog-entry-meta-link"
                     href="#">{{ $post->created_at->translatedFormat('M d Y') }}</a></div>
            </div>
            <div class="row pb-2">
               <div class="col-sm-12">
                  <a class="rounded-3 mb-grid-gutter"
                     href="{{ $post->public_image }}"><img class="w-100"
                        id="primary-image-1"
                        src="{{ $post->public_image }}"
                        alt="{{ $post->title }}">
                  </a>
               </div>
            </div>
            <div class="overflow-auto">
               {!! $post->body !!}
            </div>
         </article>
      </div>
   </div>
   <!-- Related posts-->
   <div class="bg-secondary py-5">
      <div class="container py-3">
         <h2 class="h4 text-center pb-4">{{ __('You may also like') }}</h2>
         <div class="tns-carousel">
            <div class="tns-carousel-inner"
               data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;900&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 30}}}">
               @foreach ($relatedPosts as $post)
                  <article><a class="blog-entry-thumb mb-3"
                        href="{{ route('blog.show', ['post' => $post->slug]) }}"><img
                           style="max-height: 230px; object-fit: cover"
                           src="{{ $post->public_image }}"
                           alt="{{ $post->title }}"></a>
                     <div class="d-flex align-items-center fs-sm mb-2">
                        <span class="blog-entry-meta-divider"></span><a class="blog-entry-meta-link"
                           href="#">{{ $post->created_at->translatedFormat('M d Y') }}</a>
                     </div>
                     <h3 class="h6 blog-entry-title"><a
                           href="{{ route('blog.show', ['post' => $post->slug]) }}">
                           {{ $post->title }}
                        </a></h3>
                  </article>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
