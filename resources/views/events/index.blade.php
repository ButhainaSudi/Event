@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-center">
    <div class="col-md-10">

                    

                <div class="row"> 
                <div class="w3-row-padding w3-theme">
                    @foreach($event as $event => $value)                     
                    <div class="w3-col s12 m12 l6 w3-section">
                        <div class="w3-card-4">
                                <div class="w3-container w3-white">
                                    <br><h4><strong>{{ $value->title }}</strong></h4>
                                    <p>{{ $value->description }}</p>
                                    <p>Date <strong>{{ $value->date }}</strong></p>
                                    <p>Venue <strong>{{ $value->venue }}</strong></p>

                                    <div class="login100-pic js-tilt" data-tilt>
                                        <img src="{{url($value->image? 'uploads/'.$value->image:'images/noimage.jpg')}}" style="width:100%">
                                    </div><br><hr>

                                    <?php
                                        //$event = App\User::find(1);
                                        $number_of_attendants=0;
                                        foreach ($value->users as $attendant)
                                        {
                                            $number_of_attendants++;
                                        }
                                    ?>
                                    {{ Form::open(['route'=>'eventuser.store', 'method'=>'POST','files'=> true]) }}
                                        <input type="hidden" name="event_id" value="{{ $value->id }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button class="w3-button w3-green w3-round">Attend ({{ $number_of_attendants }})</button>
                                            </div>
                                            <div class="col-md-4">
                                            <button class="w3-button w3-grey w3-round">Maybe ({{ $number_of_attendants }})</button>
           
                                            </div>
                                            <div class="col-md-4">
                                            <button class="w3-button w3-red w3-round">RSVP ({{ $number_of_attendants }})</button>
                                            </div>
                                        </div>
                                        <br>
                                            
                                    {{ form::close() }}
                                    
                                    <!--<button  onclick="window.location.href = 'attendance';" class="w3-button w3-green w3-round"><h3>Attending ({{ $number_of_attendants }})</h3></button>
                                    <button class="w3-button w3-grey w3-round"><h3>Maybe ({{ $number_of_attendants }})</h3></button>
                                    <button class="w3-button w3-red w3-round"><h3>RSVP ({{ $number_of_attendants }})</h3></button>!-->
                                    
                                    
                                    
                                    <?php
                                        $listcomments = $value->comments()->get();
                                        
                                    ?>

                                    @foreach ($listcomments as $listcomments) 
                                    <?php
                                        $commentwriters = $listcomments->user()->pluck('name');
                                    ?>
                                        <p><strong>{{ $commentwriters }}</strong> {{ $listcomments->comment }}</p>
                                    @endforeach
                                    
                                    {{ Form::open(['route'=>'comments.store', 'method'=>'POST','files'=> true]) }}
                                        <input type="hidden" name="event_id" value="{{ $value->id }}">

                                        @include('comments.form_master')
                                            
                                    {{ form::close() }}
                                    
                                    
                                
                                </div>
                        </div>
                    </div>
                            

                    @endforeach
                </div>
                </div>
       

    </div>
    
    <div class="col-md-2">
        
        <div class="row pull-right">
            <a href="{{route('events.create')}}" class="btn btn-success btn-sm glyphicon glyphicon-plus">Post Your Event</a>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>
        <br><br>
            
        <div class="row">            
            <div class="w3-card-4">
                <div class="w3-container w3-white">
                    <h4><strong>Trending Events</strong></h4>
                    <ul>
                        <li>Shebby's Birthday Party</li><br>
                        <li>trial2</li><br>
                        <li>trial3</li><br>
                    </ul>
            
                </div>
            </div>
        </div>
        <br>

        <div class="row"> 
        <div class="w3-card-4">
        <div class="w3-container w3-white">
            <h4><strong>Upcoming Events</strong></h4>
            <ul>
                <li>Shebby's Birthday Party</li><br>
                <li>trial2</li><br>
                <li>Ceremony of All</li><br>
            </ul>
            <br><hr>
        </div></div>
        </div>

    </div> 
    </div>
</div>
@endsection