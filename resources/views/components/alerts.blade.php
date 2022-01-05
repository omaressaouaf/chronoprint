@if ($errors->any())
   <div class="alert alert-danger"
      role="alert">
      <ul>
         @foreach ($errors->all() as $error)
            @if (Str::of($error)->contains(['requiredFiles', 'designFiles']))
               <li>
                  {{ __('The files should not exceed 10mb each. and they should be jpg, jpeg, gif, png, eps, ai, svg, pdf, zip, tar, rar, cdr, psd') }}
               </li>
            @else
               <li>{{ $error }}</li>
            @endif
         @endforeach
      </ul>
   </div>
@endif

@if (session('error_message'))
   <div class="alert alert-danger"
      role="alert">
      <div class="alert-icon">
         <i class="ci-close-circle"></i>
      </div>
      <div>{{ session('error_message') }}</div>
   </div>
@endif

@if (session('success_message'))
   <div class="alert alert-success"
      role="alert">
      <div class="alert-icon">
         <i class="ci-check-circle"></i>
      </div>
      <div>{{ session('success_message') }}</div>
   </div>
@endif
