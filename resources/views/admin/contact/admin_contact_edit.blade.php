@extends('layout.admin_app') @section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contact edit</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
                @endif
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit </h5>
                <form method="post" action="{{ route('admin.contact.update', ['id' => $contactData->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="product-name">Office Address <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="address" value="{{ $contactData->address }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name">Phone <span class="text-danger">*</span></label>
                        <input type="number" id="product-name" class="form-control" name="phone" value="{{ $contactData->phone }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name">Email <span class="text-danger">*</span></label>
                        <input type="email" id="product-name" class="form-control" name="email" value="{{ $contactData->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name">Google Map Link <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="map" value="{{ $contactData->map }}">
                    </div>
                    <!-- Move the button inside the form -->
                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Update</button>
                </form>

            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection