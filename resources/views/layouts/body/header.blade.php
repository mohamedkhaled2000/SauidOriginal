  @php
    $pages = App\Models\Page::where('status',1)->latest()->get();
    $links = App\Models\Contact::first();

  @endphp


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">

    <div class="container d-flex align-items-center" style="padding-top: 10px">

      <h1 class="logo ml-auto"><a href="{{url('/')}}"><span>sauid</span>Original</a></h1>


        <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="active"><a href="{{ url('/') }}">الرئيسية</a></li>

            {{-- <li class="drop-down"><a href="">Pages</a>
              <ul>
                    @foreach ($pages as $page)
                      <li><a href="{{ url('/Blog/Details/').'/'.$page->id }}">{{ $page->title }}</a></li>
                    @endforeach
               </ul>
            </li> --}}


           @foreach ($pages as $page)
            @php
                $posts = App\Models\posts::where('page_id',$page->id)->where('val_status',1)->latest()->get();
            @endphp
                {{-- <li><a href="#">{{ $page->title }}</a></li> --}}
            <li class="drop-down"><a href="{{route('blog_details',$page->title_slug) }}">{{$page->title}}</a>
                <ul>
                    @foreach ($posts as $post)
                    <li><a href="{{ route('post_details',$post->title_slug) }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </li>

           @endforeach
           <li><a href="{{route('blog') }}">المدونة</a>
           <li><a href="{{route('Contact') }}">اتصل بنا</a>



        </ul>
        </nav><!-- .nav-menu -->
        <div class="header-social-links">
            <a href="{{ $links->twitter }}" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="{{ $links->facebook }}" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="{{ $links->instagram }}" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="{{ $links->youtube }}" class="youtube"><i class="icofont-youtube"></i></i></a>
        </div>
      <!-- Uncomment below if you prefer to use an image logo -->




    </div>
  </header><!-- End Header -->
