<form
   action="{{ route('categories.show', ['slug' => request('slug') ?? 'all', 'sort' => request('sort')]) }}"
   method="GET"
   class="form-inline">
   <div class="input-group d-flex my-3 my-lg-0 mx-lg-2">
      <i class="ci-search position-absolute top-50 start-0 translate-middle-y fs-md ms-3"></i>
      <input {{ $attributes->merge(['class' => 'form-control rounded-end pe-5']) }}
         type="text"
         name="search"
         required
         value="{{ request('search') ?? '' }}"
         placeholder="{{ __('Search for products') }}">
   </div>
</form>
