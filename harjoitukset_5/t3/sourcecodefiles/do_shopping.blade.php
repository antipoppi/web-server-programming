@extends('carshopping.master')

@section('title')
    <title>OstosKoriTori</title>
@endsection

@section('content')
    <h2>OstosKoriTori</h2>
    <div class="boxi">
        <p style="text-align: center;">Lisää auto ostoskoriin klikkaamalla kuvaa!</p>
        <a href="#"><img src="{{ asset('img/pexels-car.jpg') }}"/></a>
        <a href="#"><img src="{{ asset('img/pexels-van.jpg') }}"/></a>
    </div>
@endsection