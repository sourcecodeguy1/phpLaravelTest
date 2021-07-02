@extends('all_files.master.all_files_master')
@section('title','Add Borrowers')
@section('body')




<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <div class="ml-auto text-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL('admin')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Borrowers</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-12">
                <div class="card widget-box">
                    <div class="card-header  widget-title">
                        <h5 class="card-title">Add Borrowers</h5>
                    </div>
                    <div class="card-body">
                    <form autocomplete="off" action="{{URL('admin/insert_borrowers')}}" method="post" enctype='multipart/form-data'>
                      {{csrf_field()}}


                        <div class="control-group col-md-12 col-12 row">
                            <div class="control-label col-md-3 col-12">
                            <h5>Borrowers Name :</h5>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="text" name="name" class="form-control cs_form_control" required>
                            </div>
                        </div>



                        <div class="control-group col-md-12 col-12 row">
                            <h3>Borrowers Job details:</h3>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Borrowers have Job:
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="job" type="checkbox" class="cs_check_box">
                                </div>
                            </div>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Borrowers monthly income ($):
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="monthly_income" type="number" class="form-control cs_form_control">
                                </div>
                            </div>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Company Name:
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="job_company_name" type="text" class="form-control cs_form_control">
                                </div>
                            </div>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Job designation:
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="job_designation" type="text" class="form-control cs_form_control">
                                </div>
                            </div>


                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Job description:
                                </div>
                                <div class="col-md-9 col-12">
                                    <textarea name="job_description" class="form-control cs_form_control cs_form_ta"></textarea> 
                                </div>
                            </div>
                        </div>




                        <div class="control-group col-md-12 col-12 row">
                            <h3>Borrowers Bank Account details:</h3>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Borrowers have bank account:
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="bank_account" type="checkbox" class="cs_check_box">
                                </div>
                            </div>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Bank Name:
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="bank_name" type="text" class="form-control cs_form_control">
                                </div>
                            </div>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Borrowers current bank balance ($):
                                </div>
                                <div class="col-md-9 col-12">
                                    <input name="current_bank_balance" type="number" class="form-control cs_form_control">
                                </div>
                            </div>

                            <div class="control-group col-md-12 col-12 row">
                                <div class="control-label col-md-3 col-12">
                                    Bank description:
                                </div>
                                <div class="col-md-9 col-12">
                                    <textarea name="bank_description" class="form-control cs_form_control cs_form_ta"></textarea> 
                                </div>
                            </div>
                        </div>




                        <div class="control-group col-md-12 col-12 row">
                            <div class="control-label col-md-12 col-12" style="text-align: left;">
                                <h3>Other Descriptions about Borrower:</h3>
                            </div>
                            <div class="col-md-12 col-12">
                                <textarea id="my-editor" name="borrower_description" class="editor1"></textarea>
                            </div>
                        </div>

                        <div class="control-group col-md-12 col-12">
                              <div class="show_img_in_input_w">
                                <input type="submit" value="save" class="btn btn-primary">
                              </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: "{{URL('laravel-filemanager')}}?type=Images",
    filebrowserImageUploadUrl: "{{URL('laravel-filemanager')}}/upload?type=Images&_token=",
    filebrowserBrowseUrl: "{{URL('laravel-filemanager')}}?type=Files",
    filebrowserUploadUrl: "{{URL('laravel-filemanager')}}/upload?type=Files&_token="
  };
</script>
Sample 1 - Replace by ID:

<script>
CKEDITOR.replace('my-editor', options);
</script>
Sample 2 - With JQuery Selector:

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
$('textarea.my-editor').ckeditor(options);
</script>



                <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>




@endsection