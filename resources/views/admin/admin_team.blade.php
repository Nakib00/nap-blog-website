@extends('layout.admin_app') @section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Team</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Team </h5>
                <form method="post" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group mb-3">
                        <label for="product-name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="name" value="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name">Job Title <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="jobTitle" value="">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-summary">Description</label>
                        <textarea class="form-control" id="product-summary" rows="3" name="description"></textarea>
                    </div>
                    <div class="fallback m-3">
                        <label for="product-summary">Upload Adout page Image</label>
                        <input name="file" type="file" multiple />
                    </div>
                    <!-- Move the button inside the form -->
                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                </form>

            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection