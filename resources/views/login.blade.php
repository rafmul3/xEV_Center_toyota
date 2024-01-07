<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
  </head>
  <body>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-7 col-lg-7 d-md-block" style="min-height:100vh; background-color: #1076A1;">
      <div class="h-100 d-flex align-items-center justify-content-center">
        <img alt="failed to upload" src="https://drive.google.com/uc?export=view&id=1HN1WxsHtxIP0LUSI9_h35PiUGntddTlM" width="45%" height="45%"/>
      </div>
    </nav>

    <main class="col ms-sm-auto px-md-5">
      <div class="h-100 d-flex align-items-center">
        <form class="w-100" action="/login" method="POST">
            @csrf
              <div class="m-4">
                <input type="name" class="form-control " id="name" placeholder="Email" name = "name" required autofocus value={{ old('name') }}>
              </div>
              
              <div class="m-4 d-flex">
                <input type="password" class="form-control " id="password" placeholder="Password" name = "password">
              </div>
              <div class="m-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-dark d-grid gap-2 col-5 mb-3 rounded-pill ml-auto" name = "login">LOGIN</button>
              </div>
            </form>
      </div>
    </main>
      
        {{-- <div class="m-auto" > 
          
              </div>   --}}
      
</div>
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>