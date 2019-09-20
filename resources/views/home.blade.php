@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <table><tr><td width=90%><h4>The Happening Parties</h4></td>
                    <td><a href="{{route('events.create')}}" class="btn btn-success btn-sm glyphicon glyphicon-plus">Post Your Event</a>
                    </td></tr></table>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
