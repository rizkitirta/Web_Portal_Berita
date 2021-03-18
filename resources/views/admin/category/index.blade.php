@extends('admin.layouts.master')
@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title text-bold">Manage Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('category.add') }}" class="btn btn-success mb-2">Tambah category</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->nama }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                                <a href="{{ route('category.delete',$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
