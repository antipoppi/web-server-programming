@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">



            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Ilmoita harjoituspisteesi - Harjoitukset {{$hnro}}</h3>
                    <p>Voit ilmoittaa kunkin harjoitustehtäväsarjan pisteet vain kerran. 
                        Vastauksiisi viittaava URL kannattaa kopioida leikepöydän kautta sellaisen selainikkunan osoiteriviltä, 
                        jonka olet todennut olevan oikea. Ole huolellinen!
                    </p>
                    <hr>
                    @if (session('info_msg'))
                        <div class="alert alert-info">
                            {{ session('info_msg') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('addscores')}}">
                        @csrf
                        <div class="col-md-12 col-md-offset-1">
                            <input name="hnro" type="hidden" value={{$hnro}}>
                            <input name="url" style="width:80%" type="text" placeholder="Kopioi/liitä tähän URL, josta vastauksesi löytyvät">
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                        {{-- dd($harkkatehtavat) --}}
                        @foreach ($harkkatehtavat as $tehtava)
                            <select name="{{$tehtava->tnro}}" style="width:50%;margin-top:10px;">Tehtävä {{$tehtava->tnro}}
                                <option value="starter" selected>Tehtävä {{$tehtava->tnro}}</option>
                                @for ($i = 0; $i <= $tehtava->maxpist; $i++)
                                    <option value={{$i}}>{{$i}} pistettä</option>
                                @endfor
                            </select><br>
                        @endforeach
                        
                        <button type="submit" class="btn btn-primary" style="margin-top:10px">
                            Tallenna
                        </button>
                        </div>
                    </form>
                </div>
            </div>
    
                
        </div>
    </div>
</div>
{{--dd($harkkatehtavat) --}}
@endsection