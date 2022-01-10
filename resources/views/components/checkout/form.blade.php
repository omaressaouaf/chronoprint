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
               <span class="fs-xs"> ({{ __('Billing email') }})</span>
            </span>
         </div>
      </div>
      <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0"
         href="account-profile.html">
         <i class="ci-edit me-2"></i>
         {{ __('Edit profile') }}
      </a>
   </div>

   <h6 class="pt-1 pb-3 mb-3 border-bottom">{{ __('Delivery address') }}</h6>
   <div class="row mb-4">
      <div class="col-sm-12">
         <div class="row mb-3">
            <div class="col-md-9">
               <select x-show="authUserAddresses.length"
                  x-on:change="setSelectedAddress($event.target.value)"
                  class="form-select"
                  id="checkout-country">
                  <template x-for="address in authUserAddresses">
                     <option x-text="address.city + ' ' + address.line + ' ' + address.phone"
                        x-bind:value="address.id"
                        class="text-capitalize">
                     </option>
                  </template>
               </select>
            </div>
            <div class="col-md-3 ps-md-0 mt-2 mt-md-0">
               <button data-bs-target="#address-form-modal"
                  data-bs-toggle="modal"
                  class="btn btn-primary w-100">{{ __('Add address') }}</button>
               <livewire:addresses.form />
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
            <p class="fs-sm mb-1"> <i class="ci-location me-2"></i>
               {{ __('Address') }}:
               <span
                  x-text="selectedAddress.city + ' ' + selectedAddress.line + ' ' + selectedAddress.zip"
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
            <textarea class="form-control"
               id="fl-textarea"
               style="height: 120px;"
               placeholder="{{ __('Write a comment or instructions about this order') }} ..."></textarea>
            <label for="fl-textarea">{{ __('Write a comment or instructions about this order') }}
               ...</label>
         </div>
      </div>
   </div>
   <h6 class="pt-1 pb-3 mb-3 border-bottom">{{ __('Payment mode') }}</h6>
   <div class="row">
      <div class="col-md-12">
         <div x-data
            class="accordion mb-2"
            id="payment-mode">
            <div class="accordion-item">
               <h3 class="accordion-header">
                  <a x-on:click="$refs.creditCard.checked = true"
                     href="#credit-card-collapse"
                     data-bs-toggle="collapse"
                     class="accordion-button">
                     <div class="form-check">
                        <input class="form-check-input"
                           checked
                           type="radio"
                           x-ref="creditCard"
                           id="credit-card"
                           name="payment_mode">
                        <label class="form-check-label"
                           for="credit-card">
                           {{ __('Pay with credit card') }}
                        </label>
                     </div>
                  </a>
               </h3>
               <div class="accordion-collapse collapse show"
                  id="credit-card-collapse"
                  data-bs-parent="#payment-mode">
                  <div class="accordion-body">
                     <p class="fs-sm">{{ __('Secure online payment with CMI') }} :
                        <img class="d-inline-block align-middle ms-2"
                           src="/storage/theme/cards.png"
                           width="187"
                           alt="Cerdit Cards">
                     </p>
                     <div class="credit-card-wrapper"></div>
                     <form class="credit-card-form row d-none">
                        <div class="mb-3 col-sm-6">
                           <input class="form-control"
                              type="text"
                              name="number"
                              placeholder="Card Number"
                              required>
                        </div>
                        <div class="mb-3 col-sm-6">
                           <input class="form-control"
                              type="text"
                              name="name"
                              placeholder="Full Name"
                              required>
                        </div>
                        <div class="mb-3 col-sm-3">
                           <input class="form-control"
                              type="text"
                              name="expiry"
                              placeholder="MM/YY"
                              required>
                        </div>
                        <div class="mb-3 col-sm-3">
                           <input class="form-control"
                              type="text"
                              name="cvc"
                              placeholder="CVC"
                              required>
                        </div>
                        <div class="col-sm-6">
                           <button class="btn btn-outline-primary d-block w-100 mt-0"
                              type="submit">Submit</button>
                        </div>
                     </form>
                     <p class="fs-sm">
                        {{ __('if something wrong happened, you will be automatically reimbursed. To complete your
                                                                                                                                                                                                                                                                                                                                                                                                                                                payment, make sure that your card is active for online transactions. You have few minutes to
                                                                                                                                                                                                                                                                                                                                                                                                                                                complete your payment, otherwise the action will be automatically canceled') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h3 class="accordion-header">
                  <a x-on:click="$refs.cash.checked = true"
                     class="accordion-button collapsed"
                     href="#cash-collapse"
                     data-bs-toggle="collapse">
                     <div class="form-check">
                        <input class="form-check-input"
                           type="radio"
                           x-ref="cash"
                           id="cash"
                           name="payment_mode">
                        <label class="form-check-label"
                           for="cash">
                           {{ __('Cash on delivery') }}
                        </label>
                     </div>
                  </a>
               </h3>
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
            {{ __('I understand that my files will be printed exactly as it appears here. I cannot make any changes once
                                                                                                                                                                                                                        my order has been placed and I take full responsibility for any of my design errors') }}
         </p>
      </div>
   </div>
   <button type="submit"
      class="btn btn-primary d-block w-100 mt-4">
      {{ __('Complete your order') }}
   </button>

</section>
