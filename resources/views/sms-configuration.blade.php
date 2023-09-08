@extends('layouts.user_type.auth')

@section('content')

@php $cnt = 1; date_default_timezone_set("Asia/Singapore");  @endphp

<div>
    <div class="row">
        
    <div class="col-12">
        <div class="card card-body">
                <form action="" id="sms-configuration">
                @csrf
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">Pushbullet Account Settings (SMS)</h6>
                        </div>
                        <div class="col-md-12">
                            <p class="text-wrap text-justify text-sm">Pushbullet's API enables developers to build on the Pushbullet infrastructure. Our goal is to provide a full API that enables anything to tap into the Pushbullet network.
                            The Pushbullet API lets you send/receive pushes and do everything else the official Pushbullet clients can do. To access the API you'll need an access token so the server knows who you are. You can get one from your <a href="https://www.pushbullet.com/" target="_blank" class="text-info text-decoration-underline">Account Settings</a> page.
                            </p>
                        </div>

                        @foreach ($smstoken as $st)
                            <div class="mb-3 col-md-12">
                                <label class="form-label">URL</label>
                                <input type="text" name="url" class="form-control text-info text-decoration-underline" value='{{ $st->url }}'>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Access Token</label>
                                <input type="text" name="access_token" class="form-control fw-bold" value='{{ $st->access_token }}'>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mobile Identity</label>
                                <input type="text" name="mobile_identity" class="form-control fw-bold" value='{{ $st->mobile_identity }}'>
                            </div>

                            <div class="mb-3 col-md-12">
                                <button class="btn bg-gradient-success mt-2">Update</button>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    
</div>
@endsection