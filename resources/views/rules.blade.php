@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>Regeln</h4>
                <p>
                    <span class="badge badge-primary">1</span>
                    <span>Entweder 10% Abnahme <strong>oder</strong> 10% Zunahme des Startgewichts</span>
                </p>
                <p>
                    <span class="badge badge-primary">2</span>
                    <span>Nach dem Erreichen des Zielgewichts muss es <strong>7 Tage</strong> gehalten werden</span>
                </p>
                <p>
                    <span class="badge badge-primary">3</span>
                    <span>Gemessen wird <strong>NUR</strong> auf der gleichen Waage (<em>steht in der Abteilung scoopOS</em>)</span>
                </p>
                <p>
                    <span class="badge badge-primary">4</span>
                    <span>Es muss mind. <strong>ein Zeuge</strong> für die Eingabe des Gewichts vorhanden sein</span>
                </p>
                <p>
                    <span class="badge badge-primary">5</span>
                    <span>Einmal begonnen, muss es dann auch durchgezogen werden <i class="fa fa-smile-o"></i></span>
                </p>
            </div>
        </div>
    </div>
@endsection
