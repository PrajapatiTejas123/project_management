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
              <li class="breadcrumb-item active">Edit User</li>
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
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('update',$users->id)}}">
              	@csrf
                <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{old('name',$users->name)}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    @error('name')
          			     <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" value="{{old('email',$users->email)}}" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                    @error('email')
          			    <span class="text-danger">{{ $message }}</span>
          			@enderror
                </div>
              </div>
            </div>
                    
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact</label>
                  <input type="text" value="{{old('contact',$users->contact)}}" name="contact" class="form-control" id="exampleInputPassword1" placeholder="Enter Contact No">
                  @error('contact')
          			  <span class="text-danger">{{ $message }}</span>
          			  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Date Of Birth</label>
                  <input type="date" value="{{old('dob',$users->dob)}}" name="dob" class="form-control" id="exampleInputPassword1" placeholder="Enter Date Of Birth">
                  @error('dob')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-md-6">
                <div class="col mt-4">
                  <label for="gender">Gender</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="male" name="gender" value="male" {{ old('gender',$users->gender) == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="female" name="gender" {{ old('gender',$users->gender) == 'female' ? 'checked' : '' }} value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="col">
                      @error('gender')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror</div>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <input type="text" value="{{old('address',$users->address)}}" name="address" class="form-control" id="exampleInputPassword1" placeholder="Enter Date Of Birth">
                  @error('address')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-md-6">
                <label>Active Status  <span class="text-danger"></span></label>
                <select id="active" value="{{old('active')}}" name="active" class="form-control">
                    <option selected value="">Select active</option>
                    <option  value="0" {{old('active',$users->active) == '0' ? "selected" : ""}}>InActive</option>
                    <option  value="1" {{old('active',$users->active) == '1' ? "selected" : ""}}>Active</option>
                </select>
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6">
                <label>Roles<span class="text-danger"></span></label>
                <select id="roles" value="{{old('roles')}}" name="roles" class="form-control">
                    <option selected value="">Select Roles</option>
                    <option  value="0" {{old('roles',$users->roles) == '0' ? "selected" : ""}}>Admin</option>
                    <option  value="1" {{old('roles',$users->roles) == '1' ? "selected" : ""}}>Hr</option>
                    <option  value="2" {{old('roles',$users->roles) == '2' ? "selected" : ""}}>Project Manager</option>
                    <option  value="3" {{old('roles',$users->roles) == '3' ? "selected" : ""}}>Employee</option>
                </select>
                @error('roles')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
                  
            <div class="form-group mt-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" checked name="terms" class="custom-control-input" id="exampleCheck1">
                <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#" data-toggle="modal" data-target="#exampleModal">terms of service</a>.</label>  
              </div>
              @error('terms')
          		<span class="text-danger">{{ $message }}</span>
          		@enderror
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
  

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms & Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Text entry fields are provided in Pointwise for numerous purposes from entering the coordinates of a control point to entering the number of degrees for revolving a surface of revolution. In most cases hitting the Enter key on your keyboard after typing the text in a field will instruct the program to take immediate action with the data entered. For instance, during 2 Point Curve creation, typing the XYZ coordinates and hitting Enter immediately places the new point.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection
