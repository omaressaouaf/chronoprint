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
                        <img class="image-zoom rounded-3"
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
                  {{-- Product details --}}
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
                              {!! $product->details !!}
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- Product Attributes & Quantity calculator --}}

                  {{-- <div>
                     <div>
                        <h3 class="accordion-header">
                           <a class="accordion-button"
                              href="#product-price-calculator"
                              role="button"
                              data-bs-toggle="collapse"
                              aria-expanded="true"
                              aria-controls="product-price-calculator">
                              {{ __('Price calculator') }}
                           </a>
                        </h3>
                        <div class="accordion-collapse collapse show"
                           id="product-price-calculator"
                           data-bs-parent="#productPanels">
                           <div class="accordion-body">
                              <form method="post">
                                 <div class="row">
                                    <div class="col-md-12 mb-4">
                                       <div
                                          class="d-flex justify-content-between align-items-center pb-1">
                                          <label class="form-label"
                                             for="product-size">{{ __('Quantity') }}</label>
                                       </div>
                                       @if ($product->allowed_quantities)
                                          <select class="form-select"
                                             required
                                             id="product-size">
                                             @foreach ($product->allowed_quantities as $quantity)
                                                <option value="xs">{{ $quantity }}</option>
                                             @endforeach
                                          </select>
                                       @else
                                          <input type="text"
                                             class="form-control"
                                             placeholder="{{ __('Quantity') }}">
                                       @endif
                                    </div>
                                    @foreach ($product->attributes as $attribute)
                                       <div class="col-md-6 mb-4">
                                          <div
                                             class="d-flex justify-content-between align-items-center pb-1">
                                             <label class="form-label"
                                                for="product-size">{{ $attribute->label }}:</label>
                                          </div>
                                          <select class="form-select"
                                             required
                                             id="product-size">
                                             @foreach ($attribute->pivot->options as $option)
                                                <option value="xs">{{ $option['name'] }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    @endforeach
                                    <div class="col-md-12">
                                       <div class="form-check mt-4">
                                          <input type="checkbox"
                                             class="form-check-input"
                                             id="design-by-company">
                                          <label class="form-label"
                                             for="design-by-company">{{ __('Do you want us to do the design ?') }}</label>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr class="mx-2 mb-4 mt-2">
                  <div class="px-3">
                     <div class="mb-4">
                        <h5 class="">{{ __('Total price') }} :
                           <span>50 Dhs HT</span>
                        </h5>
                        <h6 class="text-sm text-danger">{{ __('Unit price') }} :
                           <span>2 Dhs HT</span>
                        </h6>
                     </div>
                     <div>
                        <button class="btn btn-primary w-100 mb-4"
                           type="submit">
                           <i class="ci-upload fs-lg me-2"></i>
                           {{ __('Import your files') }}
                        </button>
                        <button class="btn btn-accent w-100"
                           type="submit">
                           <i class="ci-add-circle fs-lg me-2"></i>
                           {{ __('Continue here') }}
                        </button>
                     </div>
                  </div> --}}
                  @livewire('products.price-calculator', ['product' => $product])
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

{{-- Product description --}}
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
