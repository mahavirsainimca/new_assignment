@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Category</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                    <div class="state-information d-none d-sm-block">
                        <div class="text-center">
                            <a class="btn btn-primary " href="{{ url('category/listing') }}">Back</a>
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
                        <form name="permissions" action={{ url('admin/category/store') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-2 col-form-label">Parent Category</label>
                            <div class="col-sm-10">
                                <select  class="form-control" name="parent_id">
                                    <option value="0">Root</option>
                                    @foreach ($category as $c)
                                            <option value="{{$c->id}}">-{{$c->title}}</option>
                                        @if(count($c->childs))
                                            @include('admin.category.manageChild',['childs' => $c->childs])
                                        @endif
                                        {{-- <option value="{{$c->id}}">{{$c->title}}</option> --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{old('title')}}" autocomplete="off" required>
                                @error('title')
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success btn-lg">Submit</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
@endsection
