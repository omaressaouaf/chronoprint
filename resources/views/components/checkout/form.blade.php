<section class="col-lg-8">
   <!-- User info-->
   <div
      class="d-sm-flex justify-content-between align-items-center bg-white rounded-3 shadow-sm p-4 rounded-3 mb-grid-gutter">
      <div class="d-flex align-items-center">
         <div class="position-relative flex-shrink-0">
            <img class="rounded-circle"
               src="/storage/{{ auth()->user()->avatar }}"
               width="90"
               alt="{{ auth()->user()->name }}">
         </div>
         <div class="ps-3">
            <h3 class="fs-base mb-1 text-capitalize">{{ auth()->user()->name }}</h3>
            <span class="text-accent fs-sm">{{ auth()->user()->email }}
            </span>
         </div>
      </div>
      <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0"
         href="{{ route('account.profile') }}">
         <i class="ci-edit me-2"></i>
         {{ __('Edit profile') }}
      </a>
   </div>
   <form action="/checkout"
      method="POST">
      @csrf
      <x-base.alerts />
      <h6 class="pt-1 pb-3 mb-3 border-bottom">{{ __('Delivery address') }}</h6>
      <div class="row mb-4">
         <div class="col-sm-12">
            <div class="row mb-3">
               <div class="col-md-9">
                  <select x-show="authUserAddresses.length"
                     x-on:change="setSelectedAddress($event.target.value)"
                     name="address_id"
                     class="form-select"
                     id="checkout-country">
                     <template x-for="address in authUserAddresses">
                        <option x-text="address.city + ', ' + address.line + ', ' + address.phone"
                           x-bind:value="address.id"
                           class="text-capitalize">
                        </option>
                     </template>
                  </select>
               </div>
               <div class="col-md-3 ps-md-0 mt-2 mt-md-0">
                  <button data-bs-target="#address-form-modal"
                     data-bs-toggle="modal"
                     type="button"
                     class="btn btn-primary w-100">{{ __('Add address') }}</button>
               </div>
            </div>
            <div x-show="selectedAddress.id"
               class="px-4 py-3 border rounded-3 position-relative">
               <h6>
                  <span x-show="selectedAddress.city == 'casablanca'"
                     class="badge bg-success position-absolute top-0 end-0">{{ __('Free delivery') }}</span>
               </h6>
               <h6 x-text="selectedAddress.name"
                  class="mb-3">
               </h6>
               <p class="fs-sm mb-1"> <i class="ci-location me-2"></i>{{ __('Address') }}:
                  <span
                     x-text="selectedAddress.city + ', ' + selectedAddress.line + ', ' + selectedAddress.zip"
                     class="text-capitalize"></span>
               </p>
               <p class="fs-sm mb-1"><i class="ci-phone me-2"></i>{{ __('Phone') }}:
                  <span x-text="selectedAddress.phone"></span>
               </p>
               <p class="fs-sm"><i class="ci-mail me-2"></i>{{ __('Email') }}:
                  <span x-text="selectedAddress.email"></span>
               </p>
            </div>
         </div>
      </div>
      <h6 class="pt-1 pb-3 mb-3 border-bottom">{{ __('Additional information') }}</h6>
      <div class="row mb-4">
         <div class="col-sm-12">
            <div class="form-floating">
               <textarea name="additional_information"
                  class="form-control"
                  id="fl-textarea"
                  style="height: 120px;"
                  placeholder="{{ __('Write a comment or instructions about this order') }} ..."></textarea>
               <label
                  for="fl-textarea">{{ __('Write a comment or instructions about this order') }}
                  ...</label>
            </div>
         </div>
      </div>
      <h6 class="pt-1 pb-3 mb-3 border-bottom">{{ __('Payment mode') }}</h6>
      <div class="row">
         <div class="col-md-12">
            <div class="accordion mb-2"
               id="payment-mode">
               <div class="accordion-item border-bottom">
                  <div class="accordion-header border-bottom p-3">
                     <div class="form-check"
                        data-bs-toggle="collapse"
                        data-bs-target="#credit-card-collapse"
                        aria-expanded="true">
                        <input name="payment_mode"
                           value="credit_card"
                           id="credit-card"
                           class="form-check-input"
                           type="radio"
                           checked>
                        <label class="form-check-label fw-medium"
                           for="credit-card">
                           {{ __('Pay with credit card') }}
                           <i class="ci-card text-muted fs-lg mt-n1 ms-2"></i>
                        </label>
                     </div>
                  </div>
                  <div class="accordion-collapse collapse show"
                     id="credit-card-collapse"
                     data-bs-parent="#payment-mode">
                     <div class="accordion-body">
                        <p class="fs-sm">{{ __('Secure online payment with CMI') }} :
                           <img class="d-inline-block align-middle ms-2"
                              src="/theme-images/cards.png"
                              width="187"
                              alt="Cerdit Cards">
                        </p>
                        <img src="/theme-images/credit_card.svg"
                           width="300"
                           height="300"
                           class="mb-3"
                           alt="carte bancaire">
                        <p class="fs-sm">
                           {{ __('if something wrong happened, you will be automatically reimbursed. To complete your payment, make sure that your card is active for online transactions. You have few minutes to complete your payment, otherwise the action will be automatically canceled') }}
                        </p>
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <div class="accordion-header border-bottom p-3">
                     <div class="form-check"
                        data-bs-toggle="collapse"
                        data-bs-target="#cash-collapse"
                        aria-expanded="true">
                        <input name="payment_mode"
                           value="cash"
                           id="cash"
                           class="form-check-input"
                           type="radio">
                        <label class="form-check-label fw-medium"
                           for="cash">
                           {{ __('Cash on delivery') }}
                           <i class="ci-delivery text-muted fs-lg mt-n1 ms-2"></i>
                        </label>
                     </div>
                  </div>
                  <div class="accordion-collapse collapse"
                     id="cash-collapse"
                     data-bs-parent="#payment-mode">
                     <div class="accordion-body">
                        <p class="fs-sm">
                           {{ __('You will pay with cash once the order is confirmed and delivered to your doorsteps') }}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mt-4 px-1">
         <div class="col-md-12">
            <p class="fs-sm">
               <i class="ci-announcement me-2 text-info fw-bold"></i>
               {{ __('I understand that my files will be printed exactly as it appears here. I cannot make any changes once my order has been placed and I take full responsibility for any of my design errors') }}
            </p>
            <p class="fs-sm mt-4">
               <i class="ci-announcement me-2 text-info fw-bold"></i>
               {{ __('Your personal data will be used to process your order, support your experience on this website and for other purposes described in our') }}
               <a href="{{ route('privacy-policy') }}">{{ __('Privacy policy') }}</a>
            </p>
         </div>
      </div>
      <button type="submit"
         class="btn btn-primary d-block w-100 mt-4">
         {{ __('Complete your order') }}
      </button>
   </form>
   <livewire:addresses.form />
</section>
