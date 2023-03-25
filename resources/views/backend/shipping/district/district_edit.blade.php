@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">

        <div class="col-5">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit District</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('district.update',$district->id)}}' method="POST">
                            @csrf

                            <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id"  required="" class="form-control">
										<option value="" disabled selected>Select Your Division</option>
										
                                        @foreach ($division as $div)
                                            <option value="{{ $div -> id }}" 
                                                {{ ($div -> id == $district->division_id) ? 'selected' : '' }}
                                                >{{ $div ->division_name }}</option>
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
                                value="{{ $district->district_name }}"
                                ></div>

                                @error('district_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>




                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update District">
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