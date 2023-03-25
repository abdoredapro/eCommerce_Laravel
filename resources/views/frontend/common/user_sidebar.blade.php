@php
    $user = DB::table('users')->find(Auth::user()->id);

@endphp


<img src="{{ (!empty($user ->profile_photo_path)) ? 
 asset('upload/user_images/'.$user ->profile_photo_path) : 
    asset('upload/user_images/no-image.png')
    }}" style="width: 150px;
    height: 150px;
    max-width: 100%;border-radius:50%;
    display: block;
    margin: 0 auto 10px;"
        class="card-img-top d-block mt-4"
    >

    <ul class="list-group list-group-flush">
        <a href="{{ route('profile') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('my.order') }}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{ route('my.return_order') }}" class="btn btn-primary btn-sm btn-block">Return Order</a>
        <a href="{{ route('my.canceld_order') }}" class="btn btn-primary btn-sm btn-block">Canceld Order</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-lg btn-block">Edit Profile</a>
        <a href="{{ route('user.pass.change')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>