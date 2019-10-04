@extends('layouts.app')
@section('content')
      {{ Form::model($manage_app,['route'=>['events.update',$manage_app->id],'method'=>'PATCH']) }}
      @include('events.form_master')
      {{ Form::close() }}

@endsection
