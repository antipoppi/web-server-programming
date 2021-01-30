@extends('layouts.app-studetronic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                {{-- tarkistetaan onko opiskelijalla opintosuorituksia --}}
                {{-- dd($studentcredits) --}}

                @if (count($studentcredits) > 0) 
                <div class="panel-heading">Opintosuoriteote {{ $studentcredits[0]->Sukunimi }} {{ $studentcredits[0]->Etunimi }}</div>

                <div class="panel-body">
                
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Sukunimi</th>
                        <th scope="col">Etunimi</th>
                        <th scope="col">Kurssi</th>
                        <th scope="col">ECTS-pisteet</th>
                        <th scope="col">Luontipvm</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($studentcredits as $studentcredit)
                        
                        <tr class="bg-success">
                        <th scope="row">{{ $studentcredit->id }}</th>
                        <td>{{ $studentcredit->Sukunimi }}</td>
                        <td>{{ $studentcredit->Etunimi }}</td>
                        <td>{{ $studentcredit->Kurssi }}</td>
                        <td>{{ $studentcredit->credits }}</td>
                        <td>{{ $studentcredit->created_at }}</td>
                        </tr>

                    @endforeach
                @else
                    <table class="table table-striped">
                    <tbody>
                        <td style="text-align:center">Opiskelijalla ei ole suoritettuja kursseja</td>
                    
                @endif
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection