@extends('layouts.sidebar') 
@section('pageTitle', 'Edit Table') 
@section('content')
<div class="container">

 
  <div class="row my-3 text-right">

    <div class="col text-left">

      <span class="badge badge-info" style=" height:40px; font-size:25px;">Stage: {{auth()->user()->stage}}</span>
      <span class="badge badge-info" style=" height:40px; font-size:25px;">Group: {{auth()->user()->group}}</span>
    </div>
    <div class="col">
     
      <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Delete
              </button>
        <div class="dropdown-menu">
          <a class="dropdown-item delete-all" href="#delete-all" data-toggle="modal" data-id="1" data-type="delete information"> Delete information</a>
        
          
          <a class="dropdown-item delete-all" href="#delete-all" data-toggle="modal" data-id="2" data-type="delete all">Delete all</a>
        </div>
      </div>


    </div>
  </div>
  <div class="row py-3">
    <table class="table">
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
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if ($checkStd)
         @foreach ($students as $student)
        <tr>
          <th scope="col" style="width:70px;">{{$count++}}</th>
          <th scope="col" style="width:230px;">{{$student->name}}</th>
          @if ($check) @foreach ($status = $student->status->where('user_id',auth()->user()->id)->sortBy('created_at') as $item)
          <th scope="col" style="width:60px;">
            @if ($item->status == true)
            <i class="fas fa-check " style="color:#00b700;"></i> @else
            <i class="fas fa-times" style="color:#db0000;"></i> @endif
          </th>
          @endforeach @for ($i = $number; $i < 10; $i++) <th scope="col" >
            </th>
            @endfor
            <th scope="col" ><a href="#delete" data-toggle="modal" class="badge badge-danger delete" data-id="{{$student->id}}"><i class="fas fa-trash-alt"></i> Delete</a>
              <a href="#open-edit" data-toggle="modal" class="badge badge-danger open-edit" data-name="{{$student->name}}" data-id="{{$student->id}}"><i class="fas fa-edit"></i> Edit</a>
            </th>
            @endif 

        </tr>



        @endforeach @endif



      </tbody>
    </table>
    <!-- Modal to delete one row -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm to delete one row</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
          </div>
          <form action="/lecturer/delete/row" method="post">
            @csrf
            <div class="modal-body">
              <p>Do you want to delete this name?</p>
              <input type="text" id="info" name="id">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div>

      {{-- modal to edit the name--}}
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
                <div class="form-group  text-center">
                   <input type="radio"  id="first" value="Disable"> Change name
                   <input type="radio" class="ml-4"  id="second" value="enable"> Change last lecture
  
                  </div>
              <form action="/lecturer/edit/name" method="POST">
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">New name:</label>
                  <input type="text" class="form-control text-right for-name" id="name" name="name" >

                </div>
                <div class="form-group mt-3   ">
                    <label for="exampleFormControlSelect1">Select Status:</label>
                    <select class="form-control select-status" id="exampleFormControlSelect1" name="status" disabled>
                      <option value="0">False</option>
                      <option value="1">True</option>
                    </select>
                  </div>

                <input type="text" id="info" name="id">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    {{-- modal three --}}
    <div class="modal fade" id="delete-all" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="thetitle"> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
          </div>
          <form action="/lecturer/edit/delete" method="post">
            @csrf
          <div class="modal-body">
            <p>Do you want to delete ?</p>
           
            <input type="text" name="info" id="info">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </form>
      </div>
    </div>
    <div>


    </div>
    <script>
 $(document).on("click", ".delete", function () {
     
     var id = $(this).data('id');
     $(".modal-body #info").val(id);
     $(".modal-body #info").hide();
});

$(document).on("click", ".delete-all", function () {
     var type = $(this).data('type');
     var id = $(this).data('id');
     
     $(".modal-header #thetitle").text("Confirm to "+type);
     $(".modal-body #info").text(id);
     $(".modal-body #info").hide();
});
$(document).on("click", ".open-edit", function () {
     var name = $(this).data('name');
     var id = $(this).data('id');
    
     $(".modal-body #name").attr("placeholder", name);
     $(".modal-body #info").val(id);
     $(".modal-body #info").hide();
});


$(document).ready(function() {
  $(".modal-body #first").prop('checked', true);
$(".modal-body input:radio").change(function() {
if ($(this).val() == "Disable") {

  $(".for-name").attr('disabled', false);
  $(".select-status").attr('disabled', true);
  $(".modal-body #second").prop('checked', false);
}
else {
  $(".select-status").attr('disabled', false);
  $(".for-name").attr('disabled', true);
  $(".modal-body #first").prop('checked', false);
}
});
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
      Link Status <span class="badge badge-light ml-4"> {{auth()->user()->url->activate? 'True':'False'}}</span>
        </span>


      </div>
    </div>
@endsection