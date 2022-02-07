<div class="topbar topbar-dark bg-accent"
   style="min-height: 70px">
   <div class="container">
      <div class="topbar-text text-nowrap d-inline-block"><i class="ci-support"></i><span
            class="text-muted me-1 d-none d-lg-inline">{{ __('Customer support') }}</span><a
            class="topbar-link"
            href="tel:{{ setting('site.phone') }}">{{ setting('site.phone') }}</a></div>
      <div class="tns-carousel tns-controls-static d-none d-md-block">
         <div class="tns-carousel-inner"
            data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
            <div class="topbar-text">{{ __('Fast and free delivery in casablanca') }}</div>
         </div>
      </div>
      <div class="text-nowrap">
         <a class="topbar-link me-4"
            href="{{ route('graphic-services') }}"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="{{ __('Graphic services') }}"><i class="ci-edit"></i> <span
               class="d-none d-lg-inline">
               {{ __('Graphic services') }} </span></a>
         <a class="topbar-link me-4"
            href="{{ route('contact.index') }}"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="{{ __('Contact us') }}"><i class="ci-mail"></i> <span
               class="d-none d-lg-inline">
               {{ __('Contact us') }} </span></a>
      </div>
   </div>
</div>
