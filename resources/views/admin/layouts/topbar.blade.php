
           <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ url('admin/dashboard') }}" class="logo">
                        <span>
                            <img src="{{ URL::asset('assets/images/user.png')}}" alt="" height="18">
                        </span>
                        <i>
                            <img src="{{ URL::asset('assets/images/user.png')}}" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('assets/images/user.png')}}" alt="user" class="rounded-circle">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-power text-danger"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <!--
                         <li class="d-none d-sm-block">
                            <div class="dropdown pt-3 d-inline-block">
                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Session::get('admin_lang') =='en')
                                    Language (EN)
                                @elseif(Session::get('admin_lang') =='de')
                                    German (DE)
                                @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ Session::get('admin_lang')=='en' ? 'javascript:void(0)' : url('set_admin_lang/en') }}" >English</a>
                                    <a class="dropdown-item" href="{{ Session::get('admin_lang')=='de' ? 'javascript:void(0);' : url('set_admin_lang/de') }}" >German</a>
                                </div>
                            </div>
                        </li> -->
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
