@extends('admin.layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $article }}</h3>

                            <p>Article</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="{{ route('article.index') }}" class="small-box-footer">More info<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $category }}</h3>

                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-tags"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $user }}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-fw fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $comment }}</h3>
                            <p>Comment</p>
                        </div>
                        <div class="icon">
                            <<i class="nav-icon far fa-comment"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
        @endsection
