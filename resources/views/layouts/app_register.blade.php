<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="{{ asset('register_assets/bootstrap/css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('register_assets/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('register_assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
        <style>
        .logo-header, .text-header{
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        </style>
	</head>
	<body class="sb-nav-fixed">
    <div class="logo-header">
        <img src="{{URL::asset('/images/myPortal-logo.png')}}" width="300" alt="AVATAR">
    </div>
    <div class="text-header">
        <h1 class="display-6">Employee Registration</h1>
    </div>


    @yield('content')
		<!-- Javascript -->
        <script src="{{ asset('register_assets/js/wizard.js') }}"></script>
        <script src="{{ asset('register_assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="{{ asset ("plugins/sweetalert2/sweetalert2.all.js") }}" type="text/javascript"></script>

</body>
</html>