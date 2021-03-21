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
                    @php
                        $articles = \DB::table('article')
                            ->join('categories', 'article.category_id', '=', 'categories.id')
                            ->select('article.judul', 'article.isi', 'article.gambar', 'article.created_at', 'categories.nama')
                            ->orderby('created_at', 'desc')
                            ->get();
                    @endphp
                    @foreach ($articles as $article)
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="blog-post.html"><img
                                        src="{{ asset('upload/' . $article->gambar) }}" alt=""
                                        style="width:300px; height:200px;"></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-2" href="category.html">{{ $article->nama }}</a>
                                        <span
                                            class="post-date">{{ date('d M Y', strtotime($article->created_at)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="blog-post.html">{{ $article->judul }}</a></h3>
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

            <div class="col-md-4">
                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="{{ asset('webmag/img/ad-1.jpg') }}" alt="">
                    </a>
                </div>
                <!-- /ad -->

                <!-- catagories -->
                @php
                    $categories = DB::table('categories')->get();
                @endphp
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catagories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('beranda.detail',$article-) }}" class="cat-2">{{ $category->nama }}<span>340</span></a></li>
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
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
