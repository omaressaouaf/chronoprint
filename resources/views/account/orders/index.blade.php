<x-account-layout :title="__('Checkout your orders')"
   active-page="Orders">
   <div>
      <div class="table-responsive fs-md mb-4">
         <table class="table table-hover mb-0">
            <thead>
               <tr>
                  <th>{{ __('Order') }} #</th>
                  <th>{{ __('Passed at') }}</th>
                  <th>{{ __('Status') }}</th>
                  <th>{{ __('Total') }}</th>
                  <th>{{ __('Actions') }}</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($orders as $order)
                  <tr>
                     <td class="py-3">
                        <a href="{{ route('account.orders.show', ['id' => $order->id]) }}"
                           class="nav-link-style fw-medium fs-sm">
                           {{ $order->id }}
                        </a>
                     </td>
                     <td class="py-3">{{ $order->created_at->format("y-m-d h:i") }}</td>
                     <td class="py-3">
                        <span
                           class="badge
                            @if (in_array($order->status, ['pending', 'failed']))
                           bg-danger
                           @elseif(in_array($order->status, ['shipped', 'delivered']))
                           bg-success
                           @else
                           bg-info
                           @endif
                         m-0">
                           {{ __($order->status) }}
                        </span>
                     </td>
                     <td class="py-3">{{ format_price($order->total) }} Dhs</td>
                     <td class="py-3 align-middle">
                        <a href="{{ route('account.orders.show', ['id' => $order->id]) }}"
                           class="btn btn-link text-success">
                          {{__("Details")}}
                        </a>
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td class="text-center py-4"
                        colspan="5">
                        <h6 class="fs-base">{{ __('No Data') }}</h6>
                     </td>
                  </tr>
               @endforelse
            </tbody>
         </table>
      </div>
      {{ $orders->links() }}
   </div>
</x-account-layout>
