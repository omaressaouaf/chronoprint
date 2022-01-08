<div class="border-top border-bottom my-lg-3 py-5">
   <div class="container pt-md-2"
      id="reviews">
      <div class="row pb-3">
         <div class="col-lg-4 col-md-5">
            <h2 class="h3 mb-4">74 {{ __('Reviews') }}</h2>
            <div class="star-rating me-2">
               <i class="ci-star-filled fs-sm text-accent me-1"></i><i
                  class="ci-star-filled fs-sm text-accent me-1"></i><i
                  class="ci-star-filled fs-sm text-accent me-1"></i><i
                  class="ci-star-filled fs-sm text-accent me-1"></i><i
                  class="ci-star fs-sm text-muted me-1"></i>
            </div>
            <span class="d-inline-block align-middle">4.1 {{ __('Overall rating') }}</span>
         </div>
         <div class="col-lg-8 col-md-7">
            <div class="d-flex align-items-center mb-2">
               <div class="text-nowrap me-3">
                  <span class="d-inline-block align-middle text-muted">5</span><i
                     class="ci-star-filled fs-xs ms-1"></i>
               </div>
               <div class="w-100">
                  <div class="progress"
                     style="height: 4px">
                     <div class="progress-bar bg-success"
                        role="progressbar"
                        style="width: 60%"
                        aria-valuenow="60"
                        aria-valuemin="0"
                        aria-valuemax="100"></div>
                  </div>
               </div>
               <span class="text-muted ms-3">43</span>
            </div>
            <div class="d-flex align-items-center mb-2">
               <div class="text-nowrap me-3">
                  <span class="d-inline-block align-middle text-muted">4</span><i
                     class="ci-star-filled fs-xs ms-1"></i>
               </div>
               <div class="w-100">
                  <div class="progress"
                     style="height: 4px">
                     <div class="progress-bar"
                        role="progressbar"
                        style="width: 27%; background-color: #a7e453"
                        aria-valuenow="27"
                        aria-valuemin="0"
                        aria-valuemax="100"></div>
                  </div>
               </div>
               <span class="text-muted ms-3">16</span>
            </div>
            <div class="d-flex align-items-center mb-2">
               <div class="text-nowrap me-3">
                  <span class="d-inline-block align-middle text-muted">3</span><i
                     class="ci-star-filled fs-xs ms-1"></i>
               </div>
               <div class="w-100">
                  <div class="progress"
                     style="height: 4px">
                     <div class="progress-bar"
                        role="progressbar"
                        style="width: 17%; background-color: #ffda75"
                        aria-valuenow="17"
                        aria-valuemin="0"
                        aria-valuemax="100"></div>
                  </div>
               </div>
               <span class="text-muted ms-3">9</span>
            </div>
            <div class="d-flex align-items-center mb-2">
               <div class="text-nowrap me-3">
                  <span class="d-inline-block align-middle text-muted">2</span><i
                     class="ci-star-filled fs-xs ms-1"></i>
               </div>
               <div class="w-100">
                  <div class="progress"
                     style="height: 4px">
                     <div class="progress-bar"
                        role="progressbar"
                        style="width: 9%; background-color: #fea569"
                        aria-valuenow="9"
                        aria-valuemin="0"
                        aria-valuemax="100"></div>
                  </div>
               </div>
               <span class="text-muted ms-3">4</span>
            </div>
            <div class="d-flex align-items-center">
               <div class="text-nowrap me-3">
                  <span class="d-inline-block align-middle text-muted">1</span><i
                     class="ci-star-filled fs-xs ms-1"></i>
               </div>
               <div class="w-100">
                  <div class="progress"
                     style="height: 4px">
                     <div class="progress-bar bg-danger"
                        role="progressbar"
                        style="width: 4%"
                        aria-valuenow="4"
                        aria-valuemin="0"
                        aria-valuemax="100"></div>
                  </div>
               </div>
               <span class="text-muted ms-3">2</span>
            </div>
         </div>
      </div>
      <hr class="mt-4 mb-3" />
      <div class="row pt-4">
         <div class="col-md-7">
            <livewire:products.reviews.item />
         </div>
         <livewire:products.reviews.form :product="$product" />
      </div>
   </div>
</div>
