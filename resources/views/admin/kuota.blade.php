@extends('layouts.navbar_dashboard')

    @section('content')
        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex align-items-center" style="background-color: #C3C3C3;">
                            <h2 style="font-weight: bold;">Setting</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="card" style="background-color: #C3C3C3;">
                            <div class="card-body mt-2 mx-3">
                                <h3>Quota <i class="fa-solid fa-star-of-life fa-2xs" style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="card-body mx-3">
                                <input type="text" class="form-control" placeholder="Masukkan Jumlah Quota Misal : 20" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="px-4 mb-3 mt-3">
                                <button class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #ACBCB0; color: black; font-weight: bold; float: left;">Back</button>
                                <button class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #00CE2D; color: white; font-weight: bold; float: right;">Save & Update</button>
                            </div>
                    </div>
                </div>

            </div>
        </div>
        @endsection