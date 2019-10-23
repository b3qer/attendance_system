@extends('layouts.sidebar') 
@section('pageTitle', 'Report')
@section('content')

<div class="container">

  <div class="row my-3 text-right">
    <div class="col text-left">

    <span class="badge badge-info" style=" height:40px; font-size:25px;">Stage: {{auth()->user()->stage}}</span>
    <span class="badge badge-info" style=" height:40px; font-size:25px;">Group: {{auth()->user()->group}}</span>
    </div>
    <div class="col">
      <a class="btn btn-info download"  href="/lecturer/attendance/xlsx2" >Download</a>
    </div>
</div>

<div class="row py-3">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" style="width:70px;">#</th>
        <th scope="col" style="width:230px;">Name</th>
        <th scope="col" style="width:230px;">Attendance Hours</th>
        <th scope="col" style="width:230px;">Absence Hours</th>
       
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
          <th scope="col" style="width:70px;">{{$count++}}</th>
      <th scope="col" style="width:230px;">{{$student->name}}</th>
          <th scope="col"  style="width:230px;">{{$attendance[$count-2]}} Hours</th>
          <th scope="col"  style="width:230px;">{{$absence[$count-2]}} Hours</th>
          
          
  
        </tr>
          
      @endforeach
     


    </tbody>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="open-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Name</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/edit/name" method="POST">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">New name:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <span id="info"></span>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
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