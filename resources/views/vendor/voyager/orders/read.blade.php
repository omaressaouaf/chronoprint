@extends('voyager::master')

@section('page_title', __('voyager::generic.view') . ' ' .
   $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
   <h1 class="page-title">
      <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }}
      {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

      <a rel="noopener"
         target="_blank"
         href="{{ route('admin.invoices.index', ['order' => $order->id]) }}"
         class="btn btn-danger mr-2">
         <i class="glyphicon glyphicon-print mr-1"></i> <span class="hidden-xs hidden-sm">Facture</span>
      </a>
      @can('edit', $dataTypeContent)
         <a href="{{ route('voyager.' . $dataType->slug . '.edit', $dataTypeContent->getKey()) }}"
            class="btn btn-info">
            <i class="glyphicon glyphicon-pencil"></i> <span
               class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
         </a>
      @endcan
      @can('delete', $dataTypeContent)
         @if ($isSoftDeleted)
            <a href="{{ route('voyager.' . $dataType->slug . '.restore', $dataTypeContent->getKey()) }}"
               title="{{ __('voyager::generic.restore') }}"
               class="btn btn-default restore"
               data-id="{{ $dataTypeContent->getKey() }}"
               id="restore-{{ $dataTypeContent->getKey() }}">
               <i class="voyager-trash"></i> <span
                  class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
            </a>
         @else
            <a href="javascript:;"
               title="{{ __('voyager::generic.delete') }}"
               class="btn btn-danger delete"
               data-id="{{ $dataTypeContent->getKey() }}"
               id="delete-{{ $dataTypeContent->getKey() }}">
               <i class="voyager-trash"></i> <span
                  class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
            </a>
         @endif
      @endcan
      @can('browse', $dataTypeContent)
         <a href="{{ route('voyager.' . $dataType->slug . '.index') }}"
            class="btn btn-warning">
            <i class="glyphicon glyphicon-list"></i> <span
               class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
         </a>
      @endcan
   </h1>
   @include('voyager::multilingual.language-selector')
@stop

@section('content')
   <div class="page-content read container-fluid">
      {{-- start our design --}}
      <div class="row">
         <div class="col-md-8">
            <div class="card mt-4">
               <div class="card-body">
                  <div class="d-flex flex-wrap align-items-center">
                     <h4>
                        Détails de la commande
                     </h4>
                  </div>
                  <hr>
                  <div>
                     <h4>
                        <span
                           class="label float-right
                          @if (in_array($order->status, ['pending', 'failed'])) label-danger
                          @elseif(in_array($order->status, ['shipped', 'delivered']))
                            label-success
                          @else
                            label-primary @endif
                       ">
                           {{ __($order->status) }}
                        </span>
                     </h4>
                     <p class="font-weight-bold mb-1">
                        Commande ID : {{ $order->id }}
                     </p>
                     <p class="font-weight-bold mb-1 text-capitalize">
                        Mode de paiement :
                        {{ __($order->payment_mode) }}
                     </p>
                     <p class="font-weight-bold mb-1 text-capitalize">
                        Payé :
                        <span class="label label-primary">
                           {{ $order->paid ? 'Oui' : 'Non' }}
                        </span>
                     </p>
                     <p class="font-weight-bold mb-1 text-capitalize">
                        Passé à :
                        {{ $order->created_at }}
                     </p>
                  </div>
                  <hr>
                  @foreach ($order->items as $orderItem)
                     <div class="row mb-3">
                        <div class="col-md-3">
                           <img src="{{ $orderItem->product->first_image }}"
                              alt="{{ $orderItem->product->title }}"
                              class="img-responsive">
                        </div>
                        <div class="col-md-5">
                           <h4 class="mb-2 pb-0">
                              <a href="/admin/products/{{ $orderItem->product_id }}"
                                 class="">
                                 {{ $orderItem->product->title }}
                              </a>
                           </h4>
                           @if ($orderItem->product->id)
                              @foreach ($orderItem->selected_options as $attributeName => $selectedOption)
                                 <div>
                                    <span
                                       class="font-weight-bold">{{ $orderItem->product->getAttributeByName($attributeName)->label }}:
                                    </span>
                                    @if (isset($selectedOption['ref']))
                                       {{ $orderItem->product->getOptionByRef($attributeName, $selectedOption['ref'])['name'] }}
                                    @else
                                       @if (is_array($selectedOption['value']) && count($selectedOption['value']))
                                          @foreach ($selectedOption['value'] as $groupName => $selectedValue)
                                             <span>{{ $groupName }} :
                                                {{ $selectedValue }}</span>
                                             @if (!$loop->last)
                                                &#xd7;
                                             @endif
                                          @endforeach
                                       @else
                                          {{ $selectedOption['value'] }}
                                       @endif
                                    @endif
                                 </div>
                              @endforeach
                           @endif
                           @if ($orderItem->design_by_company)
                              <hr>
                              <h6 class="mb-4">Ce produit doit être conçu par
                                 l'entreprise</h6>
                              @if ($orderItem->design_information)
                                 <h5>
                                    <span class="font-weight-bold">
                                       Les informations de conception :
                                    </span>
                                 </h5>
                                 <span class="font-weight-bold"
                                    style="white-space: pre-line">
                                    {{ $orderItem->design_information }}
                                 </span>
                              @endif
                           @endif
                           @if (count($orderItem->media))
                              <hr>
                              <button class="btn btn-link font-weight-bold p-0"
                                 data-toggle="collapse"
                                 data-target="#files-collapse-{{ $orderItem->id }}">
                                 <u class="text-info">Les fichiers pour ce produit</u>
                              </button>

                              <div id="files-collapse-{{ $orderItem->id }}"
                                 class="collapse mt-3">
                                 @foreach ($orderItem->media as $mediaItem)
                                    <div>
                                       @if (!is_numeric($mediaItem->name))
                                          <p class="h6 mb-3 text-capitalize">{{ $mediaItem->name }}
                                          </p>
                                       @endif
                                       @if (file_is_image($mediaItem->filename))
                                          <img width="150"
                                             height="150"
                                             class="img-responsive img-thumbnail mb-3"
                                             src="{{ $mediaItem->public_path }}"
                                             alt="{{ $mediaItem->filename }}">
                                       @else
                                          <x-base.nofilepreview icon="voyager-file-text" />
                                       @endif
                                       <a href="{{ $mediaItem->public_path }}"
                                          target="_blank"
                                          rel="noopener"
                                          class="text-info text-wrap text-break">
                                          {{ $mediaItem->filename }}
                                       </a>
                                       <br>
                                       <br>
                                       <a href="{{ route('admin.media.download', ['media' => $mediaItem->id]) }}"
                                          class="text-primary text-wrap text-break">
                                          <i class="voyager-download"></i> Télécharger
                                       </a>
                                    </div>
                                    <br>
                                 @endforeach
                              </div>
                           @endif
                        </div>
                        <div class="col-md-2">
                           <p>{{ $orderItem->quantity }} Qté</p>
                        </div>
                        <div class="col-md-2 font-weight-bold">
                           <p>{{ $orderItem->subtotal }} Dhs HT</p>
                        </div>
                     </div>
                     <hr>
                  @endforeach
                  <div class="row">
                     <div class="col-md-5">
                        <p>
                           <span class="font-weight-bold">Total HT</span>
                           <span class="float-right">{{ $order->subtotal }} Dhs</span>
                        </p>
                        @if ($order->discount_price)
                           <p class="text-success">
                              <span class="font-weight-bold">Remise</span>
                              <span class="float-right">- {{ $order->discount_price }} Dhs</span>
                           </p>
                        @endif
                        @if ($order->dealer_discount_price)
                           <p class="text-success">
                              <span class="font-weight-bold">Remise de revendeurs</span>
                              <span class="float-right">- {{ $order->dealer_discount_price }}
                                 Dhs</span>
                           </p>
                        @endif
                        <p>
                           <span class="font-weight-bold">Livraison</span>
                           <span class="float-right">{{ $order->delivery_price }} Dhs</span>
                        </p>
                        <p class="text-danger">
                           <span class="font-weight-bold">TVA</span>
                           <span class="float-right">{{ $order->tax_price }} Dhs</span>
                        </p>
                        <hr>
                        <p class="text-success">
                           <span class="font-weight-bold">Total TTC</span>
                           <span class="float-right">{{ $order->total }} Dhs</span>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card mt-4">
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                     <h4>Commander par</h4>
                  </div>
                  <hr>
                  <div>
                     <div class="d-flex">
                        <img width="70"
                           height="70"
                           src="/storage/users/default.png"
                           alt="Client"
                           class="img-circle mr-3">
                        <div class="mt-3">
                           <a href="/admin/users/{{ $order->user_id }}">
                              <u class="text-dark">
                                 {{ $order->user->name }}
                              </u>
                              @if ($order->user->role?->name === 'dealer')
                                 <span class="ml-2 label label-success">
                                    Revendeur
                                 </span>
                              @endif
                           </a>
                           @if ($order->user->email)
                              <p class="mt-2 text-muted">
                                 {{ $order->user->email }}
                              </p>
                           @endif
                        </div>
                     </div>
                  </div>
                  <hr>
                  <h5 class="mb-4">Adresse de livraison</h5>
                  <div class="font-weight-bold">
                     <p>
                        <i class="voyager-person mr-2"></i>{{ $order->address_name }}
                     </p>
                     <p>
                        <i class="voyager-phone mr-2"></i>{{ $order->address_phone }}
                     </p>
                     @if ($order->address_email)
                        <p>
                           <i class="voyager-mail mr-2"></i>{{ $order->address_email }}
                        </p>
                     @endif
                     <p>
                        <i class="voyager-location mr-1"></i>
                        {{ ucwords($order->address_city) }}, {{ $order->address_line }},
                        {{ $order->address_zip }}
                     </p>
                  </div>
               </div>
            </div>
            @if ($order->additional_information)
               <div class="card mt-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <h4>Information additionnelle</h4>
                     </div>
                     <hr>
                     <div>
                        <p class="font-weight-bold"
                           style="white-space: pre-line">{{ $order->additional_information }}</p>
                     </div>
                  </div>
               </div>
            @endif
         </div>
      </div>
      {{-- end our design --}}

   </div>

   {{-- Single delete modal --}}
   <div class="modal modal-danger fade"
      tabindex="-1"
      id="delete_modal"
      role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="{{ __('voyager::generic.close') }}"><span
                     aria-hidden="true">&times;</span></button>
               <h4 class="modal-title"><i class="voyager-trash"></i>
                  {{ __('voyager::generic.delete_question') }}
                  {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
            </div>
            <div class="modal-footer">
               <form action="{{ route('voyager.' . $dataType->slug . '.index') }}"
                  id="delete_form"
                  method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <input type="submit"
                     class="btn btn-danger pull-right delete-confirm"
                     value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
               </form>
               <button type="button"
                  class="btn btn-default pull-right"
                  data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
            </div>
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
@stop

@section('javascript')
   @if ($isModelTranslatable)
      <script>
         $(document).ready(function() {
            $('.side-body').multilingual();
         });
      </script>
   @endif
   <script>
      var deleteFormAction;
      $('.delete').on('click', function(e) {
         var form = $('#delete_form')[0];

         if (!deleteFormAction) {
            // Save form action initial value
            deleteFormAction = form.action;
         }

         form.action = deleteFormAction.match(/\/[0-9]+$/) ?
            deleteFormAction.replace(/([0-9]+$)/, $(this).data('id')) :
            deleteFormAction + '/' + $(this).data('id');

         $('#delete_modal').modal('show');
      });
   </script>
@stop
