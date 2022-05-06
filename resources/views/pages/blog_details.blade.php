
@extends('layouts.master_home')

@section('title')
    @foreach ($posts as $post)
        {{ $post->title }}
    @endforeach
@endsection

@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            @foreach ($posts as $post)
                <h2>{{ $post->title }}</h2>
            @endforeach
            <ol>
              <li><a href="{{ url('/') }}">الرئيسية</a></li>
        @foreach ($posts as $post)
              <li>{{ $post->title }}</li>
        @endforeach
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog" style="text-align: right">
        <div class="container">

          <div class="row">

            <div class="col-lg-8 entries">
        @foreach ($posts as $post)
              <article class="entry entry-single" data-aos="fade-up">

                <div class="entry-img">
                  <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="blog-single.html">{{ $post->title }}</a>
                </h2>

                <div class="entry-content">

                  {!! $post->content !!}


                </div>

              </article><!-- End blog entry -->
        @endforeach


              <div class="blog-comments" data-aos="fade-up">

                <h4 class="comments-count">{{ $comments->count() }} التعليقات</h4>
            @foreach ($comments as $comment)
                <div id="comment-1" class="comment clearfix">
                    <h3>{{ $comment->name }}</h3>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>{{ $comment->comment }}</p>
                </div><!-- End comment #1 -->
            @endforeach


                <div class="reply-form">
                    <h4>Leave a Reply</h4>
                    <p>Your email address will not be published. Required fields are marked * </p>
                    <form action="{{ route('store.comment') }}" method="post">
                        @csrf
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                          <input name="name" type="text" class="form-control" placeholder="Your Name*">
                        </div>
                        <div class="col-md-6 form-group">
                          <input name="email" type="text" class="form-control" placeholder="Your Email*">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col form-group">
                          <input name="website" type="text" class="form-control" placeholder="Your Website">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col form-group">
                          <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Post Comment</button>

                    </form>

                  </div>

              </div><!-- End blog comments -->

            </div><!-- End blog entries list -->

            @include('layouts.body.last_post_sidbar')

          </div>

        </div>
      </section><!-- End Blog Section -->

@endsection
