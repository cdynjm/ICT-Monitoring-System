@extends('components.modals.room-modal')
@extends('components.modals.edit.edit-room-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Rooms</h5>
                            @php date_default_timezone_set("Asia/Singapore");  @endphp
                            @if(Auth::user()->type == 1)
                            <p class="mt-2 text-sm position-absolute mb-8"><span class="me-2 text-success"><i class="fas fa-calendar-day"></i></span>{{ date('M d, Y') }}</p>
                            @endif
                        </div>
                        @if(Auth::user()->type == 1)
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0 mb-4" id="create-room" type="button">+&nbsp; Add</a>
                        @endif
                        @if(Auth::user()->type == 2)
                        <p class="mt-2 text-sm"><span class="me-2 text-success"><i class="fas fa-calendar-day"></i></span>{{ date('M d, Y') }}</p>
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
                                        Room
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        On Class
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
                                @foreach($room as $ro)
                                <tr>
                                    <td class="ps-4" roomid='{{ $ro->id }}'>
                                        <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                    </td>
                                    <td class="text-center" room='{{ $ro->room }}'>
                                        <p class="text-xs font-weight-bold mb-0">{{ $ro->room }}</p>
                                    </td>
                                    <td class="text-center" status='{{ $ro->status }}'>
                                        @if($ro->status == 1)
                                            <span class="badge badge-sm bg-gradient-success"><i class="fas fa-check-circle"></i></span>
                                        @endif
                                        @if($ro->status == 0)
                                            <span class="badge badge-sm bg-gradient-info"><i class="fas fa-user-check"></i></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @foreach ($schedule as $sched)
                                            @if($ro->id == $sched->roomid && $sched->status == 1)
                                                <p class="text-xs @if($sched->userid == Auth::user()->userid) text-info @endif font-weight-bold mb-0">@if($sched->userid == Auth::user()->userid) <span class="me-2 text-dark">YOUR CLASS: </span> @endif{{ $sched->User->name }} | {{ date('h:i A', strtotime($sched->date_from)) }} - {{ date('h:i A', strtotime($sched->date_to)) }}</p>
                                            @endif
                                        @endforeach
                                    </td>
                                    @if(Auth::user()->type == 1)
                                    <td class="text-center">
                                        <a href="#" class="mx-3" id="edit-room" data-bs-toggle="tooltip">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="#" class="" id="delete-room" data-bs-toggle="tooltip">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @php $cnt += 1; @endphp
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