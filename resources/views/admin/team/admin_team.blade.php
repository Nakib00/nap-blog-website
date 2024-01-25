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
                <form method="post" action="{{ route('admin.team.store') }}" enctype="multipart/form-data" id="team-form">
                    @csrf
                    @method('post')
                    <div class="form-group mb-3">
                        <label for="product-name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="team-name" class="form-control" name="name" value="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-name">Job Title <span class="text-danger">*</span></label>
                        <input type="text" id="team-jobtitle" class="form-control" name="jobTitle" value="">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-summary">Description</label>
                        <textarea class="form-control" id="team-description" rows="3" name="description"></textarea>
                    </div>
                    <div class="fallback m-3">
                        <label for="product-summary">Upload Adout page Image</label>
                        <input name="file" type="file" multiple />
                    </div>
                    <!-- Move the button inside the form -->
                    <button type="button" class="btn w-sm btn-success waves-effect waves-light" id="btn-submit">Save</button>
                </form>

            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

<!-- JavaScript for AJAX submission -->
<script>
    $(document).ready(function() {
        $("#btn-submit").click(function() {
            // Disable the button to prevent multiple submissions
            $(this).prop("disabled", true);

            $.ajax({
                url: $("#team-form").attr("action"),
                type: $("#team-form").attr("method"),
                data: new FormData($("#team-form")[0]),
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success
                    console.log(response);

                    // Clear form fields
                    $("#team-form")[0].reset();

                    // Show success alert
                    showAlert('success', 'Team member added successfully.');
                },
                error: function(error) {
                    // Handle errors
                    console.log(error);

                    // Show error alert
                    showAlert('error', 'Error adding team member. Please try again.');
                },
                complete: function() {
                    // Re-enable the button after the request is complete
                    $("#btn-submit").prop("disabled", false);
                }
            });
        });

        function showAlert(type, message) {
            // You can customize this function based on how you want to display alerts
            alert(type.toUpperCase() + ': ' + message);
        }
    });
</script>

@endsection
