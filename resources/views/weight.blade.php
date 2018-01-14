@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form method="POST" action="{{ route('weight.store') }}">
                    {{ csrf_field() }}
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <hr>
                    <div class="col-sm">
                        <h6>Gewicht in kg</h6>
                        <h5><input type="text" name="weight" placeholder="{{ $user->currentWeight }}" required
                                   class="form-control text-center"></h5>
                        <button type="submit" class="btn btn-primary">
                            Speichern
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
