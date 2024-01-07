<!doctype html>
<html lang="en">
  <head>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            <li><a href="/pengunjung" class="nav-link px-4" onMouseOver="this.style.color='grey'" onMouseOut="this.style.color='white'" style="color: white; text-decoration: underline; font-weight: bold;">Registration</a></li>
            @if(Auth::check())
            <li><a href="/validateCode" class="nav-link px-4" @if(!Auth::check()) onMouseOver="this.style.color='grey'" @endif  @if(Auth::check()) onMouseOut="this.style.color='grey'" @endif style="color: grey; text-decoration: underline; font-weight: bold;">Check-In</a></li>
            @endif
          </ul>
        @if(Auth::check())
        <div class="col-md-3 px-3 text-end">
          {{-- <form action="/logout" method="POST">
            @csrf --}}
            <a href="/logout" class="btn btn-outline-primary me-2 bg-white" style="color: black; border-color: black;">Logout</a>
        {{-- </form> --}}
            {{-- <button type="button" class="btn btn-outline-primary me-2 bg-white" style="color: black; border-color: black;">Logout</button> --}}
        </div>
        @else
        <div class="col-md-3 px-3 text-end">
          <button type="button" class="btn btn-outline-primary me-2 bg-white" style="color: black; border-color: black;">Login</button>
      </div>
        @endif
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
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script> 
    let isScanned = false;
    let html5QrcodeScanner;
    $('#exampleModal').on('show.bs.modal', function (event) {

        let html5QrcodeScanner = new Html5QrcodeScanner(
          "reader",
          { fps: 10, qrbox: {width: 250, height: 250} },
          /* verbose= */ false);
          
        html5QrcodeScanner.render(onScanSuccess);
    
        function onScanSuccess(decodedText, decodedResult) {
          // handle the scanned code as you like, for example:
          if (!isScanned) {
            isScanned = true; 
            $('#booking_code').val(decodedText);
            document.forms[0].submit();
          }
        }

        $('#exampleModal').on('hidden.bs.modal', function (event) {
    // Menghentikan pemindaian QR code
    if (html5QrcodeScanner) {
        html5QrcodeScanner.clear(); // Membersihkan layar scanner
        // html5QrcodeScanner.stop(); // Menghentikan pemindaian
        // isScanned = false; // Setel ulang status pemindaian
    }
});

    });
  
    </script>

      </body>
    </html>