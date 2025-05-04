<x-app-layout>
    @push('links')
    <link href="{{ asset('lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet"/>
    @endpush

    <div class="content-wrapper w-100">
        <div class="container d-block mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> @lang('locale.nfs')</h4>
                            <div class="row grid-margin mb-2">
                                @if (!empty(session('message')))
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <strong>@lang('locale.success')</strong>
                                        {{ session('message') }}
                                    </div>
                                </div>
                                @endif
                                
                                <div class="col-12">
                                    <a class="btn btn-primary btn-with-icon btn-block" href="{{ route('nfs.create') }}">
                                        <i class="typcn typcn-document-add text-white"></i> @lang('locale.nfs')
                                    </a>
                                </div>
                            </div>
                            <div class="row overflow-auto">
                                <div class="col-12">
                                    <table cellspacing="0" class="table" id="order-listing" width="100%">
                                        <thead>
                                            <th>#</th>
                                            <th>@lang('locale.created_at')</th>
                                            <th>@lang('locale.patient', ['suffix'=>'', 'prefix'=>''])</th>
                                            <th>@lang('locale.white_globule')</th>
                                            <th>@lang('locale.red_globule')</th>
                                            <th>@lang('locale.hemoglobine')</th>
                                            <th>@lang('locale.hematocrite')</th>
                                            <th>@lang('locale.vm')</th>
                                            <th>@lang('locale.tcmh')</th>
                                            <th>@lang('locale.ccmh')</th>
                                            <th>@lang('locale.plaquettes')</th>
                                            <th>@lang('locale.neutrophiles')</th>
                                            <th>@lang('locale.basophiles')</th>
                                            <th>@lang('locale.eosinophiles')</th>
                                            <th>@lang('locale.monocytes')</th>
                                            <th>@lang('locale.lymphocytes')</th>
                                            <th>@lang('locale.action', ['suffix'=>'s'])</th>
                                        </thead>
                                        <tbody>
                                            @foreach($nfs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->patient->firstname .' '. $item->patient->name }}</td>
                                                <td>{{ $item->white_globule }} 10³/mm³</td>
                                                <td>{{ $item->red_globule }} 10⁶/mm³</td>
                                                <td>{{ $item->hemoglobine }} g/100 mL</td>
                                                <td>{{ $item->hematocrite }} %</td>
                                                <td>{{ $item->vm }} fl</td>
                                                <td>{{ $item->tcmh }} pg</td>
                                                <td>{{ $item->ccmh }} g/100 mL</td>
                                                <td>{{ $item->plaquettes }} 10³/mm³</td>
                                                <td>{{ $item->neutrophiles }} %</td>
                                                <td>{{ $item->basophiles }} %</td>
                                                <td>{{ $item->eosinophiles }} %</td>
                                                <td>{{ $item->monocytes }} %</td>
                                                <td>{{ $item->lymphocytes }} %</td>
                                                <td>
                                                    <div style="display: inline-block">
                                                        <a class="btn btn-primary" href="{{ route('nfs.edit', $item->id) }}">
                                                            <i class="typcn icon typcn-edit"></i>
                                                        </a>
                                                        <a class="btn btn-info" href="{{ route('nfs.pdf', $item->id) }}" title="@lang('locale.print')">
                                                            <i class="typcn icon typcn-printer"></i>
                                                        </a>
                                                    </div>
                                                    <form action="{{ route('nfs.destroy', $item->id) }}" style="display: inline-block" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" onclick="if(!confirm('@lang('locale.do_you_confirm')')){ return false }">
                                                            <i class="typcn typcn-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('js/azia.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-dt/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive-dt/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            'use strict'
    
            $('#order-listing').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: "@lang('locale.search')...",
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
    
            $('#order-listing').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
    
            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        });
    </script> 
    @endpush
</x-app-layout>
