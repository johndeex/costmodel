
<div class="container-fluid rounded-2" id="header">
    <div class="container flex">
       <button><a class="btn  btn-sm text-dark font-extrabold  border" href="{{ route('home.show') }}">
      <i class="bi bi-house-door"></i> Home</a></button>
      <button><a class="btn  btn-sm text-dark font-extrabold border" href="{{ route('projects.index') }}">
       Projects</a></button>
      <button><a class="btn  btn-sm text-dark font-extrabold  border" href="{{ route('report.home') }}">
       Reports</a></button>
    </div>
    
    <form action="{{ route('logout') }}" method="post" >
        @csrf
        <button type="submit" class="text-danger btn btn-sm btn-light "><i class="bi bi-box-arrow-in-right"></i>
        Logout</button>
    </form>
</div>
