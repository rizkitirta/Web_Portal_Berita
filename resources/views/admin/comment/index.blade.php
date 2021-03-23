@extends('admin.layouts.master')
@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title text-bold">Manage Commentar</h3>
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

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Article</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Isi</th>
						<th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $index => $comment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $comment->judul }}</td>
                            <td>{{ $comment->nama }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->website }}</td>
                            <td>{{ $comment->isi }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('delete.comment',$comment->comment_id) }}"
                                    class="btn btn-sm btn-danger btn-delete mt-2"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
