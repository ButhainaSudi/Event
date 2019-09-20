@extends('layouts.app')
@section('content')
      {{ Form::open(['route'=>'events.store', 'method'=>'POST','files'=> true]) }}
        @include('events.form_master')
      {{ form::close() }}
@endsection
