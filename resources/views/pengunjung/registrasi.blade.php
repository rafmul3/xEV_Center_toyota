@extends('layouts.navbar')

@section('content')

{{-- <div class="inner-content-tabbing-reservation my-3 py-3">
    <div class="content-reservation"> --}}

        
            

    @livewire('registrasi')
    @stack('scripts')
    
<div class="modal fade" id="privacy-policy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Syarat &amp; Kententuan</h5>
                            </div>
            <div class="modal-body">
                        <p>Dengan mengirimkan formulir ini, saya telah membaca secara seksama dan menyetujui Syarat dan
                        Kententuan serta Kebijakan Privasi yang berlaku.</p>

                    <p><b>Harap diperhatikan: Informasi pribadi yang Anda berikan akan dikumpulkan, digunakan, dan
                            disimpan
                            pada halaman ini untuk memberikan pengalaman terbaik dalam mengakses situs TMMIN. Kami
                            menganggap
                            perlindungan atas data dan privasi Anda sebagai hal yang penting. Untuk itu, kami tidak
                            membagikan
                            informasi pribadi apapun kepada siapapun, kecuali sebagaimana yang telah dijelaskan dalam
                            Kebijakan
                            Privasi ini.</b></p>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="continue-aggrement">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>
            </div>

@endsection