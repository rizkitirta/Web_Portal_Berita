@extends('admin.layouts.master')
@section('content')
    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Tambah Category</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('category.store') }}" method="POST">
			{{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputtext1">Nama Category</label>
                    <input type="text" class="form-control" id="exampleInputtext1" placeholder="Enter Category" name="nama">
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
