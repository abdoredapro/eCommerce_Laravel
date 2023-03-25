@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <section class="content">

        <!-- Basic Forms -->
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Site Setting</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
            
                       
                            <form action='{{ route('site.setting.update',$site->id)}}' method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                    
                                <div class="form-group">
                                    <h5>Website Logo<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="file"
                                    name="logo" 
                                    class="form-control" 
                                    
                                    ></div>
                                </div>

                                <div class="form-group">
                                    <h5>Website name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="website_name" 
                                    class="form-control" 
                                    value="{{ $site->website_name }}"
                                    ></div>
                                </div>


                                <div class="form-group">
                                    <h5>Website address<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="website_address" 
                                    class="form-control" 
                                    value="{{ $site->website_address }}"
                                    ></div>
                                </div>
                                    
                                <div class="form-group">
                                    <h5>Phone<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="phone" 
                                    class="form-control" 
                                    value="{{ $site->phone }}"
                                    ></div>
                                </div>


                                <div class="form-group">
                                    <h5>Email<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="email" 
                                    class="form-control" 
                                    value="{{ $site->email }}"
                                    ></div>
                                </div>

                                <div class="form-group">
                                    <h5>Facebook<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="facebook" 
                                    class="form-control" 
                                    value="{{ $site->facebook }}"
                                    ></div>
                                </div>

                                <div class="form-group">
                                    <h5>Twitter<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="twitter" 
                                    class="form-control"
                                    value="{{ $site->twitter }}" 
                                    ></div>
                                </div>
            
                                
            
            
                                    
                                <div class="text-xs-right">
                                    <input type="submit" class='btn btn-rounded btn-primary' value="Update">
                                </div>
                                
                            </form>
            
                       
                    
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- main - box -->
            </div>
        </div>

    </section>
</div>


@endsection
