<section class="col-lg-8">
   <!-- User info-->
   <div
      class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
      <div class="d-flex align-items-center">
         <div class="img-thumbnail rounded-circle position-relative flex-shrink-0">
            <img class="rounded-circle"
               src="/storage/{{ auth()->user()->avatar }}"
               width="90"
               alt="{{ auth()->user()->name }}">
         </div>
         <div class="ps-3">
            <h3 class="fs-base mb-0">{{ auth()->user()->name }}</h3>
            <span class="text-accent fs-sm">{{ auth()->user()->email }}</span>
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
               <select class="form-select"
                  id="checkout-country">
                  <option>New York . main street No.223. souafomar@gmail.com</option>
                  <option>New York . main street No.223. souafomar@gmail.com</option>
               </select>
            </div>
            <div class="col-md-3 ps-md-0 mt-2 mt-md-0">
               <button class="btn btn-primary w-100">Add address</button>
            </div>
         </div>
         <div class="px-4 py-3 border rounded-3 position-relative">
            <h6>
               <span
                  class="badge bg-success position-absolute top-0 end-0">{{ __('Free delivery') }}</span>
            </h6>
            <h6 class="mb-3">Omar Essaouaf</h6>
            <p class="fs-sm mb-1"> <i class="ci-location me-2"></i>NR 75 RUE DAR EL MILOUDI A M
               , CASABLANCA, Florida,</p>
            <p class="fs-sm mb-1"><i class="ci-phone me-2"></i>Téléphone: 0625716365</p>
            <p class="fs-sm"><i class="ci-mail me-2"></i>E-mail: souafomar@gmail.com</p>
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
               placeholder="{{ __('Write a comment or instruction about this order ...') }}"></textarea>
            <label
               for="fl-textarea">{{ __('Write a comment or instruction about this order ...') }}</label>
         </div>
      </div>
   </div>
   <h6 class="pt-1 pb-3 mb-3 border-bottom">{{ __('Payment method') }}</h6>
   <div class="row">
      <div class="col-md-12">
         <div class="accordion mb-2"
            id="payment-method">
            <div class="accordion-item">
               <h3 class="accordion-header"><a class="accordion-button"
                     href="#card"
                     data-bs-toggle="collapse"><i
                        class="ci-card fs-lg me-2 mt-n1 align-middle"></i>Pay
                     with Credit Card</a></h3>
               <div class="accordion-collapse collapse show"
                  id="card"
                  data-bs-parent="#payment-method">
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
                     <p class="fs-sm">In the event of an incident, you will be
                        automatically
                        reimbursed.
                        To complete your payment, make sure that your card is active for online
                        transactions, that you know your PIN and that your phone is ready to receive
                        an
                        SMS from your Bank.
                        You have 10 minutes to complete your payment, otherwise the action will be
                        automatically canceled.</p>
                  </div>
               </div>
            </div>
            <div class="accordion-item">
               <h3 class="accordion-header"><a class="accordion-button collapsed"
                     href="#points"
                     data-bs-toggle="collapse"><i
                        class="ci-delivery me-2"></i>{{ __('Cash on Delivery') }}</a></h3>
               <div class="accordion-collapse collapse"
                  id="points"
                  data-bs-parent="#payment-method">
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
            {{ __('I understand correctly that my document will be printed exactly as it appears here. I cannot make any changes once my order has been placed and I take full responsibility for any typographical or design errors.') }}
         </p>
      </div>
   </div>
   <button type="submit"
      class="btn btn-primary d-block w-100 mt-4">
      {{ __('Complete your order') }}
   </button>

</section>
