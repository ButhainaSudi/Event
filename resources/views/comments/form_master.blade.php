    <div class="row justify-content-center">
   

            <div class="col-md-8">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : "" }}">
                    {{ Form::text('comment',NULL, ['class'=>'form-control', 'id'=>'comment', 'placeholder'=>' Add Comments']) }}
                    {{ $errors->first('comment', '<p class="help-block">:message</p>') }}
                </div>
            </div>

            <div class="col-md-4">
                {{ Form::button(isset($model)? 'Comment' : 'Comment' , ['class'=>'btn btn-primary', 'type'=>'submit']) }}
            </div>

    </div>
