<x-app-layout title="Notre blog"
   description="Découvrez des sujets intéressants concernant l'industrie de l'imprimerie. et nos conseils en matière d'impression de produits tels que des cartes de visite et des flyers, etc."
   canonical="blog">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('Blog')" />

   <div class="container pb-5 mb-2 mb-md-4">
      <!-- Popular posts carousel-->
      <div class="featured-posts-carousel tns-carousel pt-5">
         <div class="tns-carousel-inner"
            data-carousel-options="{&quot;items&quot;: 2, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;700&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;991&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 30}}}">
            @foreach ($popularPosts as $post)
               <article>
                  <a class="blog-entry-thumb mb-3"
                     href="{{ route('blog.show', ['post' => $post->slug]) }}">
                     <span class="blog-entry-meta-label fs-sm">
                        <i class="ci-time"></i>
                        {{ $post->created_at->translatedFormat('M d Y') }}
                     </span>
                     <img src="{{ $post->public_image }}"
                        style="max-height: 367px; object-fit: cover"
                        alt="{{ $post->title }}"></a>
                  <div class="d-flex justify-content-between mb-2 pt-1">
                     <h2 class="h5 blog-entry-title mb-0">
                        <a href="{{ route('blog.show', ['post' => $post->slug]) }}">
                           {{ $post->title }}
                        </a>
                  </div>
               </article>
            @endforeach
         </div>
      </div>
      <hr class="mt-5">
      <div class="row pt-5 mt-2">
         <section class="col-lg-8">
            @foreach ($posts as $post)
               <article class="blog-list border-bottom pb-4 mb-5">
                  <div class="blog-start-column">
                     <div class="d-flex align-items-center fs-sm pb-2 mb-1"><a
                           class="blog-entry-meta-link"
                           href="#">
                           <div class="blog-entry-author-ava"><img src="/storage/theme/icon.svg"
                                 alt="{{ config('app.name') }}"></div>{{ config('app.name') }}
                        </a>
                        <span class="blog-entry-meta-divider"></span>
                        <a class="blog-entry-meta-link"
                           href="#">{{ $post->created_at->translatedFormat('M d Y') }}</a>
                     </div>
                     <h2 class="h5 blog-entry-title">
                        <a href="{{ route('blog.show', ['post' => $post->slug]) }}">
                           {{ $post->title }}
                        </a>
                     </h2>
                  </div>
                  <div class="blog-end-column">
                     <a class="blog-entry-thumb mb-3"
                        href="{{ route('blog.show', ['post' => $post->slug]) }}">
                        <img src="{{ $post->public_image }}"
                           alt="{{ $post->title }}"></a>
                     <p class="fs-sm">
                        {{ $post->excerpt }}…
                        <a href="{{ route('blog.show', ['post' => $post->slug]) }}"
                           class="blog-entry-meta-link fw-medium">{{ __('Read more') }}</a>
                     </p>
                  </div>
               </article>
            @endforeach
            {{ $posts->links() }}
         </section>
         <aside class="col-lg-4">
            <!-- Sidebar-->
            <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto"
               id="blog-sidebar"
               style="max-width: 22rem;">
               <div class="offcanvas-header align-items-center shadow-sm">
                  <h2 class="h5 mb-0">Sidebar</h2>
                  <button class="btn-close ms-auto"
                     type="button"
                     data-bs-dismiss="offcanvas"
                     aria-label="Close"></button>
               </div>
               <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4"
                  data-simplebar="init"
                  data-simplebar-auto-hide="true">
                  <div class="simplebar-wrapper"
                     style="margin: -30px -24px;">
                     <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                     </div>
                     <div class="simplebar-mask">
                        <div class="simplebar-offset"
                           style="right: 0px; bottom: 0px;">
                           <div class="simplebar-content-wrapper"
                              style="height: 100%; overflow: hidden scroll;">
                              <div class="simplebar-content"
                                 style="padding: 30px 24px;">
                                 <!-- Popular posts-->
                                 <div
                                    class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
                                    <h3 class="widget-title">{{ __('Popular posts') }}</h3>
                                    @foreach ($popularPosts as $post)
                                       @if ($loop->index < 5)
                                          <div class="d-flex align-items-center mb-3">
                                             <a class="flex-shrink-0"
                                                href="{{ route('blog.show', ['post' => $post->slug]) }}"><img
                                                   class="rounded"
                                                   src="{{ $post->public_image }}"
                                                   width="64"
                                                   alt="{{ $post->title }}"></a>
                                             <div class="ps-3">
                                                <h6 class="blog-entry-title fs-sm mb-0"><a
                                                      href="{{ route('blog.show', ['post' => $post->slug]) }}">
                                                      {{ $post->title }}
                                                   </a>
                                                </h6>
                                             </div>
                                          </div>
                                       @endif
                                    @endforeach
                                 </div>
                                 <!-- Promo banner-->
                                 <div
                                    class="bg-size-cover bg-position-center rounded-3 py-5 mx-lg-2"
                                    style="background-image: url(/storage/theme/banners/banner-bg.jpg);">
                                    <div class="py-5 px-4 text-center">
                                       <h5 class="mb-2">
                                          {{ __('Check out our products') }}</h5>
                                       <p class="fs-sm text-muted">
                                          {{ __('Numeric and paper printing and more ..') }}
                                       </p><a class="btn btn-accent btn-shadow btn-sm"
                                          href="{{ route('categories.show', ['slug' => 'all']) }}">{{ __('Shop now') }}</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="simplebar-placeholder"
                        style="width: auto; height: 1176px;"></div>
                  </div>
                  <div class="simplebar-track simplebar-horizontal"
                     style="visibility: hidden;">
                     <div class="simplebar-scrollbar"
                        style="width: 0px; display: none;"></div>
                  </div>
                  <div class="simplebar-track simplebar-vertical"
                     style="visibility: visible;">
                     <div class="simplebar-scrollbar"
                        style="height: 438px; display: block; transform: translate3d(0px, 0px, 0px);">
                     </div>
                  </div>
               </div>
            </div>
         </aside>
      </div>
   </div>
</x-app-layout>
