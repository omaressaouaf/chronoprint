<x-account-layout :title="__('Manage your delivery addresses')"
   active-page="Addresses">
   <div class="table-responsive has-cool-scrollbar fs-md">
      <table class="table table-hover mb-0">
         <thead>
            <tr>
               <th>{{ __('Name') }}</th>
               <th>{{ __('Phone') }}</th>
               <th>{{ __('Email') }}</th>
               <th>{{ __('Address') }}</th>
               <th>{{ __('Actions') }}</th>
            </tr>
         </thead>
         <tbody>
            @forelse ($addresses as $address)
               <tr>
                  <td class="py-3 align-middle">{{ $address->name }}</td>
                  <td class="py-3 align-middle">{{ $address->phone }}</td>
                  <td class="py-3 align-middle">{{ $address->email }}</td>
                  <td class="py-3 align-middle text-capitalize">
                     {{ $address->city . ', ' . $address->line . ', ' . $address->zip }}</td>
                  <td class="py-3 align-middle">
                     <form
                        action="{{ route('account.addresses.destroy', ['address' => $address->id]) }}"
                        method="POST">
                        @csrf
                        @method("delete")
                        <button onclick="return confirm('{{ __('Are you sure ?') }}')"
                           type="submit"
                           class="btn btn-link text-danger"
                           data-bs-toggle="tooltip">
                           <i class="ci-trash"></i>
                        </button>
                     </form>
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
   <div class="text-sm-end pt-4">
      <button data-bs-target="#address-form-modal"
         data-bs-toggle="modal"
         class="btn btn-primary">{{ __('Add address') }}</button>
   </div>
   <livewire:addresses.form :should-emit="false" />
</x-account-layout>
