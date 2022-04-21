<div class="side-menu sidebar-inverse">
   <nav class="navbar navbar-default"
      role="navigation">
      <div class="side-menu-container">
         <div class="navbar-header">
            <a class="navbar-brand"
               style="height: 100px; width : 455px"
               href="{{ route('voyager.dashboard') }}">
               <div style="padding: 15px 92px 15px 3px;">
                  <img src="/storage/theme/logo-light.png"
                     alt="{{ config('app.name') }} Logo">
               </div>
            </a>
         </div><!-- .navbar-header -->

         <div class="panel widget center bgimage"
            style="background-image:url({{ Voyager::image(Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg')) }}); background-size: cover; background-position: 0px;">
            <div class="dimmer"></div>
            <div class="panel-content">
               <img src="{{ $user_avatar }}"
                  class="avatar"
                  alt="{{ Auth::user()->name }} avatar">
               <h4>{{ ucwords(Auth::user()->name) }}</h4>
               <p>{{ Auth::user()->email }}</p>

               <a href="{{ route('voyager.profile') }}"
                  class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
               <div style="clear:both"></div>
            </div>
         </div>

      </div>
      <div id="adminmenu">
         <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
      </div>
   </nav>
</div>
