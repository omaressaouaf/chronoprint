@extends('layouts.app')

@section('content')
   @include('partials.shop.product-hero' , ["product" => $product])
   <div class="container-fluid">
      @include('partials.shop.product-single' , ["product" => $product])
   </div>
@endsection
