@extends('admin-lte.mainadmin')
@section('content') 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Add Task</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Task</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('inserttask')}}">
              	@csrf
                <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" value="{{old('title')}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                    @error('title')
          			     <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" value="{{old('description')}}" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter description">
                    @error('description')
                     <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" value="{{old('description')}}" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description"></textarea>
                    @error('description')
          			    <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div> -->
              </div>
            </div>
                 
            <div class="row">
              <div class="col-md-6">
                <label>Select Project<span class="text-danger"></span></label>
                <select id="project_id" value="{{old('project_id')}}" name="project_id" class="form-control">
                    <option selected value="">Select Project</option>
                    @foreach ($project as $data)
                    <option value="{{$data->id}}" {{(old('user_id') == $data->id) ? 'selected' : ''}}>
                        {{$data->title}}
                    </option>
                        @endforeach
                </select>
                @error('project_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6">
                <label>Select User<span class="text-danger"></span></label>
                <select id="employee_id" value="{{old('employee_id')}}" name="employee_id" class="form-control">
                    <option selected value="">Select User</option>
                    
                </select>
                @error('employee_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
                    
            <div class="row mt-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Planning Hours</label>
                  <input type="text" value="{{old('planning_hours')}}" name="planning_hours" class="form-control" id="exampleInputPassword1" placeholder="Enter Planning Hours">
                  @error('planning_hours')
          			  <span class="text-danger">{{ $message }}</span>
          			  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Actual Hours</label>
                  <input type="text" value="{{old('actual_hours')}}" name="actual_hours" class="form-control" id="exampleInputPassword1" placeholder="Enter Actual Hours">
                  @error('actual_hours')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Start Date</label>
                  <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}" id="exampleInputPassword1" placeholder="Enter Start Date">
                    @error('start_date')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">End Date</label>
                  <input type="date" value="{{old('end_date')}}" name="end_date" class="form-control" id="exampleInputPassword1" placeholder="Enter Confirm Password">
                @error('end_date')
                   <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-md-6">
                <label>Status<span class="text-danger"></span></label>
                <select id="active" value="{{old('status')}}" name="status" class="form-control">
                    <option selected value="">Select Status</option>
                    <option  value="0" {{old('status') == '0' ? "selected" : ""}}>To-Do</option>
                    <option  value="1" {{old('status') == '1' ? "selected" : ""}}>In Progress</option>
                    <option  value="2" {{old('status') == '2' ? "selected" : ""}}>Done</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          
          </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
       
      </div>
    </section>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  function getUser(idEmployee){
       $.ajax({
                  url: "{{url('admin/task/add/fetch-employee')}}",

                  type: "POST",

                  data: {
                        project_id: idEmployee,
                        _token: '{{csrf_token()}}'
                  },

                  dataType: 'json',

                  success: function (result) {

                      $('#employee_id').html('<option value="">Select User</option>');

                      $.each(result, function (key, value) {
                         // console.log(key);
                            $("#employee_id").append('<option value="' + key
                                 + '">' + value + '</option>');
                           
                        });
                      
                    }

                });
  }

    var oldemployee = "{{old('employee_id')}}";
    var project = "{{old('project_id')}}";
      if(project){
        $('#project_id option[value="'+project+'"]').attr('selected','selected');
        
          getUser(project);
            setTimeout(function(){
        $('#employee_id option[value="'+oldemployee+'"]').attr('selected','selected');
              }, 400);
          }
  
  $('#project_id').on('change', function () {
      var idEmployee = this.value;
        $("#employee_id").html('');
          getUser(idEmployee)  
            });
  
</script>

@endsection
