<section class="container py-lg-4 mb-4">
    <h2 class="h3 text-center pb-4">{{ __('Our references') }}</h2>
    <div class="row">
        @foreach (range(1,6) as $item)
            <div class="col-md-4 col-sm-4 col-6">
                <a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter"
                   href="#">
                    <img class="d-block mx-auto"
                         src="/storage/theme/brands/{{$item}}.png"
                         style="width: 150px;"
                         alt="{{__("Brand")}}">
                </a>
            </div>
        @endforeach
    </div>
</section>
