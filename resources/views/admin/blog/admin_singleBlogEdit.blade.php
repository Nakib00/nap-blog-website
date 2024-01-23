@extends('layout.admin_app') @section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Blog page</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- include alert  -->
    @include('layout.alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit Blog</h5>
                <form method="post" action="{{route('admin.blog.update', ['id' => $blogdata->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="product-name">Title <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="title" value="{{$blogdata->title}}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">Description <span class="text-danger">*</span></label>
                        <!-- basic summernote-->
                        <div id="summernote-basic">{!! $blogdata->description !!}</div>
                        <!-- Hidden input to store Summernote content -->
                        <input type="hidden" name="description" id="summernote-content">
                    </div>

                    <div class="fallback m-3">
                        <label for="product-summary">Upload Image</label>
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="form-group mb-3">
                        <label for="example-select">Category</label>
                        <select class="form-control" id="example-select" name="categories[]" multiple>
                            @foreach($categoryData as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $blogdata->category_ids) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection
