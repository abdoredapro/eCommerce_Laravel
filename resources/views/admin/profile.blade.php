@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                  <h3 class="widget-user-username">{{ $profile ->name }}</h3>
                  <a href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-success mb-4" style="float: right">Edit Profile</a>
                  <h6 class="widget-user-desc"> {{ $profile ->email }} </h6>
                </div>
                <div class="widget-user-image">
                  <img class="rounded-circle"
                   src="{{ (!empty($profile ->profile_photo_path)) ? 
                   asset('backend/upload/admin_images/'.$profile ->profile_photo_path) : 
                   asset('backend/upload/admin_images/no-image.png')
                    }}" 
                   alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">12K</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 br-1 bl-1">
                      <div class="description-block">
                        <h5 class="description-header">550</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">158</h5>
                        <span class="description-text">TWEETS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>
        </div>
    </section>
</div>
@endsection