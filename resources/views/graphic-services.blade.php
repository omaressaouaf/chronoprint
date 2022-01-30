<x-app-layout title="Services graphiques - Conception Logo - Création de Visuels"
   description="Nous offrons d'excellents services graphiques tels que la conception de logo senior et junior. et création et modification de vidéos visuelles et de produits numériques"
   canonical="graphic-services">
   <x-layout.breadcrumb :dark="false"
      :active-page="__('Graphic services')" />

   <div class="container pb-4 pb-sm-5">
      <div class="row pt-5">
         @foreach ($categories as $category)
            <div class="col-md-4 col-sm-6 mb-3">
               <div class="card border-0">
                  @if ($category->promotion_label)
                     <span
                        class="badge bg-success position-absolute end-0">{{ $category->promotion_label }}</span>
                  @endif
                  <a class="d-block overflow-hidden rounded-3"
                     href="{{ route('categories.show', ['slug' => $category->slug]) }}">
                     <img class="d-block w-100"
                        src="{{ $category->public_image }}"
                        alt="{{ $category->name }}">
                  </a>
                  <div class="card-body">
                     <h2 class="h5">{{ $category->name }}</h2>
                     <a href="{{ route('categories.show', ['slug' => $category->slug]) }}"
                        class="btn btn-primary btn-sm d-block w-100 mb-2 mt-4"><i
                           class="ci-arrow-right-circle fs-sm me-2"></i>{{ __('More details') }}</a>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</x-app-layout>
