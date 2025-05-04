<div class="modal" id="edit-patient{{ $patient->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('locale.edit', ['param'=>__('locale.patient', ['suffix'=>'', 'prefix'=>''])])</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('patients.update', $patient->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="firstname">@lang('locale.firstname') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="firstname" type="text" name="firstname" :value="$patient->firstname" placeholder="{{ __('locale.firstname') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="name">@lang('locale.name') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="name" type="text" name="name" :value="$patient->name" placeholder="{{ __('locale.name') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="birthday">@lang('locale.birthday') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="birthday" type="date" name="birthday" :value="$patient->birthday" required />
                            </div>
                            <div class="form-group">
                                <x-input-label for="address">@lang('locale.address') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="address" type="text" name="address" :value="$patient->address" placeholder="{{ __('locale.address') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <x-input-label for="support">@lang('locale.support') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="support" type="text" name="support" :value="$patient->support" placeholder="{{ __('locale.support') }}" required />
                            </div>  
                            <div class="form-group">
                                <x-input-label for="gender">@lang('locale.gender') <span class="text-danger">*</span></x-input-label>
                                <select name="gender" id="gender" class="form-control select2" required>
                                    <option value="M" {{ $patient->gender == 'M' ? 'selected' : '' }}>@lang('locale.male')</option>
                                    <option value="F" {{ $patient->gender == 'F' ? 'selected' : '' }}>@lang('locale.female')</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <x-input-label for="phone">@lang('locale.phone') <span class="text-danger">*</span></x-input-label>
                                <x-text-input id="phone" type="number" name="phone" :value="$patient->phone" placeholder="{{ __('locale.phone') }}" required />
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