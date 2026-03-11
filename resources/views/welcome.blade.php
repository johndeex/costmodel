<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Projects</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
        body{
            background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.8)),url("{{ asset('images/bg2.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #logo {
        max-height: 150px;          
        width: auto;                
        height: auto;               
        position: absolute;
        top: 2%;
        left: -2%;
        border-radius: 50%;         
        padding: 5px;                
      }
    </style>
</head>
<body>
<img id="logo" src="{{ asset('images/logo.png') }}" alt="">
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
      <a href="{{ route('projects.create') }}" class="btn btn-warning m-2">
        +Create Project
      </a>
      <a href="{{ route('projects.index') }}" class="btn btn-success m-2">
         View Projects
      </a>
    </div>
  </div>

  <!-- Bootstrap JS Bundle (for components if needed) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>