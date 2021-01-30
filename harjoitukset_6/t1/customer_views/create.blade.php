<!DOCTYPE html>
<html>

<head>
    <title>Add Customer</title>
</head>

<body>
    <h1>Add Customer</h1>

    <form method="POST" action="../customers">

        {{ csrf_field() }}
        {{-- csrf_field() estää cross-site scripting uhat --}}

        <div>
            <input type="text" name="name" placeholder="Customer Name">
        </div>

        <div>
            <input type="text" name="birth_date" value="1999-09-09">
        </div>

        <div>
            <button type="submit">Save</button>
        </div>

    </form>

</body>

</html>