<div class="az-navbar az-navbar-two az-navbar-dashboard-eight">
    <div class="container">
        <div class="az-navbar-header">
            <a class="az-logo" href="{{ route('dashboard') }}"><x-app-logo :width="70" :height="70"></x-app-logo></a>
        </div>
        <ul class="nav">
            <li class="nav-label">Main Menu</li>
            <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-clipboard"></i> @lang('locale.dashboard')
                </a>
            </li>
            <li class="nav-item {{ Route::is('patients.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('patients.index') }}">
                    <i class="fa fa-users"></i> @lang('locale.patient', ['suffix'=>'s', 'prefix'=>''])
                </a>
            </li>
            <li class="nav-item {{ Route::is('doctors.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('doctors.index') }}">
                    <i class="fa fa-user-md"></i> @lang('locale.doctor', ['suffix'=>'s', 'prefix'=>''])
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="">
                    <i class="fa fa-file-medical-alt"></i>@lang('locale.examination', ['suffix'=>'s', 'prefix'=>''])
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item {{ Route::is('nfs.index') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('nfs.index') }}">@lang('locale.hematology', ['suffix'=>app()->getLocale() == 'en' ? 'y' : 'ie', 'prefix'=>'']) : @lang('locale.nfs')</a> 
                    </li>
                    <li class="nav-sub-item {{ Route::is('bs.index') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('blood_chemistries.index') }}">@lang('locale.biochimy', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '', 'prefix'=>'']) : @lang('locale.blood_biochemistry')</a> 
                    </li>
                    {{-- <li class="nav-sub-item">
                        <a class="nav-sub-link" href="">@lang('locale.parasitology', ['suffix'=>app()->getLocale() == 'en' ? 'y' : '', 'prefix'=>''])</a> 
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="">
                    <i class="fa fa-hospital-symbol"></i>@lang('locale.hospitalization', ['suffix'=>'s', 'prefix'=>''])
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item {{ Route::is('beds.index') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('beds.index') }}">@lang('locale.bed', ['prefix'=>''])</a> 
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>