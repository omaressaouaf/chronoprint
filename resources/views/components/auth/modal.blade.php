<div class="modal fade"
   id="auth-modal"
   tabindex="-1"
   aria-modal="false"
   role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md"
      role="document">
      <div class="modal-content">
         <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs"
               id="auth-tab"
               role="tablist">
               <li class="nav-item">
                  <a class="nav-link fw-medium active"
                     href="#login"
                     data-bs-toggle="tab"
                     role="tab"
                     aria-selected="true">
                     <i class="ci-unlocked me-2 mt-n1"></i>
                     {{ __('Login') }}
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link fw-medium"
                     href="#register"
                     data-bs-toggle="tab"
                     role="tab"
                     aria-selected="false">
                     <i class="ci-user me-2 mt-n1"></i>
                     {{ __('Register') }}
                  </a>
               </li>
            </ul>
            <button class="btn-close"
               type="button"
               data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <div class="modal-body tab-content py-4">
            <div class="tab-pane active show"
               id="login">
               <x-auth.login-form />
            </div>
            <div class="tab-pane fade"
               id="register">
               <x-auth.register-form />
            </div>
         </div>
      </div>
   </div>
</div>
