@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <section class="content">

        <!-- Basic Forms -->
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Seo Setting</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
            
                       
                            <form action='{{ route('seo.setting.update',$seo->id)}}' method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                    
                                <div class="form-group">
                                    <h5>Meta title<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="meta_title" 
                                    class="form-control" 
                                    value="{{ $seo->meta_title }}"
                                    ></div>
                                </div>

                                <div class="form-group">
                                    <h5>Meta author<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="meta_author" 
                                    class="form-control" 
                                    value="{{ $seo->meta_author }}"
                                    ></div>
                                </div>


                                <div class="form-group">
                                    <h5>Meta Keyword<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text"
                                    name="meta_keyword" 
                                    class="form-control" 
                                    value="{{ $seo->meta_keyword }}"
                                    ></div>
                                </div>
                                    
                                <div class="form-group">
                                    <h5>Meta description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="meta_description" class="form-control" cols="5" rows="10" placeholder="Enter meta description">
                                            {{ $seo->meta_description }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Google analytics<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="google_analytics" class="form-control"  cols="5" rows="10" placeholder="Enter google analytics">
                                            {{ $seo->google_analytics }}
                                        </textarea>
                                    </div>
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
