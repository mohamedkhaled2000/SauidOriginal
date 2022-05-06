@extends('layouts.master_home')
@section('title')
    الرئيسية
@endsection


@section('home_content')
@include('layouts.body.slider')

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>معلومات عنا</strong></h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $abouts->title }}</h2>
            <h3>{{ $abouts->short_dis }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>{{ $abouts->long_dis }}</p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>خدماتنا</strong></h2>
        </div>

        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue">
                    <div class="icon">
                        <img class="rounded-circle" src="{{ asset($service->image) }}" alt="{{ $service->name }}" title="{{ $service->name }}">
                    </div>
                    <h4><a href="">{{ $service->name }}</a></h4>
                </div>
            </div>
                @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">



        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>



        </div>

      </div>
    </section><!-- End Our Clients Section -->

@endsection
