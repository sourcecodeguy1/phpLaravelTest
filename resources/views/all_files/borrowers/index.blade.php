@extends('all_files.master.all_files_master')
@section('title','Borrowers')

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{asset('resources/backend/assets/extra-libs/multicheck/multicheck.css')}}">
        <link href="{{asset('resources/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endsection
@section('body')

<?php $x=0;?>



<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <div class="ml-auto text-left">
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

    <div class="container-fluid">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-12">
                <div class="card widget-box">
                    <div class="card-header  widget-title">
                        <h5 class="card-title">Borrowers Datatable</h5>
                    </div>
                    <div class="card-body row">
                            <div class="col-md-4 col-12 left plussrc">
                                <!-- <a href="{{URL('admin/add_borrowers')}}" class="btn btn-warning">
                                    Add a new Borrower +
                                </a> -->
                            </div>
                            <div class="col-md-4 col-12 left plussrc">
                                <a href="{{URL('admin/borrowers')}}" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>

                            @if( ! empty($status))
                            <div class="col-md-12 col-12">
                                <div class="alert alert-primary" role="alert">
                                    You Have Searched for: <b>{{$search}}</b>
                                </div>
                            </div>
                            @endif


                        <div class="table-responsive">
                            <table id="zero_config" class="table table-bordered data-table" width="100%" cellspacing="0">
                                {{$borrowers_tbl->links()}}
                                <thead>
                                    <th>S.L</th>
                                    <th>Borrower's Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>View Detail</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="table_body">
                                    @foreach($borrowers_tbl as $data)
                                    <tr>
                                        <td>
                                            <b>{{$loop->iteration}}</b>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->created_at->format('F j Y g:i A')}}</td>
                                        <td>{{$data->updated_at->format('F j Y g:i A')}}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail_{{$data->id}}">
                                              Details
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade bd-example-modal-lg" id="detail_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$data->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
<div class="control-group col-md-12 col-12 row">
    <div class="control-label col-md-5 col-12">
        <h5>Borrowers Name :</h5>
    </div>
    <div class="col-md-7 col-12">{{$data->name}}</div>
</div>



@if ($data->job==true)
<div class="control-group col-md-12 col-12 row">
    <h4>Borrowers Job details:</h4>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Borrowers Job:
        </div>
        <div class="col-md-7 col-12">
            @if ($data->job==true)
                <h5>Yes</h5>
            @else
                <h5>No</h5>
            @endif
        </div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">Borrowers monthly income ($):</div>
        <div class="col-md-7 col-12"><b>{{$data->monthly_income}}</b></div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">Borrowers Annual income ($):</div>
        <div class="col-md-7 col-12"><b>
            <?php
                $monthly=$data->monthly_income;
                echo $annually=$monthly*12;
            ?></b>
        </div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">Company Name:</div>
        <div class="col-md-7 col-12">
            <b>{{$data->job_company_name}}</b>
        </div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Job designation:
        </div>
        <div class="col-md-7 col-12">
            <b>{{$data->job_designation}}</b>
        </div>
    </div>


    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Job description:
        </div>
        <div class="col-md-7 col-12">{{$data->job_description}}</div>
    </div>
</div>
@else
    <h4 style="color: red;">Borrowers Doesn't have any Job</h4>
@endif


<div class="control-group col-md-12 col-12 row">


@if ($data->bank_account==true)
    <h4>Borrowers Bank Account details:</h4>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Borrowers bank account:
        </div>
        <div class="col-md-7 col-12">
            @if ($data->bank_account==true)
                <h5>Yes</h5>
            @else
                <h5>No</h5>
            @endif
        </div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Bank Name:
        </div>
        <div class="col-md-7 col-12">
            <b>{{$data->bank_name}}</b>
        </div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Borrowers current bank balance ($):
        </div>
        <div class="col-md-7 col-12">
            <b>{{$data->current_bank_balance}}</b>
        </div>
    </div>

    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-5 col-12">
            Bank description:
        </div>
        <div class="col-md-7 col-12">
            {{$data->bank_description}}
        </div>
    </div>
</div>
@else
    <h4 style="color: red;">Borrowers Doesn't have any Bank Account</h4>
@endif




    <div class="control-group col-md-12 col-12 row">
        <div class="control-label col-md-12 col-12" style="text-align: left;">
            <h4>Other Descriptions about Borrower:</h4>
        </div>
        <div class="col-md-12 col-12">
            <?php echo $des="{$data->borrower_description}";?>
        </div>
    </div>

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{URL('admin/edit_borrowers?id')}}={{$data->id}}" class="editBtn edbtn">Edit</a>

                                            <a href="javascript:" class="btn-mini deleteRecord deleteBtn edbtn" data-toggle="modal" data-target="#d{{$data->id}}">Delete</a>
                                            <div class="modal fade" id="d{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete  {{$data->name}}???</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    Do you really want to delete Borrower <b>{{$data->name}}</b>???
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{URL('admin/delete_borrowers?id')}}={{$data->id}}" type="button" class="btn btn-danger">Delete</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>{{$borrowers_tbl->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="resources/views/layout/bootstrap/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="resources/views/layout/bootstrap/bootstrap.min.js"  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
         fetch_publics_data();

         function fetch_publics_data(query = '')
         {
          $.ajax({
           url:"{{ route('live_search.action') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('#table_body').html(data.table_data);
           }
          })
         }

         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_publics_data(query);
         });
        });
    </script>


@endsection

@section('script')
@endsection

