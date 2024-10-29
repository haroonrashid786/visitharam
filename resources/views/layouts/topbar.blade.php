@auth
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <img src="{{ URL("assets/img/logo.svg") }}" />
            </div>

    </div>

    <div class="d-flex">


    <div class="dropdown d-inline-block">

    </div>

    <div class="dropdown d-inline-block">
        @auth
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user" src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-9.png') }}" alt="Header Avatar">
            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->first_name)}}</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">

            <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endauth
    </div>

    {{-- <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                <i class="bx bx-cog bx-spin"></i>
            </button>
        </div> --}}

    </div>
    </div>
</header>
@endauth
@auth




<div class="vertical-menu">

    <div data-simplebar="init" class="h-100">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper"
                        style="height: 100%; padding-right: 0px; padding-bottom: 0px; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <div id="sidebar-menu" class="mm-active">
                                <!-- Left Menu Start -->
                                <ul class="metismenu list-unstyled mm-show" id="side-menu">



                                    <li><a href="{{route('home')}}" key="t-light-sidebar">
                                            <i class="bx bx-layout"></i>
                                            <span key="t-layouts" style="font-size: 12px;"> Dashboard</span>
                                        </a></li>
@php
$flightName = 'Cheap flights to Jeddah';
$flight = \App\Models\Flight::where('name', $flightName)->first();
$flightId = $flight ? $flight->id : null;
@endphp
      <li><a href="{{ $flightId ? route('edit.flight', ['id' => $flightId]) : '#' }}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;"> Flights</span>
      </a></li>
  <li><a href="{{route('categories')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;"> Categories</span>
      </a></li>

  <li><a href="{{route('hotels')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;"> Hotels</span>
      </a></li>

  <li><a href="{{route('hotelfacility.index')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Hotel Facilities</span>
      </a></li>

  <li><a href="{{route('packages')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;"> Packages</span>
      </a></li>
<!--
  <li><a href="{{route('facility.index')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Package Facilities</span>
      </a></li>


  <li><a href="{{route('service.index')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Package Services</span>
      </a></li> -->


  <li><a href="{{route('contacts')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Contact Requests</span>
      </a></li>

  <li><a href="{{route('newsletters')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Newsletter</span>
      </a></li>

  <li><a href="{{route('customerreview.index')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Customer Reviews</span>
      </a></li>

  <li><a href="{{route('contents')}}" key="t-light-sidebar">
          <i class="bx bx-layout"></i>
          <span key="t-layouts" style="font-size: 12px;">Content</span>
      </a></li>
</ul>
</div>
<!-- Sidebar -->
</div>
</div>
</div>
</div>
<div class="simplebar-placeholder" style="width: auto; height: 81px;"></div>
</div>
<div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
<div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
</div>
<div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
<div class="simplebar-scrollbar"
style="height: 664px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
</div>
</div>
</div>





@endauth
