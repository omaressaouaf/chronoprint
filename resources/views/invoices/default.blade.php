<!DOCTYPE html>
<html lang="en">

<head>
   <title>Facture de commande {{ $order->id }}</title>
   <meta http-equiv="Content-Type"
      content="text/html; charset=utf-8" />

   <style type="text/css"
      media="screen">
      html {
         font-family: sans-serif;
         line-height: 1.15;
         margin: 0;
      }

      body {
         font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
         font-weight: 400;
         line-height: 1.5;
         color: #212529;
         text-align: left;
         background-color: #fff;
         font-size: 10px;
         margin: 36pt;
      }

      h4 {
         margin-top: 0;
         margin-bottom: 0.5rem;
      }

      p {
         margin-top: 0;
         margin-bottom: 1rem;
      }

      strong {
         font-weight: bolder;
      }

      img {
         vertical-align: middle;
         border-style: none;
      }

      table {
         border-collapse: collapse;
      }

      th {
         text-align: inherit;
      }

      h4,
      .h4 {
         margin-bottom: 0.5rem;
         font-weight: 500;
         line-height: 1.2;
      }

      h4,
      .h4 {
         font-size: 1.5rem;
      }

      .table {
         width: 100%;
         margin-bottom: 1rem;
         color: #212529;
      }

      .table th,
      .table td {
         padding: 0.75rem;
         vertical-align: top;
      }

      .table.table-items td {
         border-top: 1px solid #dee2e6;
      }

      .table thead th {
         vertical-align: bottom;
         border-bottom: 2px solid #dee2e6;
      }

      .mt-5 {
         margin-top: 3rem !important;
      }

      .pr-0,
      .px-0 {
         padding-right: 0 !important;
      }

      .pl-0,
      .px-0 {
         padding-left: 0 !important;
      }

      .text-right {
         text-align: right !important;
      }

      .text-center {
         text-align: center !important;
      }

      .text-uppercase {
         text-transform: uppercase !important;
      }

      * {
         font-family: "DejaVu Sans";
      }

      body,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      table,
      th,
      tr,
      td,
      p,
      div {
         line-height: 1.1;
      }

      .party-header {
         font-size: 1.5rem;
         font-weight: 400;
      }

      .total-amount {
         font-size: 12px;
         font-weight: 700;
      }

      .border-0 {
         border: none !important;
      }

      .cool-gray {
         color: #6B7280;
      }
   </style>
</head>

