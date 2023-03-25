@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">All Users <span class="badge badge-pill badge-primary">{{ count($users) }}</span> </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                    @foreach ($users as $user)
                    <tr>
                        <td><img src="{{ (!empty($user ->profile_photo_path)) ? 
                            asset('upload/user_images/'.$user ->profile_photo_path) : 
                               asset('upload/user_images/no-image.png')
                               }}" style="border-radius:50%;max-width:120px"
                                   class="card-img-top d-block mt-4"
                                   
                               ></td>
                        <td>{{ $user ->name }}</td>
                        <td>{{ $user ->email }}</td>
                        <td>{{ $user ->phone }}</td>
                        <td>
                            @if ($user->userOnline())
                                <span class="badge badge-pill badge-success">Active Now</span>
                            @else
                            <span class="badge badge-pill badge-danger">
                                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                            </span>
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('admin.cat.edit',$user->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('cat.delete',$user->id) }}" id='delete' class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
    
                        <tbody>
                    </table>
                    </div>              
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
            </div>
            <!-- /.col -->



    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection

@section('script')
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
@endsection