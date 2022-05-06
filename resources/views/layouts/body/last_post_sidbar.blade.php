@php
    $posts = App\Models\posts::where('type',1)->where('val_status',1)->latest()->limit(5)->get();
@endphp

<div class="col-lg-4" style="text-align: right">

    <div class="sidebar" data-aos="fade-left">

      <h3 class="sidebar-title">بحث</h3>
      <div class="sidebar-item search-form">
        <form action="">
          <input type="text">
          <button type="submit"><i class="icofont-search"></i></button>
        </form>

      </div><!-- End sidebar search formn-->

      <h3 class="sidebar-title">المقالات الاخيرة</h3>
      <div class="sidebar-item recent-posts">

        @foreach ($posts as $post)
            <div class="post-item clearfix">
                <img src="{{asset($post->image)}}" alt="{{$post->title}}" title="{{$post->title}}">
                <h4><a href="{{route('post_details',$post->title_slug)}}">{{$post->title}}</a></h4>
                <time datetime="2020-01-01"> {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</time>
            </div>
        @endforeach


      </div><!-- End sidebar recent posts-->

    </div><!-- End sidebar -->

  </div><!-- End blog sidebar -->
