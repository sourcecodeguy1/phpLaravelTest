@extends('all_files.master.all_files_master')
@section('title','Dashboard')

    @section('css')
     <style type="text/css">
        .secondary_bg {
            background: blue!important;
        }
     </style>
    @endsection
@section('body')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
   <div class="row">
                    <!-- Show number of borrowers -->
                    <a href="{{URL('admin/borrowers')}}" style="cursor: pointer;" class="col-md-12 col-lg-12 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">
                                    All Borrowers (
                                    @php
                                        echo $total_application=App\admin\borrowers_tbl::count();
                                    @endphp
                                    )
                                </h6>
                            </div>
                        </div>
                    </a>
                    <!-- Column -->
                </div>

                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    Latest Applications
                                </h4>
                            </div>
                            <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="7a63a656-58b9-f116-1ead-ee7d1e1f8125">

                                @foreach($borrowers_tbl as $data)
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="{{URL('resources/all_files/assets/images/users/1.jpg')}}" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">{{$data->name}}</h6>
                                        <span class="mb-3 d-block">
                                            <?php echo "{$data->borrower_description}";  ?>
                                        </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">
                                                {{$data->created_at->format('F j Y g:i A')}}
                                            </span>
                                            <br>
                                            <a href="{{URL('admin/edit_borrowers?id')}}={{$data->id}}" type="button" class="btn btn-success btn-sm text-white">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach


                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        </div>
                    </div>

                </div>
    </div>


</div>

@endsection


