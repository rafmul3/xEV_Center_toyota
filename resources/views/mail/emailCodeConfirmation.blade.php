<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>visitor_detail_user</title>
      </head>
  </head>
  <body>
    <div class="">
        <div class="">
                <h1 class="">Confirmation Email Code</h1>
        </div>
        <div class="">
            <hr class="">
        </div>
        <div class="">
            <div class="">
                <div class="">
                  
                    <p>Thank you for using our service, please bring your email and give the QR to the staff</p>
                    <center>
                      
                    <img src="{{$message->embed(public_path().'/'.$group_code['code'].'.png')}}" style="width: 250px; height: 250px;"> 
                    
                        <br> <h3>your booking code :</h3><h3>{{ $group_code['code'] }}</h3></p></center>  
                        <br>
                        <center>
                        <form action='http://127.0.0.1:8000/email/deleted/{{ $group_code['code'] }}/{{ $group_code['codeHash'] }}' method='get'>
                          @csrf
                        <div class="">
                          <div class="">
                              <button class="" type="submit" id="submit-reservation" style="background-color: #EE0909; color: white; font-weight: bold;">Cancel Booking</button>
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