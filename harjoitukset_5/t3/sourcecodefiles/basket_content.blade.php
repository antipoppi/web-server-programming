@extends('carshopping.master')

@section('title')
    <title>OstosKoriTori ostoskori</title>
@endsection

@section('content')
    <h2>OstosKoriTorin ostoskorin sisältö</h2>
    <div class="boxi">
        <ul>
            <li><img id="shop_cart_img" src="{{ asset('img/pexels-car.jpg') }}">Car 0kpl</li><br>
            <li><img id="shop_cart_img" src="{{ asset('img/pexels-van.jpg') }}">Van 0kpl</li><br>
            <li><a href="#">Tyhjennä ostoskori</a></li>
        </ul>
    </div>
@endsection