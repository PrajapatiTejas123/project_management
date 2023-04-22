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
              <li class="breadcrumb-item"><a href="{{route('list')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Project</li>
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
                <h3 class="card-title">Add Project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('insertproject')}}">
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
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" value="{{old('description')}}" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter Description">
                    @error('description')
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
                <select id="status" value="{{old('status')}}" name="status" class="form-control">
                    <option selected value="">Select Status</option>
                    <option  value="0" {{old('status') == '0' ? "selected" : ""}}>Pending</option>
                    <option  value="1" {{old('status') == '1' ? "selected" : ""}}>Inprogress</option>
                    <option  value="2" {{old('status') == '2' ? "selected" : ""}}>Complete</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6">
                <label>Manager Id<span class="text-danger"></span></label>
                <select id="status" value="{{old('manager_id')}}" name="manager_id" class="form-control">
                    <option selected value="">Select Manager Id</option>
                    @foreach ($project as $data)
                    @if ($data->roles == 2 && $data->active == 1 )
                    <option value="{{$data->id}}" {{(old('user_id') == $data->id) ? 'selected' : ''}}>
                        {{$data->name}}
                    </option>
                      @endif
                        @endforeach
                </select>
                @error('manager_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <label>Select User<span class="text-danger"></span></label>
                <select id="status" multiple="true" name="user_id[]" class="form-control">
                    <option value="">Select User</option>
                    <!-- @foreach ($project as $data)
                    @if ($data->roles == 3 && $data->active == 1 )
                    <option value="{{$data->id}}" {{(old('user_id') == $data->id) ? 'selected' : ''}}>
                        {{$data->name}}
                    </option>
                      @endif
                    @endforeach -->

                    @foreach($project as $data)
                    @if ($data->roles == 3 && $data->active == 1 )
                      <option value="{{ $data->id }}" {{ (collect(old('user_id'))->contains($data->id)) ? 'selected':'' }}>{{ $data->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('user_id.*')
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
  $('#user_id').select2();
</script> -->
@endsection
