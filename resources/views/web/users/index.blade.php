@extends('web.layout.master')
@section('content')

<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder"> Welcome to user dashboard!</h1>
    </div>
</header>
<!-- About section-->
<section id="about">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>About this page</h2>
                <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
                <ul>
                    <li>Clickable nav links that smooth scroll to page sections</li>
                    <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                    <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
                    <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
