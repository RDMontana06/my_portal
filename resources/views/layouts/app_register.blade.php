<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Portal Registration</title>
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('register_assets/css/css-wizard.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  
  
</head>
	<body>
        @yield('content')
		<!-- Javascript -->
        <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('register_assets/js/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('register_assets/js/js-wizard.js') }}"></script>
        <script src="{{ asset ("plugins/sweetalert2/sweetalert2.all.js") }}" type="text/javascript"></script>
        <script src="{{ asset("dist/js/adminlte.js") }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        
        
</body>
    <script>
        
        $(document).ready(function() {
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
           $('.toastrDefaultError').trigger('click');
        });
      
      </script>
</html>