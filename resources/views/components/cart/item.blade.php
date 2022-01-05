@props(['item'])

<div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
   <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
         class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
         href="{{ route('products.show', ['product' => $item->product->slug]) }}"><img
            src="{{ $item->product->first_image }}"
            width="160"
            alt="Product"></a>
      <div class="pt-2">
         <h3 class="product-title fs-base mb-2"><a
               href="{{ route('products.show', ['product' => $item->product->slug]) }}">{{ $item->product->title }}</a>
         </h3>

         @foreach ($item->selected_options as $attributeName => $optionRef)
            <div class="fs-sm">
               <span
                  class="text-muted me-2">{{ $item->product->getAttributeByName($attributeName)->label }}:
               </span>
               {{ $item->product->getOptionByRef($attributeName, $optionRef)['name'] }}
            </div>
         @endforeach
         <div class="fs-lg text-accent pt-2">{{ formatPrice($item->subtotal) }} <small>Dhs
               HT</small></div>
      </div>
   </div>
   <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start"
      style="max-width: 9rem;">
      <label class="form-label">{{ __('Quantity') }}</label>
      <span>{{ $item->quantity }}</span>
      <button onclick="confirm('{{__('Are you sure ?')}}')
         || event.stopImmediatePropagation()"
         wire:click="removeItem({{ $item->id }})"
         class="btn btn-link px-0 text-danger"
         type="button"><i class="ci-close-circle me-2"></i><span
            class="fs-sm">{{ __('Remove') }}</span></button>
   </div>
</div>
