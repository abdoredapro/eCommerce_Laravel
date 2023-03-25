@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Change Password</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col">
                <form action='{{ route('admin.update.password')}}' method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="password" id="current_password"
                                name="current_pass" 
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>New Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="password"
                                name="password"
                                id="password"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Confirm Passwrod<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="password"
                                name="password_confirmation"
                                class="form-control" 
                                id="password_confirmation"
                                required="" 
                                ></div>
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="text-xs-right">
                        <input type="submit" class='btn btn-rounded btn-primary' value="Update">
                    </div>
                    
                </form>

            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        </div>
        <!-- main - box -->

    </section>
</div>


@endsection
