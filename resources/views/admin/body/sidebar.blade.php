<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ url('/dashboard') }}">
            <svg
              class="brand-icon"
              xmlns="http://www.w3.org/2000/svg"
              preserveAspectRatio="xMidYMid"
              width="30"
              height="33"
              viewBox="0 0 30 33"
            >
              <g fill="none" fill-rule="evenodd">
                <path
                  class="logo-fill-blue"
                  fill="#7DBCFF"
                  d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                />
                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
              </g>
            </svg>
          <span class="brand-name">لوحة التحكم</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">



            <li  class="active" >
              <a class="sidenav-item-link" href="{{ url('/dashboard') }}">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">الرئيسية</span>
              </a>
            </li>


            <li  class="has-sub active expand">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-folder-multiple-outline"></i>

               <span class="nav-text">محتوى الصفحة الرئيسية</span> <b class="caret"></b>
              </a>
              <ul  class="collapse show"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">

                      <li  class="active">
                        <a class="sidenav-item-link" href="{{ route('home.slider') }}">
                          <span class="nav-text">العرض</span>
                        </a>
                      </li>

                      <li  class="active">
                        <a class="sidenav-item-link" href="{{ route('home.about') }}">
                          <span class="nav-text">معلومات عنا</span>
                        </a>
                      </li>

                </div>
              </ul>
            </li>



            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                aria-expanded="false" aria-controls="ui-elements">
                <i class="mdi mdi-folder-multiple-outline"></i>
                <span class="nav-text">صفحات الاتصال</span><b class="caret"></b>
              </a>
              <ul  class="collapse"  id="ui-elements"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                    <li  class="active">
                        <a class="sidenav-item-link" href="{{ route('admin.contact') }}">
                          <span class="nav-text">معلومات اتصال الشركة</span>
                        </a>
                    </li>
                    <li  class="active">
                        <a class="sidenav-item-link" href="{{ route('contactForm') }}">
                          <span class="nav-text">الرسائل المستقبلة</span>
                        </a>
                    </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                aria-expanded="false" aria-controls="pages">
                <i class="mdi mdi-image-filter-none"></i>
                <span class="nav-text">الصفحات</span><b class="caret"></b>
              </a>
              <ul  class="collapse"  id="pages"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li>
                        <a class="sidenav-item-link" href="{{ route('all.pages') }}">
                          <span class="nav-text">جميع الصفحات</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages2"
                aria-expanded="false" aria-controls="pages2">
                <i class="mdi mdi-image-filter-none"></i>
                <span class="nav-text">صفحات المقالات</span><b class="caret"></b>
              </a>
              <ul  class="collapse"  id="pages2"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li>
                        <a class="sidenav-item-link" href="{{ route('user.post') }}">
                          <span class="nav-text">جميع المقالات</span>
                        </a>
                      </li>
                      <li>
                        <a class="sidenav-item-link" href="{{ route('postCommet') }}">
                          <span class="nav-text">كل التعليقات</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages4"
                aria-expanded="false" aria-controls="pages2">
                <i class="mdi mdi-image-filter-none"></i>
                <span class="nav-text">الخدمات</span><b class="caret"></b>
              </a>
              <ul  class="collapse"  id="pages4"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li>
                        <a class="sidenav-item-link" href="{{ route('all.service') }}">
                          <span class="nav-text">جميع الخدمات</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages3"
                aria-expanded="false" aria-controls="pages2">
                <i class="mdi mdi-image-filter-none"></i>
                <span class="nav-text">الارشفة</span><b class="caret"></b>
              </a>
              <ul  class="collapse"  id="pages3"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li>
                        <a class="sidenav-item-link" href="{{ route('view.seo') }}">
                          <span class="nav-text">ارشفة الموقع</span>
                        </a>
                      </li>

                </div>
              </ul>
            </li>








        </ul>

      </div>

      <hr class="separator" />


    </div>
  </aside>
