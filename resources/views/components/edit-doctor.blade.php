<div class="modal" id="edit-doctor{{ $doctor->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('locale.edit', ['param'=>__('locale.doctor', ['suffix'=>'', 'prefix'=>''])])</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctors.update', $doctor->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="firstname">@lang('locale.firstname') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="firstname" type="text" name="firstname" :value="$doctor->firstname" placeholder="{{ __('locale.firstname') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="name">@lang('locale.name') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="name" type="text" name="name" :value="$doctor->name" placeholder="{{ __('locale.name') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">                            
                            <div class="form-group">
                                <x-input-label for="address">@lang('locale.address') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="address" type="text" name="address" :value="$doctor->address" placeholder="{{ __('locale.address') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">                            
                            <div class="form-group">
                                <x-input-label for="phone">@lang('locale.phone') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="phone" type="number" name="phone" :value="$doctor->phone" placeholder="{{ __('locale.phone') }}" required />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="charge">@lang('locale.charge') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="charge" type="text" name="charge" :value="$doctor->charge" placeholder="{{ __('locale.charge') }}" required />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="begin">@lang('locale.begin') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="begin" type="date" name="begin" :value="$doctor->begin" placeholder="{{ __('locale.begin') }}" required />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="end">@lang('locale.end') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="end" type="date" name="end" :value="$doctor->end" placeholder="{{ __('locale.end') }}" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-input-label for="speciality">@lang('locale.speciality', ['suffix'=>'', 'prefix'=>'']) <span class="text-danger">*</span></x-input-label>
                                <select id="speciality" name="speciality_id" class="form-control" required>
                                    <option value="">@lang('locale.choose')</option>
                                    @foreach ($specialities as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $doctor->speciality_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-app-button class="btn-primary">@lang('locale.submit')</x-app-button>
                </div>
            </form>            
        </div>
    </div>
</div>