<div>
    <form action='{{ url('pengunjung')}}' method='post'>
        @csrf
        <div class="box-reservation-xev my-3 py-5">
    
            <h2 class="mx-5 mb-4 d-block">Detail Reservasi</h2>
    
            <div class="card border-radius-8 p-5 mx-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="custom-form-date">
                                    <label for="arrival-date" class="form-label"><b>Arrival Date</b></label>
                                        <input wire:model="date" wire:ignore readonly="readonly" placeholder="DD/MM/YYYY" name="tanggal" value="" required="required" type="text" class="form-control " id="arrival-date">      
                                </div>
                            </div>
                        </div>                     
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="group-name" class="form-label text-semibold"><b>Group Name</b></label>
                                        <input name="nama_group" placeholder="Group Name" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\-\(\)\_\/\s]*" data-parsley-error-message="Format Is Invalid" required="required" type="text" class="form-control " id="group-name">                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="booking-person-name" class="form-label text-semibold"><b>PIC Group Name</b></label>
                                         <input name="pic_name" placeholder="Booking Person Name" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\-\(\)\_\/\s]*" data-parsley-error-message="Format Is Invalid" required="required" type="text" class="form-control " id="booking-person-name">          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="Email" class="form-label text-semibold"><b>Email</b></label>
                                        <input name="email" placeholder="email" required="required" type="email" class="form-control " id="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="phone-number" class="form-label text-semibold"><b>Phone Number</b></label>
                                                <input name="no_telp" data-parsley-pattern="[0-9\s\-\+\(\)]*" placeholder="+62 081XXXXXXXX" min="1" minlength="10" maxlength="13" required="required" type="text" class="form-control " id="phone-number">
                                    
                                </div>
                            </div>
                        </div>                   
                        <div class="col-md-8">
                            <div class="mb-3">
                                <div class="">
                                    <label for="address-person" class="form-label text-semibold"><b>Address</b></label>
                                        <input name="alamat" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\s]*" data-parsley-error-message="Format Is Invalid" placeholder="Address" required="required" type="text" class="form-control " id="address-person">                         
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="custom-form-session">
                                <label for="session" class="form-label text-semibold"><b>Choose Session</b></label>
                                <select name="reservation_sessions_id" wire:model="sessionselected" wire:ignore class="form-select select-session" id="session" required disabled>
                                    <option value="">Choose Session</option>
                                    @foreach($sessions as $session) 
                                    {
                                        <option value="{{ $session->id }}">
                                             {{ $session->session_name }} ( {{ $session->start_time }} - {{ $session->end_time }} )
                                        </option>                                      
                                    }
                                    @endforeach                                                                   
                                </select>
                            </div>                       
                        </div>                        
                        <div class="col-md-4 mb-3">
                            <div class="flex-between w-100">
                                <label for="total-visitor" class="form-label text-semibold"><b>Number Of Visitor</b></label>
                                <div class="quota-checking">
                                </div>
                            </div>
                            <select @if(!$kuotaDisabled)wire:model="pengunjung"@endif class="form-select total-visitor" name="total_visitor" id="total-visitor"@if($kuotaDisabled) disabled @endif required>
                                <option value="" readonly="" selected>Number Of Visitor</option>
                                
                                @for($i=1; $i < $kuota+1 ; $i++)   
                                <option value={{ $i }} readonly="">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>   

            <hr class="mx-4">     
    
<div class="visitor-list my-3 py-5" id="dynamic-visitor-list">
    <h2 class="mx-5 mb-4 d-block">Visitor List</h2> 
    <div class="visitor-list-default">
        
        @for($i=0; $i < $pengunjung ; $i++)   
        <div class="card p-5 border-radius-8 mx-4 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="">
                                <label for="list-visitor-name{{ $i }}" class="form-label text-semibold"><b>Name</b></label>
                                        <input name="visitor_name[]" placeholder="List Visitor Name" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\-\(\)\_\/\s]*" data-parsley-error-message="Format Is Invalid" required="required" type="text" class="form-control " id="list-visitor-name{{ $i }}">          
                            </div>
                        </div>
                    </div>
                      
                        <div class="col-md-3 mb-3">
                            <label for="gender{{ $i }}" class="form-label text-semibold"><b>Gender</b></label>
                            <select name="gender[]" class="form-select" id="gender{{ $i }}" required="">
                                <option value="">Choose</option>
                                <option value="male"> Male </option>
                                <option value="female"> Female </option>
                            </select>
                        </div>
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label for="age{{ $i }}" class="form-label text-semibold"><b>Age</b></label>

                            <input type="number" name="age[]" data-parsley-error-message="Invalid!!" placeholder="age" min="1" minlength="1" maxlength="2" data-parsley-errors-container="#age-container" class="form-control" required="" id="age{{ $i }}">

                            <div id="age-container"></div>
                        </div>
                    </div>
                    

                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="">
                                <label for="job-title{{ $i }}" class="form-label text-semibold"><b>Job Title</b></label>
                                            <input name="job_title[]" placeholder="Job Title" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\-\(\)\_\/\s]*" data-parsley-error-message="Format Is Invalid" required="required" type="text" class="form-control " id="job-title{{ $i }}">
                                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="institusi{{ $i }}" class="form-label text-semibold"><b>Institution Category</b></label>
                        <select name="intitution_category[]" class="form-select" id="institusi{{ $i }}" required="">
                            <option value="">Choose</option>
                            <option value="Government"> Government </option>
                            <option value="Association"> Association </option>
                            <option value="University"> University </option>
                            <option value="Vocational"> SHS/Vocational </option>
                            <option value="Internal"> Internal </option>
                            <option value="Supply Chain"> Supply Chain </option>
                            <option value="Media"> Media </option>
                            <option value="Key Opinion Leader"> Key Opinion Leader </option>
                            <option value="Public"> Public </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="">
                                <label for="emailPengunjung{{ $i }}" class="form-label text-semibold"><b>Email</b></label>
                                    <input name="emailPengunjung[]" placeholder="email" required="required" type="email" class="form-control " id="emailPengunjung{{ $i }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        @endfor                        
