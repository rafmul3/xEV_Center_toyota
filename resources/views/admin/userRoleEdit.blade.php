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
                            <h1 style="font-weight: bold; font-size: 30px">User Role Assignment</h1>
                        </div>
                    </div>
                </div>

                <div class="box-reservation-xev my-3 py-5">
                    <div class="card border-radius-8">
                        {{-- <form action="/registrationDashboard/delete" method="post"> --}}
                            {{-- @csrf --}}
                        <div class="card-body">
                            <form method="POST" action="/userRole/edit/{{ $users->id }}">
                                @csrf
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Pengguna:</label>
                                            <input type="text" class="form-control" id="name" readonly value={{ $users->name }}> 
                                        </div>
                                    </div>
                                    {{ $users->role_id }}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Roles:</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="">Pilih Peran</option>
                                                
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" 
                                                        
                                                @foreach ($users->roles as $userRole)
                                                @if($userRole->id == $role->id) selected @endif
                                                @endforeach>
                                    
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary my-3">Simpan</button>
                            </form>
                            
                            
                            
                            
                            
                                {{-- <div class="col-md-12"> --}}
                                    {{-- <button class="btn btn-primary flex-center my-2 py-1 px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #CE2500; color: white; font-weight: bold; float: left;">Delete</button> --}}
                                    {{-- <i class="flex-center mt-4 py-2 px-3" style="color: #000000; float: right;">
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
                                    </i> --}}
                                {{-- </div> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection