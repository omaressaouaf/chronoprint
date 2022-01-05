<div class="bg-light shadow-lg rounded-3 mt-n5 mb-4">
   <div class="d-flex align-items-center ps-2">
      {{-- Search --}}
      <div class="flex-grow-1 me-5">
         <x-products.search class="border-0 shadow-none" />
      </div>
      {{-- Sort --}}
      <div class="d-flex align-items-center">
         <div class="dropdown py-4 border-start">
            <a class="nav-link-style fs-md fw-medium dropdown-toggle p-4"
               href="#"
               data-bs-toggle="dropdown"><span class="d-inline-block py-1"><i
                     class="ci-flag align-middle opacity-60 mt-n1 me-2"></i>
                  {{ __($sortings[request('sort') ?? 'newest']) }}</span></a>

            <ul class="dropdown-menu dropdown-menu-end">
               @foreach ($sortings as $sortSlug => $sortName)
                  <li>
                     <a class="dropdown-item"
                        href="{{ route('categories.show', ['slug' => request('slug'), 'sort' => $sortSlug, 'search' => request('search')]) }}"><i
                           class="ci-thumb-up me-2 opacity-60"></i>{{ __($sortName) }}</a>
                  </li>
               @endforeach
            </ul>
         </div>
      </div>
      {{-- Pagination --}}
      <div class="d-none d-md-flex align-items-center border-start ps-4">
         <span class="fs-md text-nowrap me-4">{{ __('Pages') }}&nbsp;
            {{ $products->currentPage() }} /
            {{ $products->total() }}</span>
      </div>
   </div>
</div>
