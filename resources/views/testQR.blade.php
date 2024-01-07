
<!doctype html>
<html lang="en">
    <head>  
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script type="text/javascript" src="instascan.min.js"></script>
    </head>

    <body> 
      {!! QrCode::size(200)->generate('Contoh teks untuk QR Code') !!}
      {{-- <div width="200px">
        <div id="reader" width="200px"></div>
      </div> --}}


        
    </body>

    <script> 
function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
//   console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>

       </html>
