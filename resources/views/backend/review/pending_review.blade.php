@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Review</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Review</li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">All pending review</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>comment</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                    @foreach ($reviews as $rev)
                    <tr>
        
                        <td>{{ $rev ->comment }}</td>
                        <td>{{ $rev ->product_id }}</td>
                        <td>
                            @if ($rev->status == 0)
                            <span class="badge badge-pill badge-primary">Pending</span>
                            
                            @endif
                            
                        </td>

                        <td>
                            <a href="{{ route('approve.rev',$rev->id) }}" class="btn btn-success">Approve</a>
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