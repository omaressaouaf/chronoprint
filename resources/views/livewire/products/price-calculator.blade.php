<div>
   <div>
      <div>
         <h3 class="accordion-header">
            <a class="accordion-button"
               href="#product-price-calculator"
               role="button"
               data-bs-toggle="collapse"
               aria-expanded="true"
               aria-controls="product-price-calculator">
               {{ __('Price calculator') }}
            </a>
         </h3>
         <div class="accordion-collapse collapse show"
            id="product-price-calculator"
            data-bs-parent="#productPanels">
            <div class="accordion-body">
               <form method="post">
                  <div class="row">
                     <div class="col-md-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center pb-1">
                           <label class="form-label">{{ __('Quantity') }}</label>
                        </div>
                        @if ($product->allowed_quantities)
                           <select wire:model="selectedQuantityValue"
                              class="form-select"
                              required>
                              @foreach ($product->allowed_quantities as $quantity)
                                 <option value="{{ $quantity['value'] }}">
                                    {{ $quantity['value'] }}</option>
                              @endforeach
                           </select>
                        @endif
                     </div>
                     @foreach ($product->attributes as $attribute)
                        <div class="col-md-6 mb-4">
                           <div class="d-flex justify-content-between align-items-center pb-1">
                              <label class="form-label">{{ $attribute->label }}:</label>
                           </div>
                           <select wire:model="selectedOptions.{{ $attribute->name }}"
                              class="form-select"
                              required>
                              @foreach ($attribute->pivot->options as $option)
                                 <option value="{{ $option['ref'] }}">{{ $option['name'] }}
                                 </option>
                              @endforeach
                           </select>
                        </div>
                     @endforeach
                     <div class="col-md-12">
                        <div class="form-check mt-4">
                           <input wire:model="designByCompany"
                              type="checkbox"
                              class="form-check-input"
                              id="design-by-company">
                           <label class="form-label"
                              for="design-by-company">{{ __('Do you want us to do the design ?') }}</label>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <hr class="mx-2 mb-4 mt-2">
   <div class="px-3">
      <div class="d-flex justify-content-between">
         <div class="mb-4">
            <h5>{{ __('Total price') }} :
               <span>{{ $totalPrice }} Dhs HT </span>
            </h5>
            <h6 class="text-sm text-danger">{{ __('Unit price') }} :
               <span>{{ $unitPrice }} Dhs HT</span>
            </h6>
         </div>
         <div wire:loading
            class="spinner-border text-accent"
            role="status">
         </div>
      </div>
      <div>
         @if ($designByCompany)
            <button class="btn btn-accent w-100"
               type="submit">
               <i class="ci-add-circle fs-lg me-2"></i>
               {{ __('Continue here') }}
            </button>
         @else
            <button class="btn btn-primary w-100 mb-4"
               type="submit">
               <i class="ci-upload fs-lg me-2"></i>
               {{ __('Import your files') }}
            </button>
         @endif

      </div>
   </div>
</div>
