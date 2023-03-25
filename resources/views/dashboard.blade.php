@extends('frontend.master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-2">
                @include('frontend.common.user_sidebar')
            </div>
            <div class="col-md-2 col-6">

            </div>
            <div class="col-md-6 col-4">
                <h2 class="text-center">Hello <strong>{{ Auth::user()->name }} ...</strong>
                    Welcome Back!
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection