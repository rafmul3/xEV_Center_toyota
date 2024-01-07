@extends('layouts.navbar')

@section('content')
@php
    $start_time = $reservation_group->reservation_session->start_time;
    $end_time = $reservation_group->reservation_session->end_time;
    $start_time = substr($start_time, 0, 5);
    $end_time = substr($end_time, 0, 5);
@endphp

@if (session('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="inner-content-tabbing-visitordetail my-3 py-3">
        <div class="mx-5 mb-4 d-block">

            <h2 class="mx-5 mb-4 d-block">Confirmation Reservation</h2>

        </div>

        <div class="box-reservation-xev my-3 py-5">
            <div class="card border-radius-8 p-5 mx-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h1 class="mb-4 d-block">Person In Charge</h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-form-date">
                                    <label for="booking-person-name" class="form-label text-semibold"> <b>PIC Group Name :</b> </label>
                                    <p>{{ $reservation_group->pic_name }}</p>
                                </div>
                            </div>
                        </div>                     
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="group-name" class="form-label text-semibold"><b>Group Name :</b></label>
                                    <p>{{ $reservation_group->nama_group }}</p>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="total-visitor" class="form-label text-semibold"><b>Total Visitor :</b></label>
                                    <p>{{ $reservation_group->total_member }}</p>          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="phone-number" class="form-label text-semibold"><b>Phone Number :</b></label>
                                    <p>{{ $reservation_group->no_telp }} </p>
                                </div>
                            </div>
                        </div> 


                        <HR></HR>
                        
                        
                        <div class="col-md-7">
                            <div class="mb-3">
                                <div class="">
                                    <label for="arrival-date" class="form-label text-semibold"><b>Arrival Date :</b></label>
                                    <P> {{ $reservation_group->tanggal }} </P>                         
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="px-5">
                                <label for="session" class="form-label text-semibold"><b>Session :</b></label>
                                <p>{{ $reservation_group->reservation_session->session_name }}</p>
                            </div>                       
                        </div>       
                        
                        <div class="col-md-2 mb-3 ">
                            <div class="flex-between w-100" style="display: flex; justify-content: flex-end;">
                                <label for="start-visitor" class="form-label text-semibold"><b>Start :</b></label>
                            </div>
                            <div class="col text-md-end">
                                <p class="mb-0">{{ $start_time }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-8 mb-3 ">
                            <div class="flex-between w-100">
                                <hr>
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
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
                            @foreach($reservation_group->group_member as $member)
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
        
        <div class="col-md-12">
            <div class="mb-3">
                <h1 class="mx-5 mb-4 d-block">Confirmation Email</h1>
            </div>
        </div>
        <form action='/email/{{ $cryptCode }}}' method='GET'>
            @csrf

        <div class="col-md-6">
            <div class="mb-3 px-5">
                <div class="">
                    <h4 for="Email" class="form-label text-semibold">Please re-enter your email to get the booking code.</h4>
                        <input name="email" placeholder="email" required="required" type="email" class="form-control " id="Email">
                </div>
            </div>
        </div>

        
        <div class="flex-between w-100 mb-4 submit-reservation-xev">
            <div class="flex-end w-100 px-4 py-1">
                <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 mx-3 btn-lg" type="submit" id="submit-reservation" style="background-color: #008DB9; color: white; font-weight: bold; float: right;">Submit</button>
                <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-lg" type="submit" id="submit-reservation" style="background-color: #EE0909; color: white; font-weight: bold; float: right;">Back</button>
            </div>
        </div>

    </form>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @endsection