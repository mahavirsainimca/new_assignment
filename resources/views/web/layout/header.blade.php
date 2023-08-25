@php
    $customer = Auth::guard('customer')->user();
@endphp
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ url('/') }}"> {{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                @if(Auth::guard('customer')->user())
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"> Welcome : {{ $customer->name }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user-logout') }}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('user-login') }}" class="text-xl text-gray-700 underline"><b>User Login</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/login') }}" class="text-xl text-gray-700 underline"><b>Admin Login</b></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div style="text-align: center; margin-top:30px">{{$error}}</div>
    @endforeach
@endif

