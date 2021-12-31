<div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
   <div class="px-lg-3">
      <div class="row">
         {{-- Product Gallery --}}
         <div class="col-lg-6 pe-lg-0 pt-lg-4">
            <div class="product-gallery">
               <div class="product-gallery-preview order-sm-2">
                  @foreach ($product->all_images as $image)
                     <div class="product-gallery-preview-item @if ($loop->first) active @endif"
                          id="image-{{ $loop->index }}">
                        <img class="image-zoom"
                             src="{{ $image }}"
                             data-zoom="{{ $image }}"
                             alt="{{ $product->title }}">
                        <div class="image-zoom-pane"></div>
                     </div>
                  @endforeach
               </div>
               <div class="product-gallery-thumblist order-sm-1">
                  @foreach ($product->all_images as $image)
                     <a class="product-gallery-thumblist-item @if ($loop->first) active @endif"
                        href="#image-{{ $loop->index }}">
                        <img src="{{ $image }}"
                             alt="{{ $product->title }}">
                     </a>
                  @endforeach

               </div>
            </div>

         </div>

         <div class="col-lg-6 pt-4 pt-lg-0">
            <div class="pb-3">
               <div class="d-flex justify-content-between align-items-center mb-2 px-3 px-lg-5"><a
                     href="#reviews"
                     data-scroll>
                     <div class="star-rating"><i
                           class="star-rating-icon ci-star-filled active"></i><i
                           class="star-rating-icon ci-star-filled active"></i><i
                           class="star-rating-icon ci-star-filled active"></i><i
                           class="star-rating-icon ci-star-filled active"></i><i
                           class="star-rating-icon ci-star"></i>
                     </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                        Reviews</span>
                  </a>
               </div>
               @if ($product->promotion_label)
                  <div class="position-relative me-n4 mb-5">
                     <div class="product-badge product-available mt-n1">
                        {{ $product->promotion_label }}</div>
                  </div>
               @endif
               <div class="px-lg-4">
                  <div class="mb-4">
                     <div>
                        <h3 class="accordion-header"><a class="accordion-button"
                              href="#product-details"
                              role="button"
                              data-bs-toggle="collapse"
                              aria-expanded="true"
                              aria-controls="product-details">
                              {{ __('Product details') }}
                           </a></h3>
                        <div class="accordion-collapse collapse show"
                             id="product-details"
                             data-bs-parent="#productPanels">
                           <div class="accordion-body">
                              {{ $product->details }}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="mb-4">
                     <div>
                        <h3 class="accordion-header"><a class="accordion-button"
                              href="#product-price-calculator"
                              role="button"
                              data-bs-toggle="collapse"
                              aria-expanded="true"
                              aria-controls="product-price-calculator">
                              {{ __('Price calculator') }}
                           </a></h3>
                        <div class="accordion-collapse collapse show"
                             id="product-price-calculator"
                             data-bs-parent="#productPanels">
                           <div class="accordion-body">

                              <form class="mb-grid-gutter"
                                    method="post">
                                 <div class="mb-3">
                                    <div
                                         class="d-flex justify-content-between align-items-center pb-1">
                                       <label class="form-label"
                                              for="product-size">Size:</label><a
                                          class="nav-link-style fs-sm"
                                          href="#size-chart"
                                          data-bs-toggle="modal"><i
                                             class="ci-ruler lead align-middle me-1 mt-n1"></i>Size
                                          guide</a>
                                    </div>
                                    <select class="form-select"
                                            required
                                            id="product-size">
                                       <option value="">Select size</option>
                                       <option value="xs">XS</option>
                                       <option value="s">S</option>
                                       <option value="m">M</option>
                                       <option value="l">L</option>
                                       <option value="xl">XL</option>
                                    </select>
                                 </div>
                                 <div class="mb-3 d-flex align-items-center">
                                    <select class="form-select me-3"
                                            style="width: 5rem;">
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                    </select>
                                    <button class="btn btn-primary d-block w-100"
                                            type="submit"><i class="ci-cart fs-lg me-2"></i>Add to
                                       Cart</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@if ($product->description)
   <section class="container mb-4 mb-lg-5">
      <ul class="nav nav-tabs"
          role="tablist">
         <li class="nav-item"><a class="nav-link p-4 active"
               href="#details"
               data-bs-toggle="tab"
               role="tab">{{ __('Product description') }}</a></li>
      </ul>
      <div class="tab-content pt-2">
         <div class="tab-pane fade show active"
              id="details"
              role="tabpanel">
            <div class="row">
               <div class="col-lg-8">
                  {!! $product->description !!}
               </div>
            </div>
         </div>
      </div>
   </section>
@endif
