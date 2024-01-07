<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>visitor_detail_user</title>
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
<form action='/email/confirmationCode/{{ $group_code }}' method='post'>
        <div class="col-md-9">
            <div class="mb-3 px-5">
                <div class="">
                    <p>We already sent confirmation code to your email: {{ $reservasi_group->email }}
                    <br> Please check your inbox or spam folder</p>
                        @csrf
                    <h6 for="code" class="form-label text-semibold">Input Your Code Here
                    </h6>
                        <input name="code" placeholder="code" required="required" type="number" class="form-control " id="code">
                </div>
            </div>
        </div>

        <div class="flex-between w-100 mb-4 submit-reservation-xev">
            <div class="flex-end w-100 px-4 py-1">
                <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 mx-3 btn-lg" type="submit" id="submit-reservation" style="background-color: #008DB9; color: white; font-weight: bold; float: right;">Submit</button>
                {{-- <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-lg" type="submit" id="submit-reservation" style="background-color: #EE0909; color: white; font-weight: bold; float: right;">Back</button> --}}
            </div>
        </div>
        
    </div>

</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>