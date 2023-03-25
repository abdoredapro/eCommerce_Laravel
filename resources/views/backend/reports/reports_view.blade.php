@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Search By Date</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('search-by-date')}}' method="POST">
                            @csrf

                            <div class="form-group">
                                <h5>Select Date<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="date"
                                name="order_date"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Search">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
            </div>
        {{-- end .col  --}}

        
        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Search by month and year</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('search-month-year')}}' method="POST">
                            @csrf

                            <div class="form-group">
                                <h5>Select Month<span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <select name="order_month" class="form-control" required>
                                        <option value="" selected disabled>Select Month</option>
                                        @php
                                        for ($m=1; $m<=12; $m++) {
                                            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                                            $arr= array();
                                            
                                            echo '<option value='. $month .' >'. $month . '</option>';
                                            
                                            }
                                        @endphp
                                        
                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <h5>Select Year<span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <select name="order_year" class="form-control" required>
                                        <option value="" selected disabled>Select Year</option>
                                        @foreach (range(2010,date('Y')) as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                        
                                    </select>

                                </div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Search">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
            </div>
        {{-- end .col  --}}

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Search by year</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('search-year')}}' method="POST">
                            @csrf

            

                            <div class="form-group">
                                <h5>Select Year<span class="text-danger">*</span></h5>
                                <div class="controls">

                                    <select name="order_year" class="form-control" required>
                                        <option value="" selected disabled>Select Year</option>
                                        @foreach (range(2010,date('Y')) as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                        
                                    </select>

                                </div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Search">
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