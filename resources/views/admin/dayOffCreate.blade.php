@extends('layouts.navbar_dashboard')

    @section('content')

        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex align-items-center" style="background-color: #C3C3C3;">
                            <h1 style="font-weight: bold;">Reservation Day Off</h1>
                        </div>
                    </div>
                </div>
                <form action="/setting/dayOff/Store" method="post">
                    @csrf
                <div class="col-md-12 mt-5">
                    <div class="card" style="background-color: #C3C3C3;">
                            <div class="card-body mt-2 mx-3">
                                <h3>Day Disable <i class="fa-solid fa-star-of-life fa-2xs" style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="input-group flex-nowrap mt-2 mx-4 mb-2">
                                <span class="input-group-text" style="font-weight: bold;" id="addon-wrapping">X</span>
                                <input id="tanggal" readonly="readonly" name="date" class="form-control" style="margin-right: 50px;" placeholder="YYYY/MM/DD" aria-label="Username" aria-describedby="addon-wrapping" required> 
                            </div>
                            <div class="card-body mt-2 mx-3">
                                <h3>Status Day <i class="fa-solid fa-star-of-life fa-2xs" style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="card-body mx-2">
                                <input type="text" name="status_day" class="form-control" placeholder="Masukkan Status Misal : Hari Kemerdekaan" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="px-4 mb-3 mt-3">
                                <a class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm" href="/setting/dayOff" id="submit-reservation" style="background-color: #ACBCB0; color: black; font-weight: bold; float: left;">Back</a>
                                <button class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #00CE2D; color: white; font-weight: bold; float: right;">Save & Update</button>
                            </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
        <script>
           console.log('berhasil')

            $( function() {
                var today = new Date();
    $("#tanggal").datepicker({
        minDate: today,
        dateFormat: "yy-mm-dd"
    });
            });

        </script>
@endsection