@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Manage Slider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Slider Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($sliders as $slider)
                            <tr>
                                <td>
                                    <img src="{{asset('upload/slider/'.$slider -> slider_image)}}" style="width:70px;height:50px">
                                </td>
                                <td>
                                    @if ( $slider ->title !== null)
                                        {{$slider ->title}}
                                    @else
                                    <span class="badge badge-pill bg-danger">No Title</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $slider ->description }}

                                    @if ( $slider ->description !== null)
                                        {{$slider ->description}}
                                    @else
                                    <span class="badge badge-pill bg-danger">No Description</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($slider ->status == 1)
                                    <span class="badge badge-pill bg-success">Active</span>
                                    @else
                                    <span class="badge badge-pill bg-danger">Not Active</span>
                                    @endif
                                    
                                </td>
                                
                                <td>
                                    <a href="{{ route('brand.edit', $slider->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('brand.delete', $slider->id) }}" id='delete' class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    @if ($slider ->status == 1)
                                    <a href="{{ route('slider.in_active',$slider->id) }}" class="btn btn-danger"
                                       title="In Active" >
                                        <i class="fa fa-arrow-down"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('slider.active',$slider->id) }}"  class="btn btn-success" title="Active" >
                                        <i class="fa fa-arrow-up"></i>
                                    </a>
                                    @endif
                                    
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

        {{-- start .col  --}}
        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('slider.store')}}' method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Slider Title</h5>
                                <div class="controls">
                                <input type="text" 
                                name="title" 
                                class="form-control" 
                               
                                ></div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Description</h5>
                                <div class="controls">
                                <input type="text"
                                name="description"
                                class="form-control" 
                                
                                ></div>
                            </div>

                                    <div class="form-group">
                                        <h5>Slider Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="file"
                                        name="slider_image"
                                        class="form-control" 
                                        required="" 
                                        ></div>
                                    </div>

                            
        
                                
                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add Slider">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
            </div>
        {{-- end .col  --}}

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