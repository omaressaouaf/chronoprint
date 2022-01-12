<div wire:ignore.self
   class="modal fade"
   id="address-form-modal"
   tabindex="-1">
   <div class="modal-dialog modal-lg">
      <form wire:submit.prevent="addAddress">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{ __('Add address') }}</h5>
               <button class="btn-close"
                  type="button"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row gx-4 gy-3">
                  <x-base.alerts />
                  <div class="col-sm-4">
                     <label class="form-label">{{ __('Full name') }}</label>
                     <input wire:model.debounce.500ms="name"
                        class="form-control"
                        placeholder="{{ __('Full name') }}"
                        type="text"
                        required>
                  </div>
                  <div class="col-sm-4">
                     <label class="form-label">{{ __('Phone') }}</label>
                     <input wire:model.debounce.500ms="phone"
                        class="form-control"
                        placeholder="{{ __('Phone') }}"
                        type="text"
                        required>
                  </div>

                  <div class="col-sm-4">
                     <label class="form-label">{{ __('Email') }}</label>
                     <input wire:model.debounce.500ms="email"
                        class="form-control"
                        placeholder="{{ __('Email') }}"
                        type="email">
                  </div>
                  <div x-data="{ cities: [] }"
                     x-init="cities = await (await fetch('/cities.json')).json()"
                     class="col-sm-6">
                     <label class="form-label">{{ __('City') }}</label>
                     <select wire:model="city"
                        class="form-select"
                        required>
                        <template x-for="city in cities">
                           <option x-bind:selected="city.name.toLowerCase() === 'casablanca'"
                              x-text="city.name"
                              x-bind:value="city.name"></option>
                        </template>
                     </select>
                     <div class="invalid-feedback">Please select your city!</div>
                  </div>
                  <div class="col-sm-6">
                     <label class="form-label">{{ __('ZIP code') }}</label>
                     <input wire:model.debounce.500ms="zip"
                        class="form-control"
                        type="number"
                        placeholder="{{ __('ZIP code') }}">
                  </div>
                  <div class="col-sm-12">
                     <label class="form-label">{{ __('Address Line') }}</label>
                     <textarea wire:model.debounce.500ms="line"
                        class="form-control"
                        placeholder="{{ __('Address Line') }}"
                        type="text"
                        rows="5"
                        required></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-primary btn-shadow"
                  type="submit">{{ __('Add address') }}</button>
            </div>
         </div>
      </form>
   </div>
</div>
