<!DOCTYPE HTML>
<html lang="fi">

<head>
    <title>Customers</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="{{ url('/css/customers.css') }}" type="text/css">
</head>

<body>
    <div id="container">
        @include('customers.navbar') {{-- navbar.blade.php --}}
        @yield('content')
        <br>
        <p id="footer"><i>© Tatu A {{ date('d-m-Y')}}</i></p>
    </div>
</body>

</html>