@php
    use App\Models\Report;
    use Illuminate\Support\Facades\Auth;

    if(Auth::user()->type == 1) {
        $count_reports = Report::where(['admin_read' => 1])->count();
        $reports = Report::orderBy('date_reported', 'DESC')->limit(5)->get();
    }

    if(Auth::user()->type == 2) {
        $count_reports = Report::where(['userid' => Auth::user()->userid])->where(['status' => 0])->where(['user_read' => 1])->count();
        $reports = Report::where(['userid' => Auth::user()->userid])->where(['status' => 0])->orderBy('date_reported', 'DESC')->limit(5)->get();
    }
@endphp

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl bg-white mt-3" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            
            <li class="nav-item dropdown pe-2 d-flex align-items-center ms-3" id="notifications">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell cursor-pointer"></i>
                <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger" id="notif-count">
                    {{ $count_reports }}
                </span>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4 overflow-auto shadow-lg position-absolute bg-white">
                @foreach ($reports as $rep)
                    <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                            @if($rep->status == 1)
                            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                                <i class="fas fa-exclamation-triangle"></i>
                            </button>
                            @endif
                            @if($rep->status == 0)
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </button>
                            @endif
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                <span class="font-weight-bold">{{ $rep->User->Instructor->name }}</span> 
                                <div>
                                    <p class="text-sm">{{ $rep->description }} <br> 
                                    <span class="text-sm fw-bold  @if($rep->status == 1) text-danger @endif @if($rep->status == 0) text-success @endif">{{ $rep->Room->room }}</span>
                                </p>
                                </div>
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                {{ date('M d, Y h:i A', strtotime($rep->date_reported)) }}
                            </p>
                            </div>
                        </div>
                        </a>
                    </li>
                @endforeach
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->