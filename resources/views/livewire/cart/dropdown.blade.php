<div class="navbar-tool dropdown ms-3">
   <a class="navbar-tool-icon-box bg-secondary dropdown-toggle"
      href="{{ route('cart.index') }}">
      <span class="navbar-tool-label">{{ $cart ? count($cart->items) : 0 }}</span>
      <i class="navbar-tool-icon ci-cart"></i>
   </a>
   <a class="navbar-tool-text"
      href="{{ route('cart.index') }}">
      <small>{{ __('Cart') }}</small>
      @if ($cart && count($cart->items))
         {{ $cart->subtotal }} Dhs
      @endif
   </a>
   <!-- Cart dropdown-->
   @if ($cart && count($cart->items))
      <div class="dropdown-menu dropdown-menu-end">
         <div class="widget widget-cart px-3 pt-2 pb-3"
            style="width: 20rem;">
            <div data-simplebar
               data-simplebar-auto-hide="false">
               @foreach ($cart->items as $cartItem)
                  <div class="pb-2 border-bottom mb-2">
                     <div class="d-flex align-items-center">
                        <a class="flex-shrink-0"
                           href="{{ route('products.show', ['product' => $cartItem->product->slug]) }}">
                           <img src="{{ $cartItem->product->first_image }}"
                              width="64"
                              alt="{{ $cartItem->product->title }}">
                        </a>
                        <div class="ps-2">
                           <h6 class="widget-product-title">
                              <a
                                 href="{{ route('products.show', ['product' => $cartItem->product->slug]) }}">
                                 {{ $cartItem->product->title }}
                              </a>
                           </h6>
                           <div class="widget-product-meta">
                              <span class="text-accent me-2">
                                 {{ $cartItem->subtotal }}
                                 <small>Dhs</small>
                              </span>
                              <span class="text-muted">{{ $cartItem->quantity }}</span>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center mt-2">
               <div class="fs-xs me-2">
                  <span class="text-muted">{{ __('Subtotal') }}:</span>
                  <span class="text-accent ms-1">{{ $cart->subtotal }}
                     <small>Dhs</small>
                  </span>
               </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-3">
               <div class="fs-sm me-2 py-2">
                  <span class="text-muted">{{ __('Total') }}:</span>
                  <span class="text-accent ms-1">{{ format_price($cart->getTotal()) }}
                     <small>Dhs</small>
                  </span>
               </div>
            </div>
            <a class="btn btn-primary btn-sm d-block w-100"
               href="{{ route('checkout.index') }}">
               <i class="ci-card me-2 fs-base align-middle"></i>{{ __('Proceed to checkout') }}
            </a>
         </div>
      </div>
   @endif
</div>
