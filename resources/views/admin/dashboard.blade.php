<x-app-layout>
    <div class="az-content az-content-dashboard-eight">
        <div class="container d-block">
            <h2 class="az-content-title tx-24 mg-b-5">@lang('locale.hi_welcomeback')</h2>
            <p class="mg-b-20 mg-lg-b-25">@lang('locale.manage_app', ['param'=>config('app.name', 'Laravel')])</p>
            <div class="row row-sm mg-b-20">
                <div class="col-lg-12">
                    <div class="row row-xs row-sm--sm mg-b-20">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Chirurgie</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Gastro-Antherologie</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Générale</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Gynécologie</div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- second line --}}
                    <div class="row row-xs row-sm--sm mg-b-20">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Laboratoire</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Maternité</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Pédiatrie</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-top-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Radiographie</div>
                            </div>
                        </div>
                    </div>

                    {{-- third line --}}
                    <div class="row row-xs row-sm--sm">
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-bottom-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Urgence</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="card card-bottom-primary text-center">
                                <div class="card-body">
                                    <i class="fa fa-user-md fa-4x"></i>
                                </div>
                                <div class="card-footer">Urologie</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mg-t-20">
                    <div class="card card-dashboard-twenty ht-md-100p">
                        <div class="card-body">
                            <h6 class="az-content-label tx-13 mg-b-20">
                                Statistique <span>(Annuelle)</span>
                            </h6>
                            <div class="chartjs-wrapper">
                                <canvas id="chartBar6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mg-t-20">
                    <div class="row row-sm">
                        <div class="col-sm-6">
                            <div class="card card-dashboard-twenty">
                                <div class="card-body">
                                    <label class="az-content-label tx-13 tx-success">Recettes</label>
                                    <p>Customers who have upgraded the level of your products or service.</p>
                                    <div class="expansion-value">
                                        <strong>$1,500</strong>
                                        <strong>$1,120</strong>
                                    </div>
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-success wd-70p" role="progressbar">
                                        </div>
                                    </div>
                                    <div class="expansion-label">
                                        <span>This Month</span>
                                        <span>Previous Month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                            <div class="card card-dashboard-twenty ht-md-100p">
                                <div class="card-body">
                                    <label class="az-content-label tx-13 tx-danger">
                                        Dépenses
                                    </label>
                                    <p>Customers who have ended their subscription with you.</p>
                                    <div class="expansion-value">
                                        <strong>$1,900</strong>
                                        <strong>$1,680</strong>
                                    </div>
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar wd-50p bg-danger" role="progressbar">
                                        </div>
                                    </div>
                                    <div class="expansion-label">
                                        <span>This Month</span>
                                        <span>Previous Month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mg-t-20">
                            <div class="card card-dashboard-progress">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between mg-b-25">
                                        <label class="az-content-label tx-13 mg-b-10 mg-sm-b-0">Natalité / Mortalité</label>
                                        <ul class="progress-legend">
                                            <li>Expansion</li>
                                            <li>New</li>
                                        </ul>
                                    </div>
                                    <div class="media">
                                        <label>None:</label>
                                        <div class="media-body">
                                            <div class="progress" id="progressBar1">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar bg-primary" role="progressbar">
                                                </div>
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar bg-teal" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <label>Partner:</label>
                                        <div class="media-body">
                                            <div class="progress" id="progressBar2">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar bg-primary" role="progressbar">
                                                </div>
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar bg-teal" role="progressbar">
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
    <script src="{{ asset('lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('lib/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('js/azia.js') }}"></script>
    <script src="{{ asset('js/chart.flot.sampledata.js') }}"></script>

    <script>
        $(function(){
            'use strict'

            var ctx6 = document.getElementById('chartBar6').getContext('2d');
            new Chart(ctx6, {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [{
                data: [150,110,90,115,125,160,160,140,100,110,120,120],
                backgroundColor: '#2b91fe'
                },{
                data: [180,140,120,135,155,170,180,150,140,150,130,130],
                backgroundColor: '#054790'
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                display: false,
                    labels: {
                    display: false
                    }
                },
                scales: {
                xAxes: [{
                    //stacked: true,
                    display: false,
                    barPercentage: 0.5,
                    ticks: {
                    beginAtZero:true,
                    fontSize: 11
                    }
                }],
                yAxes: [{
                    ticks: {
                    fontSize: 10,
                    color: '#eee',
                    min: 80,
                    max: 200
                    }
                }]
                }
            }
            });

            // Progress
            var prog1 = $('#progressBar1 .progress-bar:first-child');
            prog1.css('width','30%');
            prog1.attr('aria-valuenow','30');
            prog1.text('30%');

            var prog2 = $('#progressBar1 .progress-bar:last-child');
            prog2.css('width','53%');
            prog2.attr('aria-valuenow', '53');
            prog2.text('53%');

            // Progress
            var prog3 = $('#progressBar2 .progress-bar:first-child');
            prog3.css('width','35%');
            prog3.attr('aria-valuenow','35');
            prog3.text('35%');

            var prog4 = $('#progressBar2 .progress-bar:last-child');
            prog4.css('width','37%');
            prog4.attr('aria-valuenow', '37');
            prog4.text('37%');

        });
    </script>  
    @endpush
</x-app-layout>
