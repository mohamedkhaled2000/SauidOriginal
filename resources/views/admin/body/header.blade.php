          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <div class="navbar-right ">
                <ul class="nav navbar-nav">


                    <li class="dropdown notifications-menu">
                        <button class="dropdown-toggle" data-toggle="dropdown">
                          <i class="mdi mdi-bell-outline"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li class="dropdown-header">You have 5 notifications</li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-account-plus"></i> New user registered
                              <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-account-remove"></i> User deleted
                              <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                              <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-account-supervisor"></i> New client
                              <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-server-network-off"></i> Server overloaded
                              <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                            </a>
                          </li>
                          <li class="dropdown-footer">
                            <a class="text-center" href="#"> View All </a>
                          </li>
                        </ul>
                      </li>
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        @if (Auth::user()->profile_photo_path == null)
                        <img src="{{ Auth::user()->profile_photo_url }}" class="user-image" alt="User Image" />
                        @else
                        <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="user-image" alt="User Image" />
                        @endif
                      <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        @if (Auth::user()->profile_photo_path == null)
                        <img src="{{ Auth::user()->profile_photo_url }}" class="user-image" alt="User Image" />
                        @else
                        <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="user-image" alt="User Image" />
                        @endif
                        <div class="d-inline-block">
                          {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->email }}</small>
                        </div>
                      </li>

                      <li>
                        <a href="{{ route('updateProfile') }}">
                          <i class="mdi mdi-account"></i> الملف الشخصى
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('changePassword') }}">
                          <i class="mdi mdi-email"></i> تغير كلمة السر
                        </a>
                      </li>

                      <li class="dropdown-footer">
                        <a href="{{ route('user.logout') }}"> <i class="mdi mdi-logout"></i> تسجيل الخروج </a>
                      </li>
                    </ul>
                  </li>


                </ul>
              </div>


            </nav>


          </header>
