@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Profile</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col">
                <form action='{{ route('admin.profile.store')}}' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="name" class="form-control" 
                                required="" 
                                value="{{ $profileEdit ->name }}"
                                ></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Email<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="email" name="email" class="form-control" 
                                value="{{ $profileEdit ->email }}"
                                required="" 
                                ></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
								<h5>Profile Image<span class="text-danger">*</span></h5>
								<div class="controls">
								<input type="file" name="image" 
                                onchange="getVal(this.value)"
                                class="form-control img" required> </div>
							</div>
                        </div>
                        <div class="col-md-6">
                            <img 
                            src="{{ (!empty($profileEdit ->profile_photo_path)) ? 
                            asset('backend/upload/admin_images/'.$profileEdit ->profile_photo_path) : 
                            asset('backend/upload/admin_images/no-image.png')
                            }}"
                            style='width:100px;height:100px;border-radius:50%'
                            class="showImage"
                            >
                        </div>

                    </div>

                        
                    <div class="text-xs-right">
                        <input type="submit" class='btn btn-rounded btn-primary'>
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

<script>
    let uploadedImage = document.querySelector('.img');
    let show = document.querySelector('.showImage');
    function getVal(value) {
        // C:\fakepath\271820515_627005041742997_7415183269815747022_n.png
    

    }
</script>
@endsection
