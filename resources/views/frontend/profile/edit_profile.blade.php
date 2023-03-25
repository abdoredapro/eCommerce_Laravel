@extends('frontend.master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                
                @include('frontend.common.user_sidebar')
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h2 class="h2 text-center">Edit Profile</h2>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input" value="{{ $user -> name }}" >
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"  value="{{ $user -> email }}" >
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone</label>
                                <input type="text"  name="phone" class="form-control unicase-form-control text-input" value="{{ $user -> phone }}" >
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Profile Picture</label>
                                <input type="file" name="image" class="form-control unicase-form-control text-input"  >
                                
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Save</button>
                                
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection