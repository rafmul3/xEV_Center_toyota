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
                            <h1 style="font-weight: bold; font-size: 30px">Permission Assignment</h1>
                        </div>
                    </div>
                </div>
                {{-- <a href="/setting/reservationSession/create" class="btn btn-primary mx-2 my-2" style="float: right; background-color: #04BD00; color: white;"><i class="fa-solid fa-plus fa-lg px-2"></i>New</a> --}}

                <div class="box-reservation-xev my-3 py-5">
                    <div class="card border-radius-8">
                        <form action="/rolePermission/Edit/{{ $role->id }}" method="post">
                            @csrf
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Role</th>
                                        <th scope="col">Registration</th>
                                        <th scope="col">Checkin</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Setting</th>
                                        <th scope="col">userRole</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <input type="checkbox" name="registration" 
                                                {{ $role->hasPermissionTo('registration') ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="checkin" 
                                                {{ $role->hasPermissionTo('checkin') ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="feedback" 
                                                {{ $role->hasPermissionTo('feedback') ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="setting" 
                                                {{ $role->hasPermissionTo('setting') ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="userRole" 
                                                {{ $role->hasPermissionTo('userRole') ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary my-3">Simpan</button>
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