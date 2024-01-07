@extends('layouts.navbar_dashboard')

    @section('content')
@php
    $start_time = $reservasi_group->reservation_session->start_time;
    $end_time = $reservasi_group->reservation_session->end_time;
    $start_time = substr($start_time, 0, 5);
    $end_time = substr($end_time, 0, 5);
@endphp

        <div class="inner-content-tabbing-visitordetail mb-3">
            <div class="mt-3">
                <div class="px-4 py-1">
                    <h2 class="" style="float: left;">Registration Code : <span style="color: red;">{{ $reservasi_group->group_code }}</span> </h2>
                    <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-lg" type="button"  data-bs-toggle="modal" data-bs-target="#qrcode" id="submit-reservation" style="background-color: #00659E; color: white; font-weight: bold; float: right;">QR</button>
                </div>
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
                                        <label for="booking-person-name" class="form-label text-semibold">PIC Group Name</label>
                                        <p>{{ $reservasi_group->pic_name }}</p>
                                    </div>
                                </div>
                            </div>                     
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="">
                                        <label for="group-name" class="form-label text-semibold">Group Name</label>
                                        <p>{{ $reservasi_group->nama_group }}</p>                                  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="">
                                        <label for="total-visitor" class="form-label text-semibold">Total Visitor</label>
                                        <p>{{ $reservasi_group->total_member}}</p>          
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="">
                                        <label for="phone-number" class="form-label text-semibold">Phone Number</label>
                                        <p>{{ $reservasi_group->no_telp }}</p>
                                    </div>
                                </div>
                            </div> 
    
    
                            <HR></HR>
                            
                            
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <div class="">
                                        <label for="arrival-date" class="form-label text-semibold">Arrival Date:</label>
                                        <P>{{ $reservasi_group->tanggal }}</P>                         
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <div class="px-5">
                                    <label for="session" class="form-label text-semibold">Session</label>
                                    <p>{{ $reservasi_group->reservation_session->session_name }}</p>
                                </div>                       
                            </div>       
                            
                            
                            <div class="col-md-2 mb-3 ">
                                <div class="flex-between w-100" style="display: flex; justify-content: flex-end;">
                                    <label for="start-visitor" class="form-label text-semibold">Start:</label>
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
                                    <label for="start-visitor" class="form-label text-semibold">End:</label>
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

{{-- modal --}}
<div class="modal fade" id="qrcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">QR CODE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="d-flex justify-content-center align-items-center">
            {!! QrCode::size(350)->generate( $reservasi_group->group_code) !!}
          </div>

    </div>
</div>
</div>
</div>

@endsection