<body>
   {{-- Header --}}


   <table class="table">
      <tbody>
         <tr>
            <td class="border-0 pl-0"
               width="69%">
               <img src="{{ asset('/theme-images/logo.png') }}"
                  alt="{{ config('app.name') }} Logo"
                  height="50">
            </td>
            <td class="border-0 pl-0">
               <p>Commande ID :
                  <strong>#{{ $order->id }}</strong>
               </p>
               <p>Passé À : <strong>{{ $order->created_at->format('Y-m-d h:i') }}</strong>
               </p>
               <p>Date de facture : <strong>{{ now()->format('Y-m-d h:i') }}</strong>
               </p>
            </td>
         </tr>
      </tbody>
   </table>

   {{-- Seller - Buyer --}}
   <table class="table">
      <thead>
         <tr>
            <th class="border-0 pl-0 party-header"
               width="48.5%">
               De
            </th>
            <th class="border-0"
               width="3%"></th>
            <th class="border-0 pl-0 party-header">
               À
            </th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td class="px-0">
               <p class="seller-name">
                  <strong>{{ config('app.name') }}</strong>
               </p>

               @if (setting('site.address'))
                  <p class="seller-address">
                     Adresse : {{ setting('site.address') }}
                  </p>
               @endif

               <p class="seller-phone">
                  Téléphone : {{ setting('site.phone') }}
               </p>

               <p class="seller-address">
                  Email principal : {{ setting('site.main_email') }}
               </p>
               <p class="seller-address">
                  Email du contact : {{ setting('site.contact_email') }}
               </p>
            </td>
            <td class="border-0"></td>
            <td class="px-0">
               <p class="buyer-name">
                  <strong>{{ ucwords($order->billing_address_name) }}</strong>
               </p>

               <p class="buyer-address">
                  Adresse : {{ $order->billing_address_city }}, {{ $order->billing_address_line }},
                  {{ $order->billing_address_zip }}
               </p>

               <p class="buyer-phone">
                  Téléphone : {{ $order->billing_address_phone }}
               </p>

               @if ($order->billing_address_email)
                  <p class="buyer-phone">
                     Email : {{ $order->billing_address_email }}
                  </p>
               @endif

               @if ($order->user)
                  <p class="buyer-phone">
                     Commande passé par {{ $order->user->name }}
                  </p>
               @endif
            </td>
         </tr>
      </tbody>
   </table>

   {{-- Table --}}
   <table class="table table-items">
      <thead>
         <tr>
            <th scope="col"
               class="border-0 pl-0">Titre</th>
            <th scope="col"
               class="text-center border-0">Options sélectionnées</th>
            <th scope="col"
               class="text-center border-0">Quantité</th>
            <th scope="col"
               class="text-right border-0 pr-0">Total HT</th>
         </tr>
      </thead>
      <tbody>
         {{-- Items --}}
         @foreach ($order->items as $orderItem)
            <tr>
               <td class="pl-0">
                  {{ $orderItem->product->title }}
               </td>
               <td class="text-center">
                  @if ($orderItem->product->id)
                     @foreach ($orderItem->selected_options as $attributeName => $selectedOption)
                        <div class="fs-sm">
                           <span
                              class="text-muted me-2">{{ $orderItem->product->getAttributeByName($attributeName)->label }}:
                           </span>
                           @if (isset($selectedOption['ref']))
                              {{ $orderItem->product->getOptionByRef($attributeName, $selectedOption['ref'])['name'] }}
                           @else
                              @if (is_array($selectedOption['value']) && count($selectedOption['value']))
                                 @foreach ($selectedOption['value'] as $groupName => $selectedValue)
                                    <span>{{ $groupName }} : {{ $selectedValue }}</span>
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
               </td>
               <td class="text-center">{{ $orderItem->quantity }}</td>
               <td class="text-right pr-0">
                  {{ format_price($orderItem->subtotal) }} Dhs
               </td>
            </tr>
         @endforeach
         {{-- Summary --}}
         <tr>
            <td colspan="2"
               class="border-0"></td>
            <td class="text-right pl-0">Total HT</td>
            <td class="text-right pr-0">
               {{ format_price($order->subtotal) }} Dhs
            </td>
         </tr>

         <tr>
            <td colspan="2"
               class="border-0"></td>
            <td class="text-right pl-0">Livraison</td>
            <td class="text-right pr-0">
               {{ format_price($order->delivery_price) }} Dhs
            </td>
         </tr>
         <tr>
            <td colspan="2"
               class="border-0"></td>
            <td class="text-right pl-0">Remise</td>
            <td class="text-right pr-0">
               {{ format_price($order->discount_price) }} Dhs
            </td>
         </tr>
         <tr>
            <td colspan="2"
               class="border-0"></td>
            <td class="text-right pl-0">TVA</td>
            <td class="text-right pr-0">
               {{ format_price($order->tax_price) }} Dhs
            </td>
         </tr>
         <tr>
            <td colspan="2"
               class="border-0"></td>
            <td class="text-right pl-0">Total TTC</td>
            <td class="text-right pr-0 total-amount">
               {{ format_price($order->total) }} Dhs
            </td>
         </tr>
      </tbody>
   </table>

   <p>
      La mode de paiment : {{ __($order->payment_mode) }}
   </p>
   @if ($order->additional_information)
      <p style="white-space: pre-line">
         Information additionnelle : {{ $order->additional_information }}
      </p>
   @endif
</body>

</html>
