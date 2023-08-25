@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Welcome to {{ config('app.name') }} Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
@endsection
@section('script')
		<!--Morris Chart-->
        <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>
		<script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
@endsection
