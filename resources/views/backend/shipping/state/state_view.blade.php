@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Manage State</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>State Name</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                    @foreach ($states as $item)
                    <tr>
                        <td>{{ $item ->state_name }}</td>
                        <td>{{ $item ->Division->division_name }}</td>
                        <td>{{ $item ->District->district_name }}</td>
                        

                        <td >
                            <a href="{{ route('state.edit',$item->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('state.delete',$item->id) }}" id='delete' class="btn btn-danger">
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
                <h3 class="box-title">Add State</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('state.store')}}' method="POST">
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
								<h5>District Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="district_id"  required="" class="form-control">
										<option value="" disabled selected>Select Your District</option>
										
                                        @foreach ($district as $dis)
                                            <option value="{{ $dis -> id }}">{{ $dis ->district_name }}</option>
                                        @endforeach
									
									</select>
							    </div>
                            </div>

                            
                            <div class="form-group">
                                <h5> State Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="state_name"
                                class="form-control" 
                                ></div>

                                @error('state_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>




                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add State">
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