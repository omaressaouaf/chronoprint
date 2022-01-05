<div class="container pb-5 mb-2 mb-md-4">
   <div class="row">
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
            @if ($cart)
               @foreach ($cart->items as $item)
                  <x-cart.item :item="$item"
                     wire:key="{{ $loop->index }}" />
               @endforeach
            @endif
         </div>
      </section>
      <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
         @if ($cart)
            <x-cart.sidebar :cart="$cart" />
         @endif
      </aside>
   </div>
</div>
