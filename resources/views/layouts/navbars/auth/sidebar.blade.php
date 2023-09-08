@php
    use App\Models\Report;
    use Illuminate\Support\Facades\Auth;

    if(Auth::user()->type == 1) {
        $count_reports = Report::where(['status' => 1])->count();
    }
    if(Auth::user()->type == 2) {
      $count_reports = Report::where(['userid' => Auth::user()->userid])->where(['status' => 1])->count();
  }
@endphp
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex mt-4" href="{{ route('dashboard') }}">
      <img style="width: 50px; height: 50px;" src="{{ asset('storage/logo/ccsit-logo.jpg') }}" class="ms-4" alt="...">
        <span class="ms-3 font-weight-bold">ICT Monitoring System</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div class="{{ (Request::is('dashboard') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-tachometer-alt ps-2 pe-2 text-center text-dark {{ (Request::is('dashboard') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-profile') ? 'active' : '') }} " href="{{ url('user-profile') }}">
          <div class="{{ (Request::is('user-profile') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-user ps-2 pe-2 text-center text-dark {{ (Request::is('user-profile') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">User Profile</span>
        </a>
      </li>
      @if(Auth::user()->type == 1)
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('instructors') ? 'active' : '') }}" href="{{ url('instructors') }}">
            <div class="{{ (Request::is('instructors') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center text-dark {{ (Request::is('instructors') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Instructors</span>
        </a>
      </li>
      @endif
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('rooms') ? 'active' : '') }}" href="{{ url('rooms') }}">
            <div class="{{ (Request::is('rooms') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-house-user ps-2 pe-2 text-center text-dark {{ (Request::is('rooms') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Room/Office</span>
        </a>
      </li>
      @if(Auth::user()->type == 1)
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('borrowed-assets') ? 'active' : '') }}" href="{{ url('borrowed-assets') }}">
            <div class="{{ (Request::is('borrowed-assets') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fas fa-warehouse ps-2 pe-2 text-center text-dark {{ (Request::is('borrowed-assets') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Borrowed Assets</span>
        </a>
      </li>
      @endif
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('reports') ? 'active' : '') }}" href="{{ url('reports') }}">
            <div class="{{ (Request::is('reports') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fas fa-flag ps-2 pe-2 text-center text-dark {{ (Request::is('reports') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Reports</span>
            <span class="ms-4 mt-1 translate-middle badge rounded-pill bg-danger">{{ $count_reports }}</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('class-history') ? 'active' : '') }}" href="{{ url('class-history') }}">
            <div class="{{ (Request::is('class-history') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fas fa-history ps-2 pe-2 text-center text-dark {{ (Request::is('class-history') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Class History</span>
        </a>
      </li>
      @if(Auth::user()->type == 1)
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('sms-configuration') ? 'active' : '') }}" href="{{ url('sms-configuration') }}">
            <div class="{{ (Request::is('sms-configuration') ? 'bg-gradient-info' : 'icon') }} icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fas fa-comment-alt ps-2 pe-2 text-center text-dark {{ (Request::is('sms-configuration') ? 'text-white opacity-10' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">SMS Configuration</span>
        </a>
      </li>
      @endif
</ul>
      
</aside>
