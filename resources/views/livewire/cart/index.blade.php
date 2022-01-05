<div class="container pb-5 mb-2 mb-md-4">
   <div class="row">
      @if ($cart && count($cart->items))
         <section class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
               <h2 class="h6 text-light mb-0">{{ __('Products') }}</h2><a
                  class="btn btn-outline-primary btn-sm ps-2"
                  href="{{ route('categories.show', ['slug' => 'all']) }}"><i
                     class="ci-arrow-left me-2"></i>{{ __('Continue shopping') }}</a>
            </div>
            <div wire:loading.class="disabled-element"
               wire:target="removeItem"
               class="position-relative">
               <div wire:loading
                  wire:target="removeItem"
                  class="spinner-grow center-loader"
                  role="status">
               </div>
               @foreach ($cart->items as $item)
                  <x-cart.item :item="$item"
                     wire:key="{{ $loop->index }}" />
               @endforeach
            </div>
         </section>
         <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <x-cart.sidebar :cart="$cart" />
         </aside>

      @else
         <div class="row justify-content-center pt-lg-4 text-center">
            <div class="col-lg-7 col-md-7 col-sm-9"><img class="d-block mx-auto mb-5"
                  src="/storage/theme/pages/404.png"
                  width="340"
                  alt="{{ __('Your cart is empty') }}">  
               <h3>{{ __('Your cart is empty') }}</h3>
               <h3 class="h5 fw-normal mb-4">{{__("Check out our products to get inspiration")}}
               </h3>
               <a href="{{ route('categories.show', ['slug' => 'all']) }}"
                  class="fs-md mb-4 text-accent">
                  <u>{{__("All products")}}</u>
               </a>
            </div>
         </div>
      @endif
   </div>
</div>
