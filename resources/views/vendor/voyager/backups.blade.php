@extends('voyager::master')

@section('page_title', 'Sauvgardes')

@section('page_header')
   <div class="container-fluid d-flex align-items-center"
      style="flex-wrap: wrap">
      <h1 class="page-title">
         <i class="voyager-file-text"></i>
         Sauvgardes
      </h1>
      <form action="{{ route('admin.backups.store') }}"
         method="POST"
         class="mr-2">
         @csrf
         <button class="btn btn-success mt-2">
            <i class="voyager-download mr-2"></i> <span>Générer un nouveau</span>
         </button>
      </form>
      <form action="{{ route('admin.backups.cleanup') }}"
         method="POST">
         @csrf
         @method('DELETE')
         <button class="btn btn-danger mt-2">
            <i class="voyager-trash mr-2"></i> <span>Nettoyer les sauvegardes (avant 1
               semaine)</span>
         </button>
      </form>
   </div>
@stop

@section('content')
   <div class="page-content browse container-fluid">
      @include('voyager::alerts')
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-bordered">
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTable"
                        class="table table-hover">
                        <thead>
                           <tr>
                              <th>
                                 Nom
                              </th>
                              <th>
                                 Taille
                              </th>
                              <th>
                                 Généré à
                              </th>
                              <th class="actions">
                                 {{ __('voyager::generic.actions') }}
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($backups as $backup)
                              <tr>
                                 <td>
                                    <a href="{{ route('admin.backups.download', ['filename' => $backup['filename']]) }}
                                             ">
                                       {{ $backup['filename'] }}
                                    </a>
                                 </td>
                                 <td>
                                    {{ $backup['size'] }}
                                 </td>
                                 <td>
                                    {{ $backup['generated_at'] }}
                                 </td>
                                 <td class="d-flex justify-content-end">
                                    <form
                                       action="{{ route('admin.backups.destroy', ['filename' => $backup['filename']]) }}"
                                       method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-sm btn-danger mr-2">
                                          <i class="voyager-trash"></i> Supprimer
                                       </button>
                                    </form>
                                    <a href="{{ route('admin.backups.download', ['filename' => $backup['filename']]) }}"
                                       class="btn btn-sm btn-success">
                                       <i class="voyager-download"></i> Télécharger
                                    </a>
                                 </td>
                              </tr>
                           @empty
                              <tr>
                                 <td colspan="4"
                                    style="text-align: center; padding : 20px">
                                    Aucune sauvegarde disponible
                                 </td>
                              </tr>
                           @endforelse
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@stop

@section('css')
   @if (config('dashboard.data_tables.responsive'))
      <link rel="stylesheet"
         href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
   @endif
@stop

@section('javascript')
   <!-- DataTables -->
   @if (config('dashboard.data_tables.responsive'))
      <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
   @endif
   <script>
      $(document).ready(function() {
         $('#search-input select').select2({
            minimumResultsForSearch: Infinity
         });

         $('.select_all').on('click', function(e) {
            $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger(
               'change');
         });
      });
   </script>
@stop
