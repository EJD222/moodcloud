
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="public/favicon.ico">
    <title>Mood Cloud</title>

    <!-- Vendor css -->
    <link rel="stylesheet" href="{{ url('frontend/css/materialdesignicons.min.css') }}">

    <!-- Base css with customised bootstrap included -->
    <link rel="stylesheet" href="{{ url('frontend/css/miri-ui-kit-free.css') }}">

    <!-- Stylesheet for demo page specific css -->
    <link rel="stylesheet" href="{{ url('frontend/css/demo.css') }}">

</head>

<body>
    @include('partials.header')
    @include('partials.how-it-works')
    @include('partials.footer')

    <script src="{{url('frontend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('frontend/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('frontend/js/bootstrap.min.js"')}}"></script>
    <script src="{{url('frontend/js/miri-ui-kit.js')}}"></script>
    <script src="{{url('frontend/script.js')}}"></script>


</body>

</html>