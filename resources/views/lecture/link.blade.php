@extends('layouts.sidebar') {{-- put two condition to show one form in active and deactive --}} 
@section('content')
<div class="container">
  @if ($user->url->activate)
  <div class="row justify-content-center">

    <div class="card w-50">
      <h5 class="card-header">Activation <i class="fas fa-link"></i></h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item text-center">

          <span class="badge badge-info " style=" height:40px; font-size:25px;">Stage: {{$user->stage}}</span>
          <span class="badge badge-info" style=" height:40px; font-size:25px;">Group: {{$user->group}}</span>
        </li>
        <li class="list-group-item text-center">

          <span class="badge badge-info " style=" height:40px; font-size:25px;">Hour : {{$user->url->hour}}</span>

        </li>
        <li class="list-group-item ">
          <div class="row">
            <div class="input-group w-75 mx-auto">
              <input type="text" class="form-control text-center" id="input-gen" value="{{$user->url->number}}" placeholder="Click on generate button"
                aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="gen-btn" disabled>Generate</button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <form action="/lecturer/link" method="post">
            @csrf
            <div class="row">
              <button type="submit" class="btn btn-warning w-75 mx-auto">Deactive</button>
            </div>
          </form>
        </li>
      </ul>
    </div>

  </div>
</div>




@else
<div class="row justify-content-center">

  <div class="card w-50">
    <h5 class="card-header">Activation <i class="fas fa-link"></i></h5>
    <ul class="list-group list-group-flush">
      <li class="list-group-item text-center">

        <span class="badge badge-info " style=" height:40px; font-size:25px;">Stage: {{$user->stage}}</span>
        <span class="badge badge-info" style=" height:40px; font-size:25px;">Group: {{$user->group}}</span>
      </li>
      <form action="/lecturer/link" method="post">
        @csrf
        <li class="list-group-item ">
          <div class="row">
            <div class="form-group w-75 mx-auto">
              <label for="exampleFormControlSelect1">Hour :</label>
              <select class="form-control" id="exampleFormControlSelect1" name="hour">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                </select>
            </div>
          </div>
        </li>
        <li class="list-group-item ">
          <div class="row">
            <div class="input-group w-75 mx-auto">
              <input type="text" class="form-control" id="input-gen" placeholder="Click on generate button" aria-label="Recipient's username"
                aria-describedby="button-addon2" name="number" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="gen-btn">Generate</button>
              </div>
            </div>
          </div>
        </li>
        @if (Session::has('count'))
        <li class="list-group-item text-center">

            <span class="badge badge-info " style=" height:40px; font-size:25px;">Attendance No. : {{Session::get('count')}}</span>
  
          </li>
            
        @endif
        <li class="list-group-item">
          <div class="row">
            <button type="submit" class="btn btn-success w-75 mx-auto">Activate</button>
          </div>
        </li>
      </form>
    </ul>
  </div>

</div>
<script>
  $(document).ready(function(){
        $("#gen-btn").click(function(){
          var number = Math.floor(Math.random() * 3350) + Math.floor(Math.random() * 3350);
        $("#input-gen").val(number);
        });
      });
</script>
@endif {{-- end of active form --}}


</div>
@endsection
 
@section('details')
<div class="card" style="width: 14rem;">
  <div class="card-body">
    <span class="btn btn-primary w-100">
        No. of students <span class="badge badge-light ml-2">{{$students->count()}}</span>
    </span>
    <br>
    <span class="btn btn-primary w-100 my-3">
        Link Status <span class="badge badge-light ml-4">{{auth()->user()->url->activate? 'True':'False'}}</span>
    </span>


  </div>
@endsection
 
@section('pageTitle', 'Link')