<!DOCTYPE html>
<html>

  <head>
    <title>Customers</title>
    <style>
      table, th, td {
      border:1px solid black;border-collapse:collapse;
      }
    </style>
  </head>

  <body>
    <h1>Customer</h1>
            <h3>{{ $customer->name }}</h3>
            <p>Birth date: {{ $customer->birth_date }}</p>
          </tr>
  </body>

</html>