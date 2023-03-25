@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Division</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('division.update',$division->id)}}' method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <h5>Division Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="division_name"
                                class="form-control" 
                                value="{{ $division-> division_name}}"
                                ></div>

                                @error('division_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>




                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update Division">
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