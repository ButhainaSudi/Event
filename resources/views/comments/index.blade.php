@extends('layouts.app')

@section('content')
    @foreach($comment as $comment => $value)            
        <div class="w3-card-4">
            <div class="w3-container">
                <p>{{ $value->comment }}</p>
            </div>
        </div>
        <br><br>
    @endforeach

@endsection