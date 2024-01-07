<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  </head>
  <body>
    <div class="container rounded-4" style="background-color: #296BA9;">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0 px-5">
          <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
              <img src="https://drive.google.com/uc?export=view&id=1HN1WxsHtxIP0LUSI9_h35PiUGntddTlM" width="100" height="72"/>
          </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="" class="nav-link px-2" onMouseOver="this.style.color='grey'" style="color: grey; text-decoration: underline;">Registration</a></li>
          @if(Auth::check())<li><a href="/validateCode" class="nav-link px-4" onMouseOver="this.style.color='grey'" onMouseOut="this.style.color='white'" style="color: white; text-decoration: underline; font-weight: bold;">Check-In</a></li>@endif
        </ul>
      
{{-- <form action="/login" method="get"> --}}
      <div class="col-md-3 px-3 text-end">
        @if(Auth::check())
        <a href="/logout" class="btn btn-outline-primary me-2 bg-white" style="color: black; border-color: black;">logout</a>
        @else
        <a href="/login" class="btn btn-outline-primary me-2 bg-white" style="color: black; border-color: black;">Login</a>
        @endif
      </div>
{{-- </form> --}}
      </header>
  </div>

    <div class="container">

      @include('komponen.pesan')

      @yield('content')

    </div>

      <div class="footer-company">
          <div class="px-5 py-3" style="background-color: #296BA9;">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="my-3">
                            <img src="https://drive.google.com/uc?export=view&id=1HN1WxsHtxIP0LUSI9_h35PiUGntddTlM" width="350" height="250"/>
                          </div>
                      </div>
                      <div class="col pt-5"> 
                        <h2 style="color: white;">Location :</h2>
                        <p style="font-size: 20px; color: black; margin-bottom: 0; font-weight: bold;">
                          Jalan Trans Heksa No. 01 Kawasan Industri KJIR, Margamulya, Karawang, Jawa Barat 41361
                        </p>
                        <p style="font-size: 20px; color: black; margin-bottom: 0; font-weight: bold;">
                          Phone: 08111099382
                        </p>
                      </div>
                  </div>
                </div>
                <div class="bg-black text-center">
                  <p style="color: white;">
                    Copyright © 2023 PT Toyota Motor Manufacturing Indonesia. All Rights Reserved.
                  </p>
                </div>
      </div>
      @livewireScripts
      </body>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </html>