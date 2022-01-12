<x-app-layout>
   <div class="container pb-5 mb-sm-4">
      <div class="pt-5">
         <div class="card py-3 mt-sm-3">
            <div class="card-body text-center">
               <h2 class="h4 pb-3">
                  {{ session('success_message') ?? session('error_message') }}
               </h2>
               @if (session('success_message'))
                  <p class="fs-sm mb-2">
                     {{ __('Your order has been placed and will be processed as soon as possible') }},
                  </p>
                  <p class="fs-sm mb-2">
                     {{ __('You will be receiving an email shortly with confirmation of your order') }}.
                  </p>
               @endif
               <a class="btn btn-primary mt-3 me-3"
                  href="{{ route('categories.show', ['slug' => 'all']) }}">
                  {{ __('Go back shopping') }}
               </a>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
