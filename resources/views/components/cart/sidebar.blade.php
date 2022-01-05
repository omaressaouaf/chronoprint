@props(['cart'])

<div class="bg-white rounded-3 shadow-lg p-4">
   <div class="py-2 px-xl-2">
      <div class="d-flex justify-content-between mb-2 pb-1 border-bottom">
         <h6 class="mb-3 pb-1">{{ __('Subtotal') }}</h6>
         <h6 class="fw-normal">{{ formatPrice($cart->subtotal) }} <small>Dhs</small></h6>
      </div>
      @if ($cart->discount_price)
         <div class="d-flex justify-content-between mb-2 pb-1 border-bottom">
            <h6 class="mb-3 pb-1">{{ __('Discount') }}</h6>
            <h6 class="fw-normal text-success">- {{ formatPrice($cart->discount_price) }}
               <small>Dhs</small>
            </h6>
         </div>
      @endif
      <div class="d-flex justify-content-between mb-2 pb-1 border-bottom">
         <h6 class="mb-3 pb-1">{{ __('TVA') }}</h6>
         <h6 class="fw-normal">+ {{ formatPrice($cart->getTaxPrice()) }} <small>Dhs</small>
         </h6>
      </div>
      <div class="d-flex justify-content-between mb-4 pb-1 border-bottom">
         <h6 class="mb-3 pb-1">{{ __('Total') }}</h6>
         <h5 class="fw-normal">{{ formatPrice($cart->getTotal()) }} <small>Dhs</small></h5>
      </div>
      <div class="accordion"
         id="order-options">
         <div class="accordion-item">
            <h3 class="accordion-header"><a class="accordion-button"
                  href="#promo-code"
                  role="button"
                  data-bs-toggle="collapse"
                  aria-expanded="true"
                  aria-controls="promo-code">{{ __('Apply coupon code') }}</a></h3>
            <div class="accordion-collapse collapse show"
               id="promo-code"
               data-bs-parent="#order-options">
               <form class="accordion-body needs-validation"
                  method="post"
                  novalidate>
                  <div class="mb-3">
                     <input class="form-control"
                        type="text"
                        placeholder="{{ __('Coupon code') }}"
                        required>
                     <div class="invalid-feedback">Please provide promo code.</div>
                  </div>
                  <button class="btn btn-outline-primary d-block w-100"
                     type="submit">{{ __('Apply') }}</button>
               </form>
            </div>
         </div>
      </div><a class="btn btn-primary btn-shadow d-block w-100 mt-4"
         href="checkout-details.html"><i
            class="ci-card fs-lg me-2"></i>{{ __('Proceed to checkout') }}</a>
   </div>
</div>
