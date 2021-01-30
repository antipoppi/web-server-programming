<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/carshopping.css') }}">
</head>
<body>
    <div id='container'>
        <!-- navbar-->
        <p>[<a href={{ url('/do_shopping') }}> Tee ostoksia </a>] [<a href={{ url('/basket_content') }}> Ostoskorin sisältö </a>]</p>
        <!-- content -->
        @yield('content')
        <!-- copyright -->
        <p><i>© Tatu Alatalo {{ date('d-m-Y')}}</i></p>
    </div>

</body>
</html>