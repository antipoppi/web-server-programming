@extends('layouts.app')

@section('content')
    <h3>Customers</h3>
    <div class='boxi'>
        <table>
            <tr><th>Name</th><th>Birth date</th><th>Created at</th><th>Updated at</th></tr>
            @foreach ($customers as $customer)
                <tr>
                <td>
                    <a href='customers/{{ $customer->id}}/edit'>
                    {{ $customer->name }}
                    </a>
                </td>
                <td>{{ $customer->birth_date }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>{{ $customer->updated_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection