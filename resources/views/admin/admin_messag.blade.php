@extends('layout.admin_app') @section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Message page</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Message</h5>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Subject</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messageData as $message)
                            <tr>
                                <td>
                                    {{$message->id}}
                                </td>
                                <td>
                                    {{$message->name}}
                                </td>
                                <td>
                                    {{$message->email}}
                                </td>
                                <td>
                                    {{$message->message}}
                                </td>
                                <td>
                                    {{$message->subject}}
                                </td>
                                <td>
                                    {{$message->created_at}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection