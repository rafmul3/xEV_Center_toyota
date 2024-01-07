@php
    $start_time = $reservasi_group->reservation_session->start_time;
    $end_time = $reservasi_group->reservation_session->end_time;
    $start_time = substr($start_time, 0, 5);
    $end_time = substr($end_time, 0, 5);
@endphp

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>test</title>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">  
    </head>
  <body>
    
    <div class="inner-content-tabbing-visitordetail my-3 py-3">
        <div class="mx-5 mb-4 d-block">

            <h2 class="mx-5 mb-4 d-block">Confirmation Reservation</h2>

        </div>

        <div class="box-reservation-xev my-3 py-4">
            <div class="card border-radius-8 p-5 mx-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h1 class="mb-5 d-block">Person In Charge</h1>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-form-date">
                                    <label for="booking-person-name" class="form-label text-semibold"> <b>PIC Group Name :</b> </label>
                                    <p>{{ $reservasi_group->pic_name }}</p>
                                </div>
                            </div>
                        </div>                     
                        <div class="col-md-5">
                            <div class="mb-3">
                                <div class="">
                                    <label for="group-name" class="form-label text-semibold"><b>Group Name :</b></label>
                                    <p>{{ $reservasi_group->nama_group }}</p>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div class="">
                                    <label for="total-visitor" class="form-label text-semibold"><b>Total Visitor :</b></label>
                                    <p>{{ $reservasi_group->total_member }}</p>          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mt-3">
                                <div class="">
                                    <label for="phone-number" class="form-label text-semibold"><b>Phone Number :</b></label>
                                    <p>{{ $reservasi_group->no_telp }} </p>
                                </div>
                            </div>
                        </div> 


                        <HR></HR>
                        
                        
                        <div class="col-md-9">
                            <div class="mb-3">
                                <div class="">
                                    <label for="arrival-date" class="form-label text-semibold"><b>Arrival Date :</b></label>
                                    <P> {{ $reservasi_group->tanggal }} </P>                         
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="">
                                <label for="session" class="form-label text-semibold"><b>Session :</b></label>
                                <p>{{ $reservasi_group->reservation_session->session_name }}</p>
                            </div>                       
                        </div>       
                        
                        <div class="col-md-3 mb-3 mt-3">
                            <div class="flex-between w-100" style="display: flex; justify-content: flex-end;">
                                <label for="start-visitor" class="form-label text-semibold"><b>Start :</b></label>
                            </div>
                            <div class="col text-md-end">
                                <p class="mb-0">{{ $start_time }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3 mt-3">
                            <div class="flex-between w-100">
                                <hr>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 mt-3">
                            <div class="flex-between w-100">
                                <label for="start-visitor" class="form-label text-semibold"><b>End :</b></label>
                                <p>{{ $end_time }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>      
        <div class="box-reservation-xev my-3 py-5">
            <div class="card border-radius-8 p-5 mx-5">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <h1 class="mb-4 d-block">Visitor Detail</h1>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Job Title</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasi_group->group_member as $member)
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $member->pengunjung->visitor_name }}</td>
                              <td>{{ $member->pengunjung->gender }}</td>
                              <td>{{ $member->pengunjung->age }}</td>
                              <td>{{ $member->pengunjung->job_title }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
      
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}
  </body>
</html>