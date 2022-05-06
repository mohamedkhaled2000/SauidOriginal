
@extends('layouts.master_home')

@section('title')
المقالات
@endsection

@section('home_content')

 <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>المقالات</h2>
            <ol>
              <li><a href="{{ url('/') }}">الرئيسية</a></li>
              <li>المقالات</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container">

          <div class="row">

            <div class="col-lg-8 entries">
            @foreach ($posts as $post)
              <article class="entry" data-aos="fade-up">
                @php
                    $comments = App\Models\AllComment::where('post_id', $post->id)->get();
                @endphp
                <div class="entry-img">
                  <img src="{{ asset($post->image) }}" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="{{ route('post_details', $post->title_slug) }}">{{ $post->title }}</a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="{{ route('blog_details', $post->id) }}">{{ Auth::check() ? Auth::user()->name : 'Mohamed Khaled' }}</a></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="{{ route('blog_details', $post->id) }}"><time datetime="2020-01-01">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</time></a></li>
                    <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="{{ route('blog_details', $post->id) }}">{{ $comments->count() }} Comments</a></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <p>{{ $post->short_title }}</p>
                  <div class="read-more">
                    <a href="{{ route('post_details', $post->title_slug) }}">قراءة المزيد</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
            @endforeach

              {{ $posts->links('vendor.pagination.custom') }}

            </div><!-- End blog entries list -->

            @include('layouts.body.last_post_sidbar')

          </div>

        </div>
      </section><!-- End Blog Section -->
@endsection
