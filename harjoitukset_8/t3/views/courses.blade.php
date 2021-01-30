@extends('layouts.app-studetronic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kaikki kurssit</div>


                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nimi</th>
                            <th scope="col">ECTS-pisteet</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                    @foreach ($courses as $course)
                    
                        <tr class="bg-success">
                            <th scope="row">{{ $course->id }}</th>
                                <td><a href="{{ url('coursecredits') }}?id={{ $course->id }}">{{ $course->name }}</a></td>
                                <td>{{ $course->credits }}</td>
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