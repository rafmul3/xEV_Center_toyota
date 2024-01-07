@extends('layouts.navbar_dashboard')

    @section('content')
        <div class="inner-content-tabbing-visitordetail my-3">
            <div class="mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex align-items-center" style="background-color: #C3C3C3;">
                            <h2 style="font-weight: bold;">Setting - Reservation</h2>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>

      
        @livewire('seting', ['dateInterval' => $dateInterval, 
                              'kuota' => $kuota])
        @stack('scripts')
          
        @endsection