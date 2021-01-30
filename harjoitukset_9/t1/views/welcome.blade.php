@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ScoreTronic - Root folder [ / ]<br>
                    Login is not required to view this page

                </div>
            </div>
        </div>
</div>
@endsection