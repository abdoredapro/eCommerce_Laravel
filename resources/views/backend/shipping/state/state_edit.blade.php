@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-5">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit State</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('state.update',$state->id)}}' method="POST">
                            @csrf

                            <div class="form-group">
								<h5>Division Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id"  required="" class="form-control">
										<option value="" disabled selected>Select Your Division</option>
										
                                        @foreach ($division as $div)
                                            <option value="{{ $div -> id }}" 
                                                {{ $div -> id == $state->division_id ? 'selected' : ''}}
                                                >{{ $div ->division_name }}</option>
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
                                            <option value="{{ $dis -> id }}"
                                                {{ $dis -> id == $state->district_id ? 'selected' : ''}}
                                                >{{ $dis ->district_name }}</option>
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
                                value="{{ $state->state_name }}"
                                ></div>

                                @error('state_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>




                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update State">
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