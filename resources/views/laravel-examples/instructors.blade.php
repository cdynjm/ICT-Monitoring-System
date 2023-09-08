@extends('components.modals.instructor-modal')
@extends('components.modals.edit.edit-instructor-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Instructors</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0" id="create-instructor" type="button">+&nbsp; Add</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No.
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Position
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact Number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $cnt = 1; @endphp
                                @foreach($instructor as $in)
                                <tr>
                                    <td class="ps-4" userid='{{ $in->id }}'>
                                        <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                    </td>
                                    <td class="text-start" fullname='{{ $in->name }}'>
                                        <p class="text-xs font-weight-bold mb-0">{{ $in->name }}</p>
                                    </td>
                                    <td class="text-center" position='{{ $in->position }}'>
                                        <p class="text-xs font-weight-bold mb-0">{{ $in->position }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $in->User->email }}</p>
                                    </td>
                                    <td class="text-center" contactnumber='{{ $in->contact_number }}'>
                                        <p class="text-xs font-weight-bold mb-0">{{ $in->contact_number }}</p>
                                    </td>
                                    <td class="text-center" address='{{ $in->address }}'>
                                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $in->address }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" id="edit-instructor" data-bs-toggle="tooltip">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="#" class="" id="delete-instructor" data-bs-toggle="tooltip">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
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