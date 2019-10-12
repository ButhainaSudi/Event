@extends('layouts.app')

@section('content')
<br><br>
<!-- Navigation bar with social media icons -->

  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b><span class="w3-tag">EVENTS</span></b></h1>  
  </header>


  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l8 s12">
    
      <!-- Blog entry -->
        @foreach($event as $event => $value) 
        <div class="w3-container w3-white w3-margin w3-padding-large">
        <div class="w3-center">
            
            <h3>{{ $value->title }}</h3>
            <h5>{{ $value->venue }} <span class="w3-opacity">{{ $value->date }}</span></h5>
        </div>

        <div class="w3-justify">
          <img src="{{url($value->image? 'uploads/'.$value->image:'images/noimage.jpg')}}" style="width:100%" class="w3-padding-16">
          <p><strong>More Hats!</strong> {{ $value->description }}</p>
          
          {{ Form::open(['route'=>'events.store', 'method'=>'POST','files'=> true]) }}
            <input type="hidden" name="condition" value=1>
            <input type="hidden" name="event_id" value="{{ $value->id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <?php
                $number_of_attendants=0;
                foreach ($value->users as $attendant)
                {
                    $number_of_attendants++;
                }
            ?>

            <p class="w3-left"><button class="w3-button w3-white w3-border" onclick="likeFunction(this)"><b><i class="fa fa-thumbs-up"></i>{{ $number_of_attendants }} Attending</b></button></p>
          
          {{ form::close() }}

            <?php
                $number_of_comments=0;
                $listcomments = $value->comments()->get();
                foreach ($listcomments as $com)
                {
                    $number_of_comments++;
                }
            ?>
            
                                    
                     

            <p class="w3-right"><button class="w3-button w3-black" onclick="myFunction('demo1')" id="myBtn"><b>Comments  </b> <span class="w3-tag w3-white">{{ $number_of_comments }}</span></button></p>
            <p class="w3-clear"></p>
            <div class="w3-row w3-margin-bottom" id="demo1" style="display:none">
            <hr>
                @foreach ($listcomments as $listcomments)
                <?php
                    $commentwriters = $listcomments->user()->pluck("name");
                ?> 
                
                <div class="w3-col l10 m9">
                    <h4>{{ $commentwriters }} <span class="w3-opacity w3-medium">{{ $listcomments->comment }}</span></h4>
                    <p>May 3, 2015, 6:32 PM</p>
                </div>
                @endforeach
                {{ Form::open(['route'=>'comments.store', 'method'=>'POST','files'=> true]) }}
                    <input type="hidden" name="event_id" value="{{ $value->id }}">
                    @include('comments.form_master')     
                {{ form::close() }}
          </div>
        </div>
      </div>
      <hr>
      @endforeach
    </div>

    <!-- About/Information menu -->
    <div class="w3-col l4">
      <!-- About Card -->
        <div class="w3-white w3-margin">
            
            <div class="w3-container w3-black">
                <a href="{{route('events.create')}}"><h4><br>Post Your Event</h4></a>
                <br>
            </div>
            <img src="images/img-02.png" alt="Jane" style="width:100%" class="w3-grayscale">
        </div>
      <hr>

      <!-- Posts -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Popular Events</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
          <li class="w3-padding-16">
            <img src="/w3images/avatar_smoke.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Denim</span>
            <br>
            <span>Sed mattis nunc</span>
          </li>
          <li class="w3-padding-16">
            <img src="/w3images/bandmember.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Sweaters</span>
            <br>
            <span>Praes tinci sed</span>
          </li>
          <li class="w3-padding-16">
            <img src="/w3images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Workshop</span>
            <br>
            <span>Ultricies congue</span>
          </li>
          <li class="w3-padding-16">
            <img src="/w3images/avatar_smoke.jpg" alt="Image" class="w3-left w3-margin-right w3-sepia" style="width:50px">
            <span class="w3-large">Trends</span>
            <br>
            <span>Lorem ipsum dipsum</span>
          </li>
        </ul>
      </div>
      <hr>

      <!-- Advertising -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Events Calendar</h4>
        </div>
        <div class="w3-container w3-white">
          <div class="w3-container w3-display-container w3-light-grey w3-section" style="height:200px">
            <span class="w3-display-middle">Calendar goes here</span>
          </div>
        </div>
      </div>
      <hr>



      <!-- Inspiration -->
      <div class="w3-white w3-margin">
        <div class="w3-container w3-padding w3-black">
          <h4>Advertisements</h4>
        </div>
        <div class="w3-row-padding w3-white">
          <div class="w3-col s6">
            <p><img src="/w3images/jeans.jpg" alt="Jeans" style="width:100%"></p>
            <p><img src="/w3images/team1.jpg" alt="Jeans" style="width:100%"></p>
          </div>
          <div class="w3-col s6">
            <p><img src="/w3images/avatar_hat.jpg" alt="Men in Hats" style="width:100%" class="w3-grayscale"></p>
            <p><img src="/w3images/team4.jpg" alt="Jeans" style="width:100%"></p>
         </div>
        </div>
      </div>
      <hr>

    <!-- END About/Intro Menu -->
    </div>

  <!-- END GRID -->
  </div>

<!-- END w3-content -->
</div>
<footer class="w3-container w3-dark-grey" style="padding:32px">
  <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
</footer>
@endsection
