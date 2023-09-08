@extends('components.modals.report-modal')
@extends('components.modals.edit.edit-report-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <span class="badge badge-sm bg-gradient-danger">Pending</span>
                        </div>
                        @if(Auth::user()->type == 2)
                            <a href="#" class="btn bg-gradient-info btn-sm mb-0" id="create-report" type="button">+&nbsp; Report</a>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                                        No.
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report Person
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact Number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report Description
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Reported
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $cnt = 1; @endphp
                                @foreach($reports as $rep)
                                    @if($rep->status == 1)
                                        <tr>
                                            <td class="ps-4" reportid='{{ $rep->id }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->User->Instructor->name }}</p>
                                            </td>
                                            <td class="text-center" contact_number='{{ $rep->User->Instructor->contact_number }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $rep->User->Instructor->contact_number }}</p>
                                            </td>
                                            <td class="text-center" room='{{ $rep->Room->room }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $rep->Room->room }}</p>
                                            </td>
                                            <td class="text-center" description='{{ $rep->description }}'>
                                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->description }}</p>
                                            </td>
                                            <td class="text-center" >
                                                <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_reported)) }}</p>
                                            </td>
                                            
                                            <td class="text-center">
                                                @if(Auth::user()->type == 1)
                                                <a href="#" class="me-3" id="fixed-report" data-bs-toggle="tooltip">
                                                    <i class="fas fa-check text-secondary"></i>
                                                </a>
                                                @endif
                                                @if(Auth::user()->type == 2)
                                                <a href="#" class="me-3" id="edit-report" data-bs-toggle="tooltip">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                @endif
                                                <a href="#" class="" id="delete-report" data-bs-toggle="tooltip">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php $cnt += 1; @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <span class="badge badge-sm bg-gradient-success">Fixed</span>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                                        No.
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report Person
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact Number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report Description
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Reported
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Fixed
                                    </th>
                                    @if(Auth::user()->type == 1)
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @php $cnt = 1; @endphp
                                @foreach($reports as $rep)
                                    @if($rep->status == 0)
                                        <tr>
                                            <td class="ps-4" reportid='{{ $rep->id }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->User->Instructor->name }}</p>
                                            </td>
                                            <td class="text-center" >
                                                <p class="text-xs font-weight-bold mb-0">{{ $rep->User->Instructor->contact_number }}</p>
                                            </td>
                                            <td class="text-center" room='{{ $rep->Room->id }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $rep->Room->room }}</p>
                                            </td>
                                            <td class="text-center" description='{{ $rep->description }}'>
                                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->description }}</p>
                                            </td>
                                            <td class="text-center" >
                                                <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_reported)) }}</p>
                                            </td>

                                            <td class="text-center" >
                                                <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_fixed)) }}</p>
                                            </td>
                                            @if(Auth::user()->type == 1)
                                            <td class="text-center">
                                                <a href="#" class="" id="delete-report" data-bs-toggle="tooltip">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                            </td>
                                            @endif
                                        </tr>
                                        @php $cnt += 1; @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection