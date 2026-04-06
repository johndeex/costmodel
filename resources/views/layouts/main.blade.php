<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Bill-Ease')</title>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    body {
      min-height: 100dvh;
      overflow-x: hidden;
      background: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .sidebar .brand {
      background-color: #1537cd; /* darker variant of #081357 */
      padding: 1rem;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar {
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      background-color: #d38c10;
      padding-top: 1rem;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
    }

    .sidebar .brand {
      text-align: center;
      margin-bottom: 2rem;
    }

    .sidebar .brand h2 {
      color: #fff;
      font-size: 1.6rem;
      margin-bottom: 0;
    }

    .sidebar a {
      color: #fff;
      padding: 5px 20px;
      margin: 0.25rem 1rem;
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      border-radius: 8px;
      transition: 0.2s ease;
    }

    

    .content {
      margin-left: 220px;
      padding: 2rem;
    }
    #header{
      position: fixed;
      left: 250px;
      top: -23px;
      height: 50px;
      background: #d38c10;
      display: flex;
      flex-direction: column
      align-items: center;
      width: 1100px;
    }
    .nav-link {
    color: white;
    display: block;
    padding: 8px 12px;
    border-radius: 4px;
    text-decoration: none;
    width: 175px;
    }


    .nav-link:hover {
      background-color: #fff;
      color: #000;
    }

    .modal-dialog-top-right {
    position: fixed;
    top: 1rem;
    right: 1rem;
    margin: 0;
    max-width: 350px;
    }


    .nav-link.active {
      background-color: white;
      color: black !important;
    }

  
  </style>
</head>

<body>
  <!-- Sidebar -->
   <div class="sidebar">
       <div class="top">
          <div class="container">
              <h3 class="text-white mx-4" style="gap: 5px; display: flex;">
                  <i class="bi bi-currency-exchange"></i></i>Bill-Ease
              </h3>
          </div>
         <div class="container mt-4">
            <div class="row">
                <a href="/home" class="nav-link">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
                <a href="/projects" class="nav-link d-flex align-items-center gap-2">
                      <i class="bi bi-list-task"></i>
                  Projects
              </a>
               <a href="{{ route('projects.create') }}" class="nav-link d-flex align-items-center gap-2">
                  <span class="position-relative">
                      <i class="bi bi-building-fill-add"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                      </span>
                  </span>
                  Create-Project
              </a>

                <a href="/action" class="nav-link">
                    <i class="bi bi-receipt"></i> Quotations
                </a>
                <a href="/action" class="nav-link">
                    <i class="bi bi-receipt-cutoff"></i> Invoices
                </a>
                 <a href="/action" class="nav-link">
                    <i class="bi bi-robot"></i>A I Analysis
                </a>
                <a href="/report_home" class="nav-link">
                    <i class="bi bi-journal-richtext"></i> Reports
                </a>  
            
            </div>

          </div>
          <div class="row mt-5  bottom-0">
            <a href="/settings" class="nav-link">
              <i class="bi bi-gear-fill"></i> Settings
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mx-4">
            @csrf
            <button type="submit" class="text-danger btn"> <i class="bi bi-box-arrow-left  "></i> Logout</button>
            </form>

          </div>
        </div>
    </div>
    {{-- header for the whole system --}}
    <div class="container  justify-content-between mt-4 fixed  z-10 " id="header">
     <h4 class="text-white mx-5 mt-2">@yield('page_title', 'Dashboard')</h4>

      <div class="row mt-3 mx-2">
        <div class="col">
          <a href="/nortification">
             <span class="position-relative">
              <i class="bi bi-bell fs-5 text-white"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                
              </span>
            </span>
          </a>

        </div>
          
        <div class="col">
            <h4 data-bs-toggle="modal" data-bs-target="#user_details"><i class="bi bi-person text-white"></i></h4>
        </div>
      </div>
    </div>
    {{-- modal for user detils --}}
    <div class="modal fade" id="user_details" tabindex="-1">
  <div class="modal-dialog modal-dialog-top-right">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white mx-3">Logged in User</h5>
        <button type="button" class="btn-close mx-1 bg-white" data-bs-dismiss="modal" 
        style="height: 10px; width: 10px;"></button>
      </div>
      <div class="modal-body">
       <div class="cont d-flex align-items-center gap-2">
          <i class="bi bi-person text-black" style="font-size: 1.2rem"></i>
          <h5 class="mt-2">{{ Auth()->user()->user_name }}</h5>
       </div>
      </div>
    </div>
  </div>
</div>

  <!-- Main Content -->
  <div class="content">
    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Highlight the current page link
    const links = document.querySelectorAll('.sidebar a');
    links.forEach(link => {
      if (link.href === window.location.href) {
        link.classList.add('active');
      }
    });
  </script>
  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  {{-- The script to acept mutliple charts --}}
  @stack('scripts')
</body>
</html>
