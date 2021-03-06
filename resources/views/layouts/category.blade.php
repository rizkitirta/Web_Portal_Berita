 <div class="col-md-4">
     <!-- ad -->
     <div class="aside-widget text-center">
         @php
             $iklan = DB::table('iklan')->first();
         @endphp
         <a target="blank" href="{{ url('http://'.$iklan->url) }}" style="display: inline-block;margin: auto;">
             <img class="img-responsive" src="{{ asset('upload/'.$iklan->gambar) }}" alt="">
         </a>
     </div>
     <!-- /ad -->

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
                         $total = DB::table('article')->where('category_id', $category->id)->count();
                     @endphp
                     <li><a href="{{ route('article.category',$category->id) }}" class="cat-2">{{ $category->nama }}<span>{{ $total }}</span></a></li>
                 @endforeach
             </ul>
         </div>
     </div>
     <!-- /catagories -->

 </div>
