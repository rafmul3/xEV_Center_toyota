@extends('layouts.navbar_admin')

@section('content')
        
@if (session('message'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <form action="/ConfirmationCode" method="post">
            @csrf
            {{-- <input type="hidden" name="booking_code" id="booking_code"> --}}

      <div class="inner-content-tabbing-visitordetail my-3 py-3">
        <div class="col-md-12">
            <h1 class="mx-5 mb-3 d-block">
                Check in Arrival to xEV Center
            </h1>
        </div>

        <div class="col-md-12">
            <hr class="mx-5 mb-3 d-block" />
        </div>

        <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <h6 for="Email" class="form-label text-semibold mx-auto">
                Registration Code
            </h6>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12 mb-3 ">
            <div class="col-md-6 mb-3 input-group">
                <input
                    name="booking_code"
                    placeholder="Code Booking"
                    type="code"
                    class="form-control"
                    id="booking_code"
                />
                <div class="input-group-append">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="input-group-text p-3">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                </div>
            </div>
        </div>
        </div>

        <div class="flex-between w-100 mb-4 submit-booking-code">
            <div class="flex-end w-100 px-4 py-1">
                <button
                    class="btn btn-primary flex-center py-1 px-4 border-radius-8 mx-3 btn-lg"
                    type="submit"
                    id="submit-reservation"
                    style="
                        background-color: #008db9;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Submit
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Getting Camera</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        <div class="mx-auto" style="width:400px; height:400px">
            <div id="reader" width="200px"></div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
        </form>

@endsection