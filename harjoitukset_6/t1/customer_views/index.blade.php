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
    <h1>Customers</h1>
      <table >
        <tr><th>Name</th><th>Birth date</th></tr>
        @foreach ($customers as $customer)
          <tr>
            <td>
                <a href='customers/{{ $customer->id}}'>
                {{ $customer->name }}
                </a>
            </td>
            <td>{{ $customer->birth_date }}</td>
          </tr>
        @endforeach
      </table>
      <p><i>© Tatu A</i></p>
  </body>

</html>