@if($pengunjung < $kuota)
        <div class="flex-between w-100 mb-4 mt-3 add-visitor-xev">
            <div class="flex-end w-100 px-4 py-1">
                <a id="tambahpengunjung" wire:click="switchroom" class="btn btn-primary mx-2" style="float: right; background-color: #04BD00; color: black;">
                    <i class="fa-solid fa-plus fa-lg px-2"></i>Add Visitor
                </a>
            </div>
        </div>
@endif

        <div id="card-error" class="mt-5 mx-4 card px-3 border-radius-8 mb-3 py-2">
            <div class="card-body">
    
                <h5 class="mb-3 text-left text-semibold">Kebijakan Privasi</h5>
                
                <div class="mb-3 d-flex align-items-center">
    
                    <input type="checkbox" id="agreement" data-parsley-errors-container="#container-error-aggrement" data-parsley-class-handler="#card-error" data-parsley-error-message="Please Accept The Aggrement" class="me-3" style="cursor: pointer;" required="" data-parsley-multiple="agreement">
    
                    <label for="agreement" style="cursor: pointer;">
                    Dengan mengirimkan formulir ini, saya telah membaca secara seksama dan menyetujui 
                    <a href="#" data-bs-toggle="modal" data-bs-target="#privacy-policy">Syarat dan Kententuan serta Kebijakan Privasi</a> yang berlaku.</label>
                    
                </div>
                <div id="container-error-aggrement" class="mt-3"></div>
            </div>
        </div>
    
        <div class="flex-between w-100 mb-4 submit-reservation-xev">
            <div class="flex-end w-100 px-4 py-1">
                <button class="btn btn-primary flex-center py-1 px-4 border-radius-8" type="submit" id="submit-reservation" style="background-color: #008DB9; color: white; font-weight: bold; float: right;">Submit</button>
            </div>
        </div>
        
      </form>
      
</div>


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('livewire:load', () => {
            console.log(@this.allow_days);
            $( function() {
                var disabledDays = @this.allow_days;
                console.log(disabledDays)
                var today = new Date();
                var startDate = new Date();
                startDate.setDate(today.getDate() + @this.dateInterval);

                var dayOff = @this.day_off

                $( "#arrival-date" ).datepicker(
                    {minDate :startDate,
                        maxDate: "+2m +1w",
                        beforeShowDay: function(date) {
                            var day = date.getDay(); // Mendapatkan hari (0: Minggu, 1: Senin, dst.)
                            var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                            console.log(dayOff.indexOf(dateString) !== -1);
                            return [disabledDays.indexOf(day) != -1 && dayOff.indexOf(dateString) == -1]; // Menonaktifkan Selasa (2) dan Rabu (3)
            }
        }
        );
    } );
    
        });


        $(document).ready(function() {
            // Mengambil referensi elemen input dan datepicker
            const datepicker = $('#arrival-date');
            const totalVisitor = $('#total-visitor');
            const session = $('#session');
            
            // Menambahkan event listener pada datepicker untuk memantau perubahan nilainya
            datepicker.on('change', function() {
                @this.date = datepicker.val()
                console.log(datepicker.val())
                // Jika datepicker telah diisi, aktifkan semua input
                if (datepicker.val() !== '') {
                    session.prop('disabled', false);
                } else {
                    // Jika datepicker kosong, nonaktifkan semua input
                    session.prop('disabled', true);
                }
            });
            
            session.on('change', function() {
                console.log(session.val())
                // 
                // Jika datepicker telah diisi, aktifkan semua input
                if (session.val() !== '') {
                    totalVisitor.prop('disabled', false);
                } else {
                    // Jika datepicker kosong, nonaktifkan semua input
                    totalVisitor.prop('disabled', true);
                }
            });
     
        totalVisitor.on('change', function() {
            @this.pengunjung = totalVisitor.val()
            console.log(totalVisitor.val())
        });
        
        });
        
    </script>
@endpush