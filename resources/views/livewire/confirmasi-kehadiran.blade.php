<div>

    <form id='formSubmit' action='/pengunjung/reservasiConfirmation/attendConfirmation' method='POST'>
        @csrf
    <div class="box-reservation-xev my-3 py-5">
                <div class="card border-radius-8 p-5">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h1 class="mb-4 d-block">Visitor List Detail</h1>
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
                                <th><input type="checkbox" id="checkAll"></th>
                              </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="groupid" value={{ $reservasi_group->id }}>
                                <input type="hidden" name="tanggal" value={{ $reservasi_group->tanggal }}>
                              @foreach($reservasi_group->group_member as $member)
                              <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $member->pengunjung->visitor_name }}</td>
                                <td>{{ $member->pengunjung->gender }}</td>
                                <td>{{ $member->pengunjung->age }}</td>
                                <td>{{ $member->pengunjung->job_title }}</td>
                                <td><input class="checkItem" name="member[]" value={{ $member->id }} type="checkbox"></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <button class="btn btn-primary flex-center mt-4 py-1 px-4 border-radius-8 mx-3 btn-lg" type="submit" id="submit-reservation" style="background-color: #00B934; color: white; font-weight: bold; float: right;">Submit</button>
                    </div>
                </div>
            </div>
    </form>
    
            @if($pengunjung == 1)
            <form id="formaddVisitorData" wire:submit.prevent="addVisitorData">
    <div class="visitor-list my-3" id="dynamic-visitor-list">
        <h1 class="mx-5 mb-4 d-block">Visitor List</h1>    
        <div class="visitor-list-default">
            <div class="card p-5 border-radius-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="list-visitor-name" class="form-label text-semibold">Daftar Nama Pengunjung</label>
                                                <input wire:model="visitor_name" name="visitor_name[]" placeholder="List Visitor Name" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\-\(\)\_\/\s]*" data-parsley-error-message="Format Is Invalid" required="required" type="text" class="form-control " id="list-visitor-name">          
                                </div>
                            </div>
                        </div>
                            <div class="col-md-3 mb-3">
                                <label for="gender" class="form-label text-semibold">Jenis Kelamin</label>
                                <select wire:model="gender" name="gender" class="form-select" id="gender" required="">
                                    <option value="">Pilih</option>
                                    <option value="male"> Male </option>
                                    <option value="female"> Female </option>
                                </select>
                            </div>
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label for="age" class="form-label text-semibold">Usia</label>

                                <input wire:model="age" type="number" name="age[]" data-parsley-error-message="Invalid!!" placeholder="age" min="1" minlength="1" maxlength="2" data-parsley-errors-container="#age-container" class="form-control" required="" id="age">

                                <div id="age-container"></div>
                            </div>
                        </div>
                        

                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="">
                                    <label for="job-title" class="form-label text-semibold">Pekerjaan</label>
                                                <input wire:model="job_title" name="job_title[]" placeholder="Job Title" data-parsley-pattern="[a-zA-Z0-9.,-_()\.\,\-\(\)\_\/\s]*" data-parsley-error-message="Format Is Invalid" required="required" type="text" class="form-control " id="job-title">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="institusi" class="form-label text-semibold">Kategori Institusi</label>
                            <select wire:model="institution_category" name="institution_category[]" class="form-select" id="institusi" required="">
                                <option value="">Pilih</option>
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
                                    <label for="email" class="form-label"><b>Email</b></label>
                                        <input wire:model='emailPengunjung' name="emailPengunjung[]" placeholder="email" required="required" type="email" class="form-control " id="email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


            @endif

      <div class="mb-4 submit-reservation-xev">
          <div class="px-4 py-1 mt-4">
              <a href="http://127.0.0.1:8000/validateCode" class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-lg" type="submit" id="myButton" style="background-color: #EE0909; color: white; font-weight: bold; float: left;">Back</a>
              <button type="submit" class="btn btn-primary mx-2" style="float: right; background-color: #00B934; color: white; @if($pengunjung < 1) display: none; @endif"><i class="fa-solid fa-plus fa-lg px-2"></i>Save Data</button>
              <a wire:click="addVisitor" class="btn btn-primary mx-2" style="float: right; background-color: #46A6FF; color: black; @if($pengunjung >= 1) display: none; @endif"><i class="fa-solid fa-plus fa-lg px-2"></i>Add Visitor</a>
          </div>
          </div>
      </div>
      
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
        $('#checkAll').change(function() {
            $('.checkItem').prop('checked', $(this).prop('checked'));
        });

        $('form').submit(function(e) {
            var checkboxes = $('#formSubmit input[type="checkbox"]:checked');
            
            // Periksa minimal satu checkbox terpilih
            if (checkboxes.length === 0) {
                e.preventDefault(); // Mencegah pengiriman form
                
                alert('Minimal satu checkbox harus terpilih.');
                return false;
            }
            
            // Lakukan pemrosesan data jika validasi berhasil
            // ...
        });
    });
</script>