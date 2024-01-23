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
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Blog list</h5>
                <div class="table-responsive">
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a href="{{route('admin.blog.add')}}"><button type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2">Add New Blog</button></a>
                        </div>
                    </div>
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Show on Home</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td><a href="ecommerce-order-detail.html" class="text-body font-weight-bold">{{$blog ->id}}</a> </td>

                                <td>
                                    {{$blog ->title}}
                                </td>
                                <th>
                                    {{$blog ->created_at}}
                                </th>
                                <td>
                                    @if($blog->status == '1')
                                    <a href="{{route('admin.blog.status_change', ['id' => $blog->id, 'status' => '0'])}}"><span class="badge badge-success">Active</span></a>
                                    @else
                                    <a href="{{route('admin.blog.status_change', ['id' => $blog->id, 'status' => '1'])}}"><span class="badge badge-danger">Inactive</span></a>
                                    @endif
                                </td>
                                <td>
                                    @if($blog->show_on_home == '1')
                                    <a href="{{route('admin.blog.showHome', ['id' => $blog->id, 'show' => '0'])}}"><span class="badge badge-success">ON</span></a>
                                    @else
                                    <a href="{{route('admin.blog.showHome', ['id' => $blog->id, 'show' => '1'])}}"><span class="badge badge-danger">OFF</span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.blog.detail', $blog->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="{{route('admin.blog.edit', $blog->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>

                                    <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" style="display: inline;">
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
