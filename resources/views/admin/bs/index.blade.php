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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title"><i class="fa fa-user-md"></i> @lang('locale.doctor', ['suffix'=>'s', 'prefix'=>''])</h4>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-with-icon" data-target="#create-doctor" data-toggle="modal">
                                        <i class="typcn typcn-document-add text-white"></i> @lang('locale.doctor', ['suffix'=>'', 'prefix'=>''])
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"> @lang('locale.blood_biochemistry')</h4>
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
                                    <a class="btn btn-primary btn-with-icon btn-block" href="{{ route('blood_chemistries.create') }}">
                                        <i class="typcn typcn-document-add text-white"></i> @lang('locale.blood_biochemistry')
                                    </a>
                                </div>
                            </div>
                            <div class="row overflow-auto">
                                <div class="col-12">
                                    <table cellspacing="0" class="table" id="order-listing" width="100%">
                                        <thead>
                                            <th>#</th>
                                            <th>@lang('locale.created_at')</th>
                                            <th>@lang('locale.doctor', ['suffix'=>'', 'prefix'=>''])</th>
                                            <th>@lang('locale.patient', ['suffix'=>'', 'prefix'=>''])</th>
                                            <th>@lang('locale.urea')</th>
                                            <th>@lang('locale.glycemy')</th>
                                            <th>@lang('locale.creatinine')</th>
                                            <th>@lang('locale.total_cholesterol')</th>
                                            <th>@lang('locale.hdl_cholesterol')</th>
                                            <th>@lang('locale.ldl_cholesterol')</th>
                                            <th>@lang('locale.c_hdl_report')</th>
                                            <th>@lang('locale.triglycerides')</th>
                                            <th>@lang('locale.asat_tgo')</th>
                                            <th>@lang('locale.alat_tgp')</th>
                                            <th>@lang('locale.sodium')</th>
                                            <th>@lang('locale.potassium')</th>
                                            <th>@lang('locale.chloride')</th>
                                            <th>@lang('locale.action', ['suffix'=>'s'])</th>
                                        </thead>
                                        <tbody>
                                            @foreach($bs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->doctor->firstname .' '. $item->doctor->name }}</td>
                                                <td>{{ $item->patient->firstname .' '. $item->patient->name }}</td>
                                                <td>{{ $item->urea }} g/L</td>
                                                <td>{{ $item->glycemy }} g/L</td>
                                                <td>{{ $item->creatinine }} mg/L</td>
                                                <td>{{ $item->total_cholesterol }} g/L</td>
                                                <td>{{ $item->hdl_cholesterol }} g/L</td>
                                                <td>{{ $item->ldl_cholesterol }} g/L</td>
                                                <td>{{ $item->c_hdl_report }} g/L</td>
                                                <td>{{ $item->triglycerides }} g/L</td>
                                                <td>{{ $item->asat_tgo }} UI/L</td>
                                                <td>{{ $item->alat_tgp }} UI/L</td>
                                                <td>{{ $item->sodium }} mEq/L</td>
                                                <td>{{ $item->potassium }} mEq/L</td>
                                                <td>{{ $item->chloride }} mEq/L</td>
                                                <td>
                                                    <div style="display: inline-block">
                                                        <a class="btn btn-primary" href="{{ route('blood_chemistries.edit', $item->id) }}">
                                                            <i class="typcn icon typcn-edit"></i>
                                                        </a>
                                                        <a class="btn btn-info" href="{{ route('blood_chemistries.pdf', $item->id) }}" title="@lang('locale.print')">
                                                            <i class="typcn icon typcn-printer"></i>
                                                        </a>
                                                    </div>
                                                    <form action="{{ route('blood_chemistries.destroy', $item->id) }}" style="display: inline-block" method="post">
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
        $(function(){
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
