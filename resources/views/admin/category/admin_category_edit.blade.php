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
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-error" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit Category</h5>
                <form method="post" action="{{ route('admin.catrgory.update', ['id' => $categoryData->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group mb-3">
                        <label for="product-name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="name" value="{{$categoryData->name}}">
                    </div>
                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection