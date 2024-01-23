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
        <div class="col-xl-8 col-lg-6">
            <!-- project card -->
            <div class="card d-block">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="dripicons-dots-3"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="{{route('admin.blog.edit',$blogs->id)}}" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>Edit</a>
                            <!-- item-->
                            <!-- <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete mr-1"></i>Delete</a> -->
                            <!-- item-->
                        </div>
                    </div>
                    <!-- project title-->
                    <h3 class="mt-0 font-20">
                        {{$blogs->title}}
                    </h3>
                    <h5>Blog Overview:</h5>

                    {!! $blogs->description !!}


                    <div class="mb-4">
                        <h5>Category</h5>
                        <div class="text-uppercase">
                            @foreach($categories as $categorie)
                            <p class="badge badge-soft-primary mr-1">{{$categorie->name}}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Post Date</h5>
                                <p>{{$blogs->created_at}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Update Date</h5>
                                <p>{{$blogs->updated_at}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Post by</h5>
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body-->

            </div> <!-- end card-->

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 mb-3">Comments (258)</h4>

                    <div class="mt-2">
                        <div class="media">
                            <div class="media-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="dripicons-dots-3"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Active</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Deactive</a>
                                    </div>
                                </div>
                                <h5 class="mt-0"><a href="contacts-profile.html" class="text-reset">Jeremy Tomlinson</a> <small class="text-muted">3 hours ago</small></h5>
                                Nice work, makes me think of The Money Pit
                            </div>
                            <br />
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1 font-16"></i> Load more </a>
                    </div>
                </div> <!-- end card-body-->
            </div>
            <!-- end card-->
        </div> <!-- end col -->
        <div class="col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Blog Image</h5>
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <img src="{{asset($blogs->image)}}" alt="{{$blogs->image}}" style="height: 320px; width: 320px;">
                    </div>
                </div>
            </div>
            <!-- end card-->
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->

@endsection
