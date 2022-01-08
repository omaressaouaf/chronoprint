<div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
   <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
      <h3 class="h4 pb-2">{{ __('Write a review') }}</h3>
      <div class="mb-3">
         <x-base.alerts />
      </div>
      <form wire:submit.prevent="handleSubmit">
         <div class="mb-3">
            <label class="form-label">{{ __('Rating') }}
               <span class="text-danger">*</span>
            </label>
            <select wire:model="rating"
               class="form-select"
               required>
               @foreach (range(5, 1) as $item)
                  <option value="{{ $item }}">
                     {{ $item }} {{ $item === 1 ? __('star') : __('stars') }}
                  </option>
               @endforeach
            </select>
         </div>
         <div class="mb-3">
            <label class="form-label">
               {{ __('Review') }}
               <span class="text-danger">*</span>
            </label>
            <textarea wire:model.debounce.500ms="review"
               class="form-control"
               rows="6"
               required></textarea>
         </div>
         <button class="btn btn-primary btn-shadow d-block w-100"
            type="submit">
            {{ __('Submit your review') }}
         </button>
      </form>
   </div>
</div>
