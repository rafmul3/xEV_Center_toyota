@extends('layouts.navbar_dashboard')

    @section('content')
        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex align-items-center" style="background-color: #C3C3C3;">
                            <h1 style="font-weight: bold;">New User</h1>
                        </div>
                    </div>
                </div>
<form action="/userRoleCreate/Store" method="post">
    @csrf
                <div class="col-md-12 mt-5">
                    <div class="card" style="background-color: #C3C3C3;">
                            <div class="card-body mt-2 mx-3">
                                <h3>Username <i class="fa-solid fa-star-of-life fa-2xs"  style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="card-body mx-2">
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Sesi Misal : Sesi 1" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="card-body mt-2 mx-3">
                                <h3>Password <i class="fa-solid fa-star-of-life fa-2xs" style="color: #FF0000;"></i></h3>
                            </div>
                            <div class="card-body mx-2">
                                <input type="text" name="password" class="form-control" placeholder="Masukkan Nama Sesi Misal : Sesi 1" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="px-4 mb-3 mt-3">
                                <a class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm" href="/userRole" id="submit-reservation" style="background-color: #ACBCB0; color: black; font-weight: bold; float: left;">Back</a>
                                <button class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #00CE2D; color: white; font-weight: bold; float: right;">Save</button>
                            </div>
                    </div>
                </div>
</form>

            </div>
        </div>

@endsection