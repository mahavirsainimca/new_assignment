@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Category List</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                    <div class="state-information d-none d-sm-block">
                        <div class="text-center">
                            <a class="btn btn-primary " href="{{ url('admin/category/create') }}">Add</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Parent Category</th>
                                    <th>Title</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($allCategories as $key)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $key->parent!='' ? $key->parent : 'Root' }}</td>
                                        <td>{{ $key->title }}</td>
                                        <td>
                                            <a href="{{ url('admin/category/destroy/'.$key->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Want to Delete This')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
