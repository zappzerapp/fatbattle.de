@extends('layouts.app')

@section('content')
    <div class="container text-center">
        @forelse ($users->sortByDesc('gainsInPercent') as $user)
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
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
                    <h6 class="{{ $user->gainsInPercent >= 10 ? 'text-success' : 'text-primary' }}">{{ $user->gainsInPercent }}
                        %</h6>
                </div>
            </div>
        @empty
            <div>&nbsp;</div>
        @endforelse
    </div>
@endsection