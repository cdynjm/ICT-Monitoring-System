@extends('components.modals.borrowed-asset-modal')
@extends('components.modals.returned-asset-modal')
@extends('components.modals.view-returned-asset-modal')
@extends('components.modals.edit.edit-borrowed-asset-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <span class="badge badge-sm bg-gradient-danger">Borrowed</span>
                        </div>
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0" id="create-asset" type="button">+&nbsp; Add</a>
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
                                        Property Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Borrower
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Position/Office
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact Number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Borrowed
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $cnt = 1; @endphp
                                @foreach($asset as $as)
                                    @if($as->status == 1)
                                        <tr>
                                            <td class="ps-4" assetid='{{ $as->id }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                            </td>
                                            <td class="text-center" assetname='{{ $as->property_name }}'>
                                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $as->property_name }}</p>
                                            </td>
                                            <td class="text-center" quantity='{{ $as->quantity }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->quantity }}</p>
                                            </td>
                                            <td class="text-center" name='{{ $as->name }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->name }}</p>
                                            </td>
                                            <td class="text-center" position='{{ $as->position }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->position }}</p>
                                            </td>
                                            <td class="text-center" contactnumber='{{ $as->contact_number }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->contact_number }}</p>
                                            </td>
                                            <td class="text-center" date='{{ $as->date_borrowed }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y', strtotime($as->date_borrowed)) }}</p>
                                            </td>
                                            <td person_in_charge='{{ $as->person_in_charge }}' hidden></td>
                                            
                                            <td class="text-center" address='{{ $as->address }}'>
                                                <a href="#" class="me-3" id="return-asset" data-bs-toggle="tooltip">
                                                    <i class="fas fa-check text-secondary"></i>
                                                </a>
                                                <a href="#" class="me-3" id="edit-asset" data-bs-toggle="tooltip">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <a href="#" class="" id="delete-asset" data-bs-toggle="tooltip">
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
                            <span class="badge badge-sm bg-gradient-success">Returned</span>
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
                                        Property Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Borrower
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Position/Office
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact Number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Borrowed
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Returned
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $cnt = 1; @endphp
                                @foreach($asset as $as)
                                    @if($as->status == 0)
                                    <tr>
                                            <td class="ps-4" assetid='{{ $as->id }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                            </td>
                                            <td class="text-center" assetname='{{ $as->property_name }}'>
                                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $as->property_name }}</p>
                                            </td>
                                            <td class="text-center" quantity='{{ $as->quantity }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->quantity }}</p>
                                            </td>
                                            <td class="text-center" name='{{ $as->name }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->name }}</p>
                                            </td>
                                            <td class="text-center" position='{{ $as->position }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->position }}</p>
                                            </td>
                                            <td class="text-center" contactnumber='{{ $as->contact_number }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ $as->contact_number }}</p>
                                            </td>
                                            <td class="text-center" date_borrowed='{{ $as->date_borrowed }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y', strtotime($as->date_borrowed)) }}</p>
                                            </td>
                                            <td class="text-center" date_returned='{{ $as->date_returned }}'>
                                                <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y', strtotime($as->date_returned)) }}</p>
                                            </td>
                                            <td person_in_charge='{{ $as->person_in_charge }}' hidden></td>
                                            
                                            <td class="text-center" address='{{ $as->address }}'>
                                                <a href="#" class="me-3" id="view-asset" data-bs-toggle="tooltip">
                                                    <i class="fas fa-eye text-secondary"></i>
                                                </a>
                                                <a href="#" class="" id="delete-asset" data-bs-toggle="tooltip">
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
    </div>
</div>
@endsection