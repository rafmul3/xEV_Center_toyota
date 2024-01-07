<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>visitor_detail_user</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script type="text/javascript" src="instascan.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  </head>
  <body>
    <div class="inner-content-tabbing-visitordetail my-3 py-3">
        <div class="col-md-12">
                <h1 class="mx-5 mb-3 d-block">Confirmation Email Code</h1>
        </div>
        <div class="col-md-12">
            <hr class="mx-5 mb-3 d-block">
        </div>
        <div class="col-md-9">
            <div class="mb-3 px-5">
                <div class="">
                    <p>Thank you for Coming, please let me know your feeling about us.

                    <br> 
                    <br>
                    <center>
                        <form action='http://127.0.0.1:8000/feedbackPengunjung/{{ $email['cryptID'] }}' method='get'>
                          @csrf
                        <div class="">
                          <div class="">
                              <button class="" type="submit" id="submit-reservation" style="background-color:blue; color: white; font-weight: bold;">Form Feedback</button>
                          </div>
                      </div>
                    </form>
                        </center>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>