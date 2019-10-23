@extends('monitor.navbar') 
@section('content')
<div class="container-fluid">
<div class="row ">
    <div class="col-6">
        <form action="/monitor/stage" method="post">
            @csrf
           
    
                <div class="card w-75 mx-auto mt-5">
                    <h5 class="card-header">Add Stage</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
    
                            <div class="row">
                                <div class="form-group w-75 mx-auto">
                                    <label for="exampleFormControlSelect1">Stage :</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="stage">
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                          <option value="4">4</option>
                                      </select>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="row">
                                <div class="form-group w-75 mx-auto">
                                    <label for="exampleFormControlSelect1">Group :</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="group">
                                                  <option value="A">A</option>
                                                  <option value="B">B</option>
                                                  <option value="CS">CS</option>
                                                  <option value="IT">IT</option>
                              </select>
                                </div>
                            </div>
                        </li>
    
                        <li class="list-group-item">
                            <div class="row">
                                <button type="submit" class="btn btn-success w-75 mx-auto">Add</button>
                            </div>
                        </li>
                    </ul>
                </div>
    
          
        </form>
    </div>
    <div class="col-6">
        <table class="table w-100 mx-auto mt-5">
            <thead>
                <tr>
                    <th scope="col" style="width:70px;">#</th>
                    <th scope="col" style="width:230px;">Stage</th>
                    <th scope="col" style="width:230px;">Group</th>
                    <th scope="col" style="width:230px;">Action</th>


                    {{--
                    <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($stages as $stage)
                <tr>
                    <th scope="col" style="width:70px;">{{$count++}}</th>
                    <th scope="col" style="width:230px;">{{$stage->stage}}</th>
                    <th scope="col" style="width:230px;">{{$stage->group}}</th>
                <th scope="col" style="width:230px;"> <a href="/monitor/stage/delete/{{$stage->id}}" data-toggle="modal" class="badge badge-danger delete" data-id="2"><i class="fas fa-trash-alt"></i> Delete</a></th>
                </tr>
                @endforeach 




            </tbody>
        </table>


    </div>
</div>


</div>


@endsection