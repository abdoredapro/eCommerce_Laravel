@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Manage District</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                    @foreach ($district as $item)
                    <tr>
        
                        <td>{{ $item ->Division->division_name }}</td>
                        <td>{{ $item ->district_name }}</td>

                        <td >
                            <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('district.delete',$item->id) }}" id='delete' class="btn btn-danger">
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

        {{-- start .col  --}}
        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Add District</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('district.store')}}' method="POST">
                            @csrf

                            <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id"  required="" class="form-control">
										<option value="" disabled selected>Select Your Division</option>
										
                                        @foreach ($division as $div)
                                            <option value="{{ $div -> id }}">{{ $div ->division_name }}</option>
                                        @endforeach
									
									</select>
							    </div>
                            </div>

                            
                            <div class="form-group">
                                <h5> District Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="district_name"
                                class="form-control" 
                                ></div>

                                @error('district_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>




                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add District">
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