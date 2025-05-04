<x-app-layout>
    <div class="content-wrapper w-100">
        <div class="container d-block mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">@lang('locale.blood_biochemistry')</h4>
                            
                            <form action="{{ route('blood_chemistries.update', $bloodBioChemistry->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row overflow-auto">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4 col-sm-6 col-xs-12 mb-2">
                                        <select name="patient_id" id="patient_id" class="form-control" required>
                                            <option value="">@lang('locale.choose') @lang('locale.patient', ['suffix'=>'', 'prefix'=>app()->getLocale() == 'en' ? 'A' : 'Un'])</option>
                                            @foreach ($patients as $item)
                                            <option value="{{ $item->id }}" title="{{ $item->gender."_".$item->age }}" {{ $bloodBioChemistry->patient_id == $item->id ? 'selected' : '' }}>{{ $item->firstname." ".$item->name." | ".$item->age." ".__('locale.old_years')." | ".$item->gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12 mb-2">
                                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                                            <option value="">@lang('locale.choose') @lang('locale.doctor', ['suffix'=>'', 'prefix'=>app()->getLocale() == 'en' ? 'A' : 'Un'])</option>
                                            @foreach ($doctors as $item)
                                            <option value="{{ $item->id }}" {{ $bloodBioChemistry->doctor_id == $item->id ? 'selected' : '' }}>{{ $item->firstname." ".$item->name." | ".$item->phone." | ".$item->speciality->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-12" id="form-parameters"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $bloodBioChemistry->id }}">
    @push('scripts')
        <script src="{{ asset('js/azia.js') }}"></script>
        <script>
            let patient = $('[name=patient_id]').children('option:selected').attr('title');
            patient = patient.split('_');
            
            $('#form-parameters').load("{{ route('blood_chemistries.add') }}", {
                '_token':$('meta[name=csrf-token]').attr('content'), 
                'id':$('[name=id]').val(), 
                'gender':patient[0], 
                'age':patient[1]
            })

            $('[name=patient_id]').on('change', function() {
                if ($(this).children('option:selected').val() != '') {
                    let patient = $(this).children('option:selected').attr('title');
                    patient = patient.split('_');
                    
                    $('#form-parameters').load("{{ route('blood_chemistries.add') }}", {
                        '_token':$('meta[name=csrf-token]').attr('content'), 
                        'id':$('[name=id]').val(), 
                        'gender':patient[0], 
                        'age':patient[1]
                    })
                } else {
                    $('#form-parameters').html('');
                }
            })
        </script>
    @endpush
</x-app-layout>
