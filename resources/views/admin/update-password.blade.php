@extends('admin.layout.app')
@push('title')
    <title>Admin-Update Password</title>
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Admin Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Admin Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update.admin-password') }}" method="post">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                    @elseif (Session::has('error_match'))
                        <div class="alert alert-danger mt-3">{{ Session::get('error_match') }}</div>
                    @elseif (Session::has('error_password'))
                        <div class="alert alert-danger mt-3">{{ Session::get('error_password') }}</div>
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" name="email" value="{{ Auth::guard('admin')->user()->email }}" class="form-control" id="email" placeholder="Enter email" readonly>
                    </div>
                    <div class="form-group">
                      <label for="curent_password">Current Password</label>
                      <input type="password" name="curent_password" class="form-control" id="current_password" placeholder="Current Password">
                    <div id="password-check"></div>
                    </div>

                    <div class="form-group">
                      <label for="new_password">New Password</label>
                      <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                    </div>

                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>

  @endsection
