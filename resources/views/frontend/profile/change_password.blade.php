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
                        <form method="POST" action="{{ route('user.pass.store') }}"  >
                            @csrf
                            <div class="form-group">
                                <label class="info-title" >Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control unicase-form-control text-input"  >
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" >New Password</label>
                                <input id="password" type="password" name="password" class="form-control unicase-form-control text-input"  >
                                
                            </div>
                            <div class="form-group">
                                <label class="info-title" >Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control unicase-form-control text-input"  >
                                
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