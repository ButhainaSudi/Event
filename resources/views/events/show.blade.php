@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header">
            
            <div class="col-md-12">
                
                <a class="btn btn-primary" href="{{ route('manage_apps.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
            
                {{ __('Details for : ') }} <strong>{{ $manage_app->version }}</strong>     
            </div>
        </div>

    
    <div class="card-body">

        <div class="form-group row">
            <div class="col-md-12">
            {{ $manage_app->release_notes }}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
            {{ $manage_app->macos_link }}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
            {{ $manage_app->macos_file }}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
            {{ $manage_app->windows_link }}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
            {{ $manage_app->windows_file }}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
            {{ $manage_app->created_at }}
            </div>
        </div>


    </div>

    </div>
    </div>
    </div>
    </div>
</div>

@endsection
