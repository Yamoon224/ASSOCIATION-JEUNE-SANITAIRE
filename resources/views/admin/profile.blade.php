<x-app-layout>
    <div class="az-content az-content-dashboard-eight">
        <div class="container d-block">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="az-content-body az-content-body-contacts">
                                <div class="az-contact-info-header">
                                    <div class="media">
                                        <div class="az-img-user">
                                            <img alt="" src="{{ uiavatar(auth()->user()->name) }}"/>
                                            <a href="">
                                                <i class="typcn typcn-camera-outline"></i>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="text-capitalize">{{ auth()->user()->group->name }}</h4>
                                            <p>{{ auth()->user()->firstname." ".auth()->user()->name }}</p>
                                            <nav class="nav">
                                                <a class="nav-link" href="">
                                                    <i class="typcn typcn-device-phone"></i> Call
                                                </a>
                                                <a class="nav-link" href="">
                                                    <i class="typcn typcn-messages"></i> Message
                                                </a>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="az-contact-action">
                                        <a href="">
                                            <i class="typcn typcn-edit"></i> @lang('locale.edit', ['param'=>'Profile'])
                                        </a>
                                    </div>
                                </div>
                                <div class="az-contact-info-body">
                                    <div class="media-list">
                                        <div class="media">
                                            <div class="media-icon">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <label>@lang('locale.phone')</label>
                                                    <span class="tx-medium">{{ auth()->user()->phone }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-icon align-self-start">
                                                <i class="far fa-envelope"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <label>@lang('locale.email')</label>
                                                    <span class="tx-medium">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-icon">
                                                <i class="far fa-map"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <label>@lang('locale.address')</label>
                                                    <span class="tx-medium">{{ auth()->user()->address }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    @endpush
</x-app-layout>
