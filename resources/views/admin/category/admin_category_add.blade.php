@extends('layout.admin_app') @section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Category page</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- include alert  -->
    @include('layout.alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">New Category</h5>
                <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group mb-3">
                        <label for="product-name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label>Status</label> <br />
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="active">
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="deactive">
                            <label class="custom-control-label" for="customRadio3">Inactive</label>
                        </div>
                    </div>

                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                </form>

            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection