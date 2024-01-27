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
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit Team </h5>
                <form method="post" action="{{ route('admin.team.update', ['id' => $teamData->id]) }}" enctype="multipart/form-data" id="team-form">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="product-name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="name" value="{{ $teamData->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name">Job Title <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" class="form-control" name="jobTitle" value="{{ $teamData->jobTitle }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-summary">Description</label>
                        <textarea class="form-control" id="product-summary" rows="3" name="description">{{ $teamData->description }}</textarea>
                    </div>
                    <div class="fallback m-3">
                        <label for="product-summary">Upload Adout page Image</label>
                        <input name="file" type="file" multiple />
                    </div>
                    <!-- Move the button inside the form -->
                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Update</button>
                </form>

            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

<script>
    $(document).ready(function() {
        $('form#team-form').submit(function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Serialize form data
            var formData = $(this).serialize();

            // Show confirmation dialog
            if (confirm('Are you sure you want to update the team data?')) {
                // AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'PUT', // Use PUT method for update
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        // Show success alert
                        alert('Team data updated successfully.');
                        // Redirect to a page
                        window.location.href = '{{ route("admin_about") }}'; // Replace with your desired route
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>



@endsection
