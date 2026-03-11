<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.8)),url("{{ asset('images/bg2.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #header{
            position: absolute;
            width: 100%;
            height: 9%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(214, 140, 3);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-light">
<div class="container-fluid " id="header">
    <h2 class="text-white">Welcome Back</h2>
</div>
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                
                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <h2 class="text-center mb-4 text-warning">Login</h2>

                        <form method="POST" action="{{ route('login.route') }}">
                            @csrf
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>
{{-- 
                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div> --}}

                            <!-- Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning">
                                    Login
                                </button>
                            </div>
                        </form>

                        {{-- <div class="text-center mt-3">
                            <small>
                                Don’t have an account?
                                <a href="#">Register</a>
                            </small>
                        </div> --}}

                        @if($errors->any())
                            <ul class="bg-white">
                                @foreach ($errors->all() as $error)
                                <li class="text-danger">{{$error}} </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid fixed-bottom" style="font-size:0.7rem;">
        <p class="text-white text-center">Developed by &copy; {{ date('Y') }} DizyTech Systems. All rights reserved.</p>
    </div>
    <!-- Bootstrap JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>