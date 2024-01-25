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
                                <th>ID</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Title</th>
                                <!-- <th>Description</th> -->
                                <th>Update</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aboutData as $about)
                            <tr>
                                <td><a href="ecommerce-order-detail.html" class="text-body font-weight-bold">{{ $about->id }}</a> </td>
                                <td>
                                    <a href=""><img src="{{ $about->image }}" alt="product-img" height="32" /></a>
                                </td>
                                <td>
                                    {{ $about->created_at }}
                                </td>
                                <td>
                                    {{ $about->title }}
                                </td>
                                <!-- <td>
                                    <p>{{ $about->description }}</p>
                                </td> -->
                                <td>
                                    {{ $about->updated_at }}
                                </td>
                                <td>
                                    <a href="{{route('admin.about.edit', $about->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div> <!-- end col -->

        <!-- team info  -->
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Blog page Team</h5>
                <div class="table-responsive">
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a href="{{route('admin.team.add')}}"><button type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2">Add New Member</button></a>
                        </div>
                    </div>
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Jobe Title</th>
                                <!-- <th>Description</th> -->
                                <th>Date</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team as $teams)
                            <tr>
                                <td><a href="ecommerce-order-detail.html" class="text-body font-weight-bold">{{ $teams->id }}</a> </td>

                                <td>
                                    {{ $teams->name }}
                                </td>
                                <td>
                                    <a href=""><img src="{{ $teams->image }}" alt="product-img" height="32" /></a>
                                </td>
                                <td>
                                    {{ $teams->jobTitle }}
                                </td>
                                <!-- <td>
                                    <p>{{ $about->description }}</p>
                                </td> -->
                                <td>
                                    {{ $teams->created_at }}
                                </td>
                                <td>
                                    <a href="{{route('admin.team.edit', $teams->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <form action="{{ route('admin.team.delete', $teams->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link action-icon">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>

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
