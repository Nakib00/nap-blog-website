<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nap Blog</title>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}"> <!-- https://fontawesome.com/ -->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap')}}" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/templatemo-xtra-blog.css')}}" rel="stylesheet">

</head>
<!-- Include Header file  -->
@include('include.header')

<body>

    <div class="container-fluid">
        <main class="tm-main">
            <!-- Include search -->
            @include('include.search')

            <!-- Content add here -->
            @yield('content')

            <!-- Include footer section -->
            @include('include.footer')
        </main>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/templatemo-script.js')}}"></script>
</body>

</html>