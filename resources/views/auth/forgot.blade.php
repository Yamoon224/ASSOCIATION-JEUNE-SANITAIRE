<x-auth-layout>
    <!-- Session Status -->
    <div class="az-signin-wrapper">
        <div class="az-card-signin" style="border-top: 2px solid #3366ff">
            <h5 class="text-center"><x-app-logo></x-app-logo></h5>
            <div class="az-signin-header">
                <h6 class="text-center {{ $errors->get('email') ? 'text-danger' : '' }} {{ session('status') ? 'text-success' : '' }}">{{ $errors->get('email') ? $errors->get('email')[0] : (session('status') ? session('status') : '') }}</h6>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div class="form-group">
                        <x-input-label for="email" :value="__('locale.email').' | '.__('locale.username')" />
                        <x-text-input id="email" type="text" name="email" placeholder="{{ __('locale.email').' | '.__('locale.username') }}" :value="old('email')" required autofocus autocomplete="off" />
                    </div>
            
                    <x-app-button class="btn-primary btn-block">@lang('locale.submit')</x-app-button>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
