@if (isset($random))
    @foreach ($random as $item)
    <!-- post -->
    <div class="col-md-6">
        <div class="post post-thumb">
            <a class="post-img" href="{{ route('beranda.detail',$item->article_id) }}"><img style="width:100%; height:350px;"
                    src="{{ asset('upload/' . $item->gambar) }}" alt=""></a>
            <div class="post-body">
                <div class="post-meta">
                    <a class="post-category cat-2" href="category.html">{{ $item->nama }}</a>
                    <span class="post-date">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                </div>
                <h3 class="post-title"><a href="{{ route('beranda.detail',$item->article_id) }}">{{ $item->judul }}</a></h3>
            </div>
        </div>
    </div>
    <!-- /post -->
@endforeach

@endif



</div>
