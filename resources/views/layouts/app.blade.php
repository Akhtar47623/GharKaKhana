<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
         background-image: url('{{ asset("assets/imgs/background.png") }}');
        background-attachment: fixed;
        min-height: 100vh;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        /* .form-control:focus {
            box-shadow: 0 0 10px #4B49AC;
            border-color: #4B49AC;
            
        } */
        /* .btn-primary {
            background-color: #4B49AC;
            border: none;
        } */
        /* .btn-primary:hover {
            background-color: #4B49AC;
        } */
    </style>
    @stack('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('js')
</body>
</html>
