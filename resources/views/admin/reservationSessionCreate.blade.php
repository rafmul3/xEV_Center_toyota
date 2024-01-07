@extends('layouts.navbar_dashboard')

    @section('content')

        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex align-items-center" style="background-color: #C3C3C3;">
                            <h1 style="font-weight: bold;">Reservation Session</h1>
                        </div>
                    </div>
                </div>

                <form action="/setting/reservationSession/createNew" method="post">
                <div class="col-md-12 mt-5">
                    <div class="card" style="background-color: #C3C3C3;">
                            @csrf
                            <div class="card-body mt-2 mx-3">
                                <h3>Session Name <i class="fa-solid fa-star-of-life fa-2xs" style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="card-body mx-2">
                                <input type="text" name="session_name" class="form-control" required placeholder="Masukkan Nama Sesi Misal : Sesi 1" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="card-body mt-2 mx-3">
                                <h3>Start Time <i class="fa-solid fa-star-of-life fa-2xs" style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="input-group flex-nowrap mt-2 mx-4 mb-2">
                                <span class="input-group-text" style="font-weight: bold;" id="addon-wrapping">X</span>
                                <input type="text" name="start_time" class="form-control" required style="margin-right: 50px;" placeholder="09:00 AM" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="card-body mt-2 mx-3">
                                <h3>End Time <i class="fa-solid fa-star-of-life fa-2xs"  style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="input-group flex-nowrap mt-2 mx-4 mb-2">
                                <span class="input-group-text" style="font-weight: bold;" id="addon-wrapping">X</span>
                                <input type="text" name="end_time" class="form-control" required style="margin-right: 50px;" placeholder="11:00 AM" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="px-4 mb-3 mt-3">
                                <a class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm" href="/setting/reservationSession" id="submit-reservation" style="background-color: #ACBCB0; color: black; font-weight: bold; float: left;">Back</a>
                                <button class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #00CE2D; color: white; font-weight: bold; float: right;">Save & Update</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
            
        @endsection