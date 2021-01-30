{{-- TARPEETON

@extends('layouts.app-studetronic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Opiskelijan id=1 kurssit</div>


<div class="panel-body">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nimi</th>
      <th scope="col">ECTS-pisteet</th>
      <th scope="col">Luontipvm</th>
      <th scope="col">Pivot</th>
    </tr>
  </thead>
  <tbody>

@foreach ($studentincourses as $studentincourse)

    <tr class="bg-success">
      <th scope="row">{{ $studentincourse->id }}</th>
      <td>{{ $studentincourse->name }}</td>
      <td>{{ $studentincourse->credits }}</td>
      <td>{{ $studentincourse->created_at }}</td>
      <td>
      <!-- Tämä foreach on täällä vain esimerkin vuoksi, jotta
           nähdään pivotin sisältö. vaihda if(0) -> if(1) 
           nähdäksesi tämän sisällön-->
      @if(0)
        @foreach ($studentincourse->pivot as $key => $value)
            {{ $key }}   : {{ $value }}
        @endforeach
      @endif
      </td>
    </tr>

@endforeach

  </tbody>
</table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

--}}