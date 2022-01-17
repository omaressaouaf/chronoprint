<x-account-layout :title="__('Checkout your orders')"
   active-page="Orders">
   <div>
      <div class="d-flex justify-content-between align-items-start">
         <h5 class="mb-4 ps-1">{{ __('Order') }} #{{ $order->id }}</h5>
         <h5>
            <span
               class="badge
               @if (in_array($order->status, ['pending', 'failed']))
               bg-danger
               @elseif(in_array($order->status, ['shipped', 'delivered']))
               bg-success
               @else
               bg-info
               @endif
               m-0">
               {{ __($order->status) }}
            </span>
         </h5>
      </div>
      <div class="pb-0">
         @foreach ($order->items as $orderItem)
            <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
               <div class="d-sm-flex text-center text-sm-start">
                  <a class="d-inline-block flex-shrink-0 mx-auto"
                     href="{{ route('products.show', ['product' => $orderItem->product->slug]) }}"
                     style="width: 10rem;">
                     <img src="{{ $orderItem->product->first_image }}"
                        alt="{{ $orderItem->product->title }}">
                  </a>
                  <div class="ps-sm-4 pt-2">
                     <h3 class="product-title fs-base mb-2">
                        <a
                           href="{{ route('products.show', ['product' => $orderItem->product->slug]) }}">
                           {{ $orderItem->product->title }}
                        </a>
                     </h3>
                     <div class="fs-sm">
                        @foreach ($orderItem->selected_options as $attributeName => $optionRef)
                           <div class="fs-sm">
                              <span
                                 class="text-muted me-2">{{ $orderItem->product->getAttributeByName($attributeName)->label }}:
                              </span>
                              {{ $orderItem->product->getOptionByRef($attributeName, $optionRef)['name'] }}
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">{{ __('Quantity') }} :</div>
                  {{ $orderItem->quantity }}
               </div>
               <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">{{ __('Subtotal') }}</div>
                  {{ format_price($order->subtotal) }} <small>Dhs</small>
               </div>
            </div>
         @endforeach
      </div>
      <!-- Footer-->
      <div
         class="modal-footer d-flex flex-column flex-md-row justify-content-between bg-secondary fs-md">
         <div class="px-2 py-1">
            <span class="text-muted">{{ __('Subtotal') }} :
            </span><span>{{ format_price($order->subtotal) }}
               <small>Dhs</small>
            </span>
         </div>
         <div class="px-2 py-1">
            <span class="text-muted">{{ __('Delivery price') }} :
            </span><span>{{ format_price($order->delivery_price) }}
               <small>Dhs</small>
            </span>
         </div>
         @if ($order->discount_price)
            <div class="px-2 py-1">
               <span class="text-muted">{{ __('Discount') }} :
               </span><span>{{ format_price($order->discount_price) }}
                  <small>Dhs</small>
               </span>
            </div>
         @endif
         <div class="px-2 py-1">
            <span class="text-muted">{{ __('TVA') }} :
            </span><span>{{ format_price($order->tax_price) }}
               <small>Dhs</small>
            </span>
         </div>
         <div class="px-2 py-1">
            <span class="text-muted">{{ __('Total') }} : </span>
            <span class="fs-lg">{{ format_price($order->total) }} <small>Dhs</small>
            </span>
         </div>
      </div>
   </div>
</x-account-layout>
