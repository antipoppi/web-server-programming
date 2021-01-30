@extends('layouts.app')

@section('content')
{{ csrf_field() }}
<h3>Customers</h3>
<div class='boxi'>
    <table>
        @if ($searchData->customers->count() >= 1)
            <tr>
                <th>Name</th>
                <th>Birth date</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            @foreach ($searchData->customers as $customer)
            <tr>
                <td>
                    <a href='{{ $customer->id}}/edit'>
                        {{ $customer->name }}
                    </a>
                </td>
                <td>{{ $customer->birth_date }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>{{ $customer->updated_at }}</td>
            </tr>
            @endforeach
        @else
            <p>Haulla "{{$searchData->searchtext}}" ei löytynyt tuloksia</p>
        @endif
    </table>
</div>
@endsection