@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url({{ asset('upload/' . $article->gambar) }});"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="category.html">JavaScript</a>
                        <span class="post-date">{{ date('d M Y', strtotime($article->created_at)) }}</span>
                    </div>
                    <h1>{{ $article->judul }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    </header>
    <!-- /Header -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Post content -->
                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        <div class="main-post">
                            <h3>{{ $article->judul }}</h3>
                            <p>{!! $article->isi !!}</p>
                        </div>
                        <div class="post-shares sticky-shares">
                            <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>

                    <!-- ad -->
                    <div class="section-row text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="./img/ad-2.jpg" alt="">
                        </a>
                    </div>
                    <!-- ad -->

                    <!-- author -->
                    <div class="section-row">
                        <div class="post-author">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/author.png" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3>{{ $article->name }}</h3>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <ul class="author-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /author -->


                    <!-- comments -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>{{ $totalComments }} Comments</h2>
                        </div>

                        @foreach ($comments as $comment)
                            <div class="post-comments">
                                <!-- comment -->
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="./img/avatar.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h4>{{ $comment->nama }}</h4>
                                            <span class="time">{{ date('d-M-Y', strtotime($comment->created_at)) }}</span>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                        <p>{{ $comment->isi }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /comments -->

                    <!-- reply -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>Leave a reply</h2>
                            <p>your email address will not be published. required fields are marked *</p>
                        </div>
                        <form class="post-reply" action="{{ route('beranda.comments', $article->article_id) }}"
                            method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Name *</span>
                                        <input class="input" type="text" name="nama">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Email *</span>
                                        <input class="input" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Website</span>
                                        <input class="input" type="text" name="website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="isi" placeholder="message"></textarea>
                                    </div>
                                    <button class="primary-button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /reply -->
                </div>
                <!-- /Post content -->

                <!-- aside -->
                <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- /ad -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>
                        @foreach ($articles as $item)
                            <div class="post post-widget">
                                <a class="post-img" href="blog-post.html"><img
                                        src="{{ asset('upload/' . $item->gambar) }}" alt=""></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="blog-post.html">{{ $item->judul }}</a></h3>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <!-- /post widget -->

                    <!-- post widget -->

                    @foreach ($random as $item)
                        <div class="aside-widget">
                            <div class="section-title">
                                <h2>Featured Posts</h2>
                            </div>
                            <div class="post post-thumb">
                                <a class="post-img" href="blog-post.html"><img
                                        src="{{ asset('upload/' . $item->gambar) }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-3" href="#">{{ $item->nama }}</a>
                                        <span class="post-date">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use
                                            JQuery?</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- /post widget -->



                    <!-- catagories -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Catagories</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                @php
                                    $categories = DB::table('categories')->get();
                                @endphp
                                @foreach ($categories as $category)
                                    @php
                                        $total = DB::table('article')
                                            ->where('category_id', $category->id)
                                            ->count();
                                    @endphp
                                    <li><a href="{{ route('article.category', $category->id) }}"
                                            class="cat-2">{{ $category->nama }}<span>{{ $total }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /catagories -->


                    <!-- tags -->
                    <div class="aside-widget">
                        <div class="tags-widget">
                            <ul>
                                <li><a href="#">Chrome</a></li>
                                <li><a href="#">CSS</a></li>
                                <li><a href="#">Tutorial</a></li>
                                <li><a href="#">Backend</a></li>
                                <li><a href="#">JQuery</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">JavaScript</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /tags -->

                    <!-- /Post content -->
                @endsection
