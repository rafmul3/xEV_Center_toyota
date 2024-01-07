@extends('layouts.navbar_dashboard')

    @section('content')

    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="">
                        <div class="card-body rounded-3" style="background-color: #dedede; ">
                            <h1 style="font-weight: bold; font-size: 30px">Check in - Group Arrival</h1>
                        </div>
                    </div>
                </div>

                <div class="box-reservation-xev my-3 py-5">
                    <div class="card border-radius-8">
                        <form id="myForm" action="/checkinDashboard/delete" method="post">
                            @csrf
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th scope="col">Arrival Date</th>
                                        <th scope="col">Group Name</th>
                                        <th scope="col">Session</th>
                                        <th scope="col">PIC Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Total Arrival</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservasi_group as $reservasiGroup)
                                    <tr>
                                        <td><input name="id[]" value={{ $reservasiGroup->id }} class="checkItem" type="checkbox"></td>
                                        <td>{{ $reservasiGroup->tanggal }}</td>
                                        <td>{{ $reservasiGroup->nama_group }}</td>
                                        <td>{{ $reservasiGroup->reservation_session->session_name }}</td>
                                        <td>{{ $reservasiGroup->pic_name }}</td>
                                        <td>{{ $reservasiGroup->email }}</td>
                                        <td>{{ $reservasiGroup->total_member }}</td>
                                        <td><button class="btn btn-primary flex-center mt-1 py-1 px-4 border-radius-8 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $reservasiGroup->id  }}" id="submit-reservation" style="background-color: #00B934; color: white; font-weight: bold;">Detail</button>
                                            
                                    @can('checkin')
                                            <button class="btn btn-primary flex-center mt-1 py-1 px-3 border-radius-8 btn-sm" type="button" id="submit-reservation" style="background-color: #008DB9; color: white; font-weight: bold;" onclick="setAction('/blastEmail/{{ $reservasiGroup->id }}')">Kirim Link</button></td>
                                    @endcan
                                    </tr>
                                    @endforeach
                                
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    @can('checkin')
                                    <button class="btn btn-primary flex-center mt-3 py-1 px-4 mx-2 border-radius-8 btn-sm" type="button" id="submit-reservation" style="background-color: #CE2500; color: white; font-weight: bold; float: left;" onclick="setAction('/checkinDashboard/delete')">Delete</button>
                                    @endcan
                                    <i class="flex-center mt-4 py-2 px-3" style="color: #000000; float: right;">
                                        <ul class="pagination">
                                            @if ($reservasi_group->currentPage() > 3)
                                                <li class="page-item"><a class="page-link" href="{{ $reservasi_group->url(1) }}">&lt;&lt;</a></li>
                                            @endif
                                        
                                            @if ($reservasi_group->currentPage() > 1)
                                                <li class="page-item"><a class="page-link" href="{{ $reservasi_group->previousPageUrl() }}">&lt;</a></li>
                                            @endif
                                        
                                            @for ($i = max(1, $reservasi_group->currentPage() - 2); $i <= min($reservasi_group->lastPage(), $reservasi_group->currentPage() + 2); $i++)
                                                <li class="page-item {{ $i === $reservasi_group->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $reservasi_group->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                        
                                            @if ($reservasi_group->currentPage() < $reservasi_group->lastPage())
                                                <li class="page-item"><a class="page-link" href="{{ $reservasi_group->nextPageUrl() }}">&gt;</a></li>
                                            @endif
                                        
                                            @if ($reservasi_group->currentPage() < $reservasi_group->lastPage() - 2)
                                                <li class="page-item"><a class="page-link" href="{{ $reservasi_group->url($reservasi_group->lastPage()) }}">&gt;&gt;</a></li>
                                            @endif
                                        </ul>
                                    </i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

@foreach($reservasi_group as $reservasiGroup)
  {{-- @dd($reservasiGroup->group_member) --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $reservasiGroup->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Visitor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Visitor Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Job_Title</th>
                                    <th scope="col">Institution</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservasiGroup->group_member as $member)
                                <tr>
                                    <td>{{ $member->pengunjung->visitor_name }}</td>
                                    <td>{{ $member->pengunjung->gender }}</td>
                                    <td>{{ $member->pengunjung->age }}</td>
                                    <td>{{ $member->pengunjung->job_title }}</td>
                                    <td>{{ $member->pengunjung->intitution_category }}</td>
                                    <td>@if($member->pengunjung->group_member[0]->Kehadiran) Hadir @else Tidak Hadir @endif</td> 
                                    <td>@if($member->pengunjung->group_member[0]->feedback) Sudah Mengisi @else Belum Mengisi @endif</td> 
                                </tr>
                                @endforeach
                            
                                </tbody>
                            </table>
    </div>
  </div>
</div>
</div>
@endforeach

<script>
function setAction(action) {
    var form = document.getElementById('myForm');
    form.action = action;
    form.submit();
  }
</script>

@endsection