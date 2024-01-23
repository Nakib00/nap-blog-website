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
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">New Blog</h5>
                <form method="post" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group mb-3">
                        <label for="product-name">Title <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="title" value="">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">Description <span class="text-danger">*</span></label>
                        <!-- basic summernote-->
                        <div id="summernote-basic"></div>
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label> <br />
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="active">
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="inactive">
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

<script>
    $(document).ready(function() {
        $('#summernote-basic').summernote({
            // Summernote options
        });

        // Add an event listener to update the hidden input when Summernote content changes
        $('#summernote-basic').on('summernote.change', function() {
            var summernoteContent = $('#summernote-basic').summernote('code');
            $('#summernote-content').val(summernoteContent);
        });
    });
</script>


@endsection
