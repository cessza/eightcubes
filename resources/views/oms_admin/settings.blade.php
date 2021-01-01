@extends('layouts.admin_layout.admin_layout')  
@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Password</h3>
              </div>
              <!-- /.card-header -->
              @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                    {{ Session::get('error_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                    {{ Session::get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
              <!-- form start -->
              <form role="form" method="post" action="{{ url('/admin/update-current-pass') }}" name="updatePasswordForm" id="updatePasswordForm">@csrf
                <div class="card-body">
                <!--   <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input class="form-control" value="{{ $adminDetails->name }}" placeholder="Enter Admin/Sub Admin Name" id="admin_name" name="admin_name">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input class="form-control" value="{{ $adminDetails->email }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input class="form-control" value="{{ $adminDetails->type }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" id="current_pass" name="current_pass" placeholder="Enter Current Password" required="">
                    <span id="chkCurrentPass"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Enter New Password" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="Confirm New Password" required="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
