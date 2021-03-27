@extends('admin.layouts.master')
@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title text-bold">Manage User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('gagal'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('gagal') }}
                </div>
            @endif

            <a href="{{ route('user.add') }}" class="btn btn-success mb-2 ">Tambah User</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
						<th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                <a href="{{ route('user.delete', $user->id) }}"
                                    class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin?
                </div>

                <div class="modal-footer">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-white">Ok, Got it</button>
                    </form>
                    <button type="button" class="btn btn-link -auto" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('body').on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('#modal-delete').find('form').attr('action', url);
                $('#modal-delete').modal();
            });

        })
    </script>
@endsection
