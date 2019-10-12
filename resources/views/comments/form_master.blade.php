
                <div class="w3-col l10 m9">
                    {{ Form::text('comment',NULL, ['class'=>'form-control', 'id'=>'comment', 'placeholder'=>' Add Comments']) }}
                    {{ $errors->first('comment', '<p class="help-block">:message</p>') }}
                </div>
                <div class="w3-col l2 m3">
                    {{ Form::button(isset($model)? 'Comment' : 'Comment' , ['class'=>'btn btn-primary w3-right', 'type'=>'submit']) }}
                </div>
