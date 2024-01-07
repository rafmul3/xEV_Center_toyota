<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>visitor_detail_user</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  </head>
  <body>
    <div class="inner-content-tabbing-visitordetail my-3 py-3">
        <div class="mx-5 mb-3">
            <h1 class="d-block">Check in Arrival to xEV Center</h1>
            <div class="col-md-12">
                <hr class="mx-5 mb-3 d-block">
            </div>
    
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mt-4 mb-3">
                            <label for="arrival-date" class="form-label text-semibold">Arrival Date:</label>
                            <P>{{ $reservasi_group->tanggal }}</P>                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-4 mb-3">
                            <label for="group-name" class="form-label text-semibold">Group Name</label>
                            <p>{{ $reservasi_group->nama_group }}</p>                                  
                    </div>
                </div>
            </div>
            
            @livewire('confirmasi-kehadiran', ['reservasi_group' => $reservasi_group])
            @stack('scripts')
            
        </div>
    </div>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @livewireScripts
  </body>
</html>