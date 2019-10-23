@extends('layouts.sidebar') 
@section('pageTitle', 'Table') 
@section('content')
<div class="container">

  <div class="row my-3 text-right">
    <div class="col text-left">

      <span class="badge badge-info" style=" height:40px; font-size:25px;">Stage: {{auth()->user()->stage}}</span>
      <span class="badge badge-info" style=" height:40px; font-size:25px;">Group: {{auth()->user()->group}}</span>
    </div>
    <div class="col">
      <a class="btn btn-info download" href="/lecturer/attendance/xlsx" >Download</a>
    </div>
  </div>
 
  <div class="row py-3">
    <table class="table" id="dataTable">
      <thead>
        <tr>
          <th scope="col" style="width:70px;">#</th>
          <th scope="col" style="width:230px;">Name</th>
          <th scope="col">1</th>
          <th scope="col">2</th>
          <th scope="col">3</th>
          <th scope="col">4</th>
          <th scope="col">5</th>
          <th scope="col">6</th>
          <th scope="col">7</th>
          <th scope="col">8</th>
          <th scope="col">9</th>
          <th scope="col">10</th>
          {{--
          <th scope="col">Action</th> --}}
        </tr>
      </thead>
      <tbody>
        @if ($checkStd) @foreach ($students as $student)


        <tr>
          <th scope="col" style="width:70px;">{{$count++}}</th>
          <th scope="col" style="width:230px;">{{$student->name}}</th>
          @if ($check) @foreach ($status = $student->status->where('user_id',auth()->user()->id)->sortBy('created_at') as $item)
          <th scope="col" data-toggle="tooltip" data-placement="bottom" title="{{$item->created_at->toDateString()}} , {{$item->hour}} hours">
            @if ($item->status == true)
            <i class="fas fa-check " style="color:#00b700;"></i>
            
             @else
            <i class="fas fa-times" style="color:#db0000;"></i> 
            
            @endif
          </th>
          @endforeach @endif 


        </tr>
        @endforeach @endif


      </tbody>
    </table>
   
    <div>
    </div>
    <script>
      $(document).on("click", ".open-edit", function () {
     var name = $(this).data('name');
     var id = $(this).data('id');
    
     $(".modal-body #name").attr("placeholder", name);
     $(".modal-body #info").text('ID : '+id);
     $(".modal-body #info").hide();
});

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
    </script>
@endsection
 
@section('baqer')
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
    </div>
@endsection