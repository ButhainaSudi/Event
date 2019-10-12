
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Tell Us your New Event</div>

    
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-4 col-form-label text-md-right">
                {!! form::label('title','Event Title:') !!}
            </div>
        
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
                    {{ Form::text('title',NULL, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>' Tell us the name of your event']) }}
                    {{ $errors->first('title', '<p class="help-block">:message</p>') }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-form-label text-md-right">
                {!! form::label('description','Event Description:') !!}
            </div>
        
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
                    {{ Form::text('description',NULL, ['class'=>'form-control', 'id'=>'description', 'placeholder'=>' Describe your event in a few words']) }}
                    {{ $errors->first('description', '<p class="help-block">:message</p>') }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-form-label text-md-right">
                {!! form::label('date','Event Date:') !!}
            </div>
        
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
                    
                    {{ Form::date('date', \Carbon\Carbon::now(), ['class'=>'form-control datepicker']) }}
                    {{ $errors->first('date', '<p class="help-block">:message</p>') }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-form-label text-md-right">
                {!! form::label('venue','Event Venue:') !!}
            </div>
        
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
                    {{ Form::text('venue',NULL, ['class'=>'form-control', 'id'=>'venue', 'placeholder'=>' Where do the people show up?']) }}
                    {{ $errors->first('venue', '<p class="help-block">:message</p>') }}
                </div>
            </div>
        </div>

        
                {!! Form::open(['files'=>true]) !!}
            
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">
                    {!! form::label('image','Poster Image:') !!}
                </div>

                <div class="col-md-8">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
                       {!! Form::file('image',["class"=>"form-control", "accept"=>"image/gif,image/jpeg,image/png,image/jpg"]) !!}
                        {{ $errors->first('venue', '<p class="help-block">:message</p>') }}
                    </div>
                    
                </div>
            </div>

        <div class="form-group row mb-0">
            <div class="col-md-12"><br><br>
                {{ Form::button(isset($model)? 'Save The Event' : 'Save The Event' , ['class'=>'btn btn-primary btn-block', 'type'=>'submit']) }}
            </div><br>
        </div>

    </div>

    </div>
    </div>
    </div>
    </div>
</div>