@extends('layouts.master')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Recent Posts</h2>
                        </div>
                    </div>
                    <!-- post -->
                    
                    @foreach ($articles as $article)
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="{{ route('beranda.detail',$article->article_id) }}"><img
                                        src="{{ asset('upload/' . $article->gambar) }}" alt=""
                                        style="width:300px; height:200px;"></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-2" href="#">{{ $article->nama }}</a>
                                        <span
                                            class="post-date">{{ date('d M Y', strtotime($article->created_at)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('beranda.detail',$article->article_id) }}">{{ $article->judul }}</a></h3>
                                    <p>{!! substr($article->isi, 0, 600) !!}...</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- /post -->

                    <div class="col-md-12">
                        <div class="section-row">
                            <button class="primary-button center-block">Load More</button>
                        </div>
                    </div>
                </div>
            </div>
       
             @include('layouts.category') 
           
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

	
@endsection