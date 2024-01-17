@extends('layout.admin_app')

@section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Category page</h4>
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
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Category list</h5>
                <div class="table-responsive">
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a href="{{route('admin.catrgory.add')}}">
                                <button type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2">Add New Catecory</button>
                            </a>
                        </div>
                    </div>
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    @if($category->status == '0')
                                    <a href="{{route('admin.category.status.change', ['id' => $category->id, 'status' => '1'])}}">
                                        <span class="badge badge-success">Active</span>
                                    </a>
                                    @else
                                    <a href="{{route('admin.category.status.change', ['id' => $category->id, 'status' => '0'])}}">
                                        <span class="badge badge-danger">Inactive</span>
                                    </a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('admin.catrgory.edit', $category->id)}}" class="action-icon">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                    <form action="{{route('admin.category.delete',  $category->id)}}" method="POST" style="display: inline;">
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