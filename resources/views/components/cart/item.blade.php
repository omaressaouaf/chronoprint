@props(['cartItem'])

<div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
   <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
      <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
         href="{{ route('products.show', ['product' => $cartItem->product->slug]) }}">
         <img src="{{ $cartItem->product->first_image }}"
            width="160"
            alt="{{ $cartItem->product->title }}">
      </a>
      <div class="pt-2">
         <h3 class="product-title fs-base mb-2"><a
               href="{{ route('products.show', ['product' => $cartItem->product->slug]) }}">{{ $cartItem->product->title }}</a>
         </h3>

         @foreach ($cartItem->selected_options as $attributeName => $optionRef)
            <div class="fs-sm">
               <span
                  class="text-muted me-2">{{ $cartItem->product->getAttributeByName($attributeName)->label }}:
               </span>
               {{ $cartItem->product->getOptionByRef($attributeName, $optionRef)['name'] }}
            </div>
         @endforeach
         <div class="fs-lg text-accent pt-2">{{ formatPrice($cartItem->subtotal) }} <small>Dhs
               HT</small></div>
      </div>
   </div>
   <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start"
      style="max-width: 9rem;">
      <label class="form-label">{{ __('Quantity') }}</label>
      <span>{{ $cartItem->quantity }}</span>
      <button onclick="confirm('{{ __('Are you sure ?') }}')
         || event.stopImmediatePropagation()"
         wire:click="removeCartItem({{ $cartItem->id }})"
         class="btn btn-link px-0 text-danger"
         type="button">
         <i class="ci-close-circle me-2"></i>
         <span class="fs-sm">{{ __('Remove') }}</span>
      </button>
   </div>
</div>
