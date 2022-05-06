 @php
     $pages = App\Models\Page::all();

 @endphp

 <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center">

          <div class="col-lg-3 col-md-6 footer-contact" style="text-align: right">
            <h3><span class="text-success">Sauid</span>Original</h3>
            <p >
                {{ $contact->address }} <br>
              <strong>الهاتف:</strong> <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a><br>
              <strong>الايميل:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a><br>
            </p>
          </div>
{{--
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">الرئيسية</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> --}}

          <div class="col-lg-3 col-md-6 footer-links" style="text-align: right">
            <h4 >خدماتنا</h4>
            <ul>
                @foreach ($pages as $page)
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog_details',$page->title_slug) }}">{{ $page->title }}</a></li>
                @endforeach
            </ul>
          </div>


        </div>
      </div>
    </div>


  </footer><!-- End Footer -->
