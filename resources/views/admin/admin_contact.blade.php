@extends('layout.admin_app') @section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">About page edit</h4>
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
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">About of the Nap Blog</h5>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Office Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Google Map</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactData as $contact)
                            <tr>
                                <td>
                                    {{$contact->address}}
                                </td>
                                <td>
                                    {{$contact->phone}}
                                </td>
                                <td>
                                    {{$contact->email}}
                                </td>
                                <td>
                                    <a href="{{$contact->map}}">Map Link</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.contact.edit',$contact->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline">Edit</i></a>
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