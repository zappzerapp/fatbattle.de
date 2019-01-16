@extends('layouts.app')

@section('content')
    <div class="fatboard container text-center">
        @forelse ($users->sortByDesc('goalPercent') as $user)
            <div class="card" data-toggle="modal" data-target="#userChartModal{{ $user->id }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}
                    <small class="pl-1 text-black-50">({{ str_replace('.', ',', abs($user->weight)) }}kg)</small></h5>
                    @if($user->goalPercent >= 100)
                        <strong>{{ $user->missingWeight }} kg</strong> darüber
                    @else
                        Noch <strong>{{ $user->missingWeight }} kg</strong>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-sm">
                            <h6 class="text-muted">Aktuell</h6>
                            <h5>{{ $user->currentWeight }} kg</h5>
                        </div>
                        <div class="col-sm">
                            <h6 class="text-muted">Ziel</h6>
                            <h5>{{ $user->goal }} kg</h5>
                        </div>
                    </div>
                    <h6>
                        <div class="progress">
                            <div class="progress-bar text-black {{ $user->goalPercent >= 100 ? 'basic' : 'bg-success' }}"
                                 role="progressbar"
                                 style="width: {{ $user->goalPercent }}%"
                                 aria-valuenow="{{ $user->goalPercent }}"
                                 aria-valuemin="0" aria-valuemax="100">{{ $user->goalPercentLabel }}</div>
                        </div>
                        {{--<span>{{ $user->gainsInKg }} kg / {{ $user->gainsInPercent }}%</span>--}}
                    </h6>
                </div>
            </div>

            <div class="modal fade" id="userChartModal{{ $user->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="userChartLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="userChartLabel{{ $user->id }}">{{ $user->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <canvas id="userChart{{ $user->id }}" width="5" height="3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div>&nbsp;</div>
        @endforelse
    </div>
@endsection

@section('scripts')
    <script>
        @foreach($users as $user)
        new Chart(document.getElementById('userChart{{ $user->id }}'), {
            type: 'line',
            data: {
                labels: {!! $user->latestWeightDates !!},
                datasets: [{
                    label: false,
                    backgroundColor: 'rgba(167, 164, 0, 0.6)',
                    borderColor: 'rgba(167, 164, 0, 0.9)',
                    data: {!! $user->latestWeightValues !!},
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        display: true,
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'kg'
                        }
                    }]
                }
            }
        });
        @endforeach
    </script>
@endsection
