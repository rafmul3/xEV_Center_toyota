<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Profile | {{ auth()->user()->nama}}</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
   
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
<header class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0 shadow">
        
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img
    src="https://drive.google.com/uc?export=view&id=1HN1WxsHtxIP0LUSI9_h35PiUGntddTlM"
    alt="Logo"
/></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pt-0 pt-md-5">
      <div class="position-sticky pt-md-4">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/profile/{{ auth()->user()->nama}}eed">
              <span data-feather="home"></span>
              Data Visitor
            </a>
            <li class="nav-item">
              <a class="nav-link" href="/profile/{{ auth()->user()->nama}}/edit">
                <span data-feather="user"></span>
                Registration
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile/menu">
              <span data-feather="shopping-cart"></span>
              Check In
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile/customer">
              <span data-feather="users"></span>
              Feedback
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile/review">
              <span data-feather="eye"></span>
              Setting 
            </a>
          </li>
        </ul>

    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> -->
    @extends('layouts.navbar_dashboard')

    @section('content')
        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex align-items-center" style="background-color: #C3C3C3;">
                            <h1 style="font-weight: bold;">Setting</h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="card" style="background-color: #C3C3C3;">
                            <div class="card-body border-radius-8 mt-2 mx-3">
                                <h3>Allow Days <i class="fa-solid fa-star-of-life fa-2xs " style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="card-body mx-3">
                                <input type="text" class="form-control" placeholder="Masukkan Hari Misal : Kamis, Jumat" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="px-4 mb-3 mt-3">
                                <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #ACBCB0; color: black; font-weight: bold; float: left;">Back</button>
                                <button class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #00CE2D; color: white; font-weight: bold; float: right;">Save & Update</button>
                            </div>
                    </div>
                </div>

            </div>
        </div>
        @endsection
            
    <!-- </main>
</div>
</div>
      
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      
      <script src="/js/dashboard.js"> </script> 
    </body>
</html> -->