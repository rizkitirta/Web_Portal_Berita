@extends('admin.layouts.master')
@section('content')
    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email"
                        autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-password" id="password" placeholder="Enter Password"
                        name="password" autocomplete="off">
                    <input type="checkbox" class="form-checkbox"> Show password
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
