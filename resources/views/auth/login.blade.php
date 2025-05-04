<x-auth-layout>
    <!-- Session Status -->
    <div class="az-signin-wrapper">
        <div class="az-card-signin" style="border-top: 2px solid #3366ff; border-bottom: 8px solid #3366ff">
            <h5 class="text-center"><x-app-logo :height="50"></x-app-logo></h5>
            <div class="az-signin-header">
                <h6 class="text-center {{ $errors->get('email') ? 'text-danger' : '' }}">{{ $errors->get('email') ? $errors->get('email')[0] : __('locale.your_id') }}</h6>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div class="form-group">
                        <x-input-label for="email" :value="__('locale.email').' | '.__('locale.username')" />
                        <x-text-input id="email" type="text" name="email" placeholder="{{ __('locale.email').' | '.__('locale.username') }}" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
            
                    <!-- Password -->
                    <div class="form-group">
                        <x-input-label for="password" :value="__('locale.password')" />
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            <x-text-input id="password" type="password" name="password" placeholder="{{ __('locale.password') }}" required autocomplete="current-password" />
                        </div>
                    </div>
            
                    <div class="">
                        <div class="form-group float-left">
                            <label for="remember">
                                <input type="checkbox" name="remember" id="remember">
                                <span>@lang('locale.remember')</span>
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="float-right">@lang('locale.forgot_password')?</a>
                        @endif
                    </div>
                    <x-app-button class="btn-primary btn-block">@lang('locale.submit')</x-app-button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <x-app-pwd-script></x-app-pwd-script>
    @endpush
</x-auth-layout>
