@extends('layouts.navbar_dashboard')

    @section('content')
    
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
        <div class="inner-content-tabbing-visitordetail my-3 py-3">
            <div class="mx-3 mb-3">
                
                <div class="col-md-12">
                    <div class="card border-radius-8">
                        <div class="card-body d-flex" style="background-color: #C3C3C3;">
                            <h1 style="font-weight: bold; flex: 1;">Reservation Day Off</h1>
                        </div>
                    </div>
                </div>
                <a href="/setting/dayOff/create" class="btn btn-primary mx-2 my-2" style="float: right; background-color: #04BD00; color: white;"><i class="fa-solid fa-plus fa-lg px-2"></i>New</a>
                
                <div class="box-reservation-xev my-3 py-5">
                    <div class="card border-radius-8">
                        <form action="/setting/dayOff/Delete" method="post">
                        <div class="card-body">
                                @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th scope="col">Day Disable</th>
                                        <th scope="col">Status Day</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dayOff as $day)
                                    <tr>
                                        <td><input  name="id[]" value={{ $day->id }} class="checkItem" type="checkbox"></td>
                                        <td>{{ $day->date }}</td>
                                        <td>{{ $day->status_day }}</td>
                                         <td><a class="btn btn-primary flex-center mt-1 py-1 px-4 border-radius-8 btn-sm" href="/setting/dayOff/{{ $day->id }}" id="submit-reservation" style="background-color: #FE8F50; color: white; font-weight: bold;">Edit</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    <button class="btn btn-primary flex-center mt-3 py-1 px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #CE2500; color: white; font-weight: bold; float: left;">Delete</button>
                                    <i class="flex-center mt-4 py-2 px-3" style="color: #000000; float: right;">
                                        <ul class="pagination">
                                            @if ($dayOff->currentPage() > 3)
                                                <li class="page-item"><a class="page-link" href="{{ $dayOff->url(1) }}">&lt;&lt;</a></li>
                                            @endif
                                        
                                            @if ($dayOff->currentPage() > 1)
                                                <li class="page-item"><a class="page-link" href="{{ $dayOff->previousPageUrl() }}">&lt;</a></li>
                                            @endif
                                        
                                            @for ($i = max(1, $dayOff->currentPage() - 2); $i <= min($dayOff->lastPage(), $dayOff->currentPage() + 2); $i++)
                                                <li class="page-item {{ $i === $dayOff->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $dayOff->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                        
                                            @if ($dayOff->currentPage() < $dayOff->lastPage())
                                                <li class="page-item"><a class="page-link" href="{{ $dayOff->nextPageUrl() }}">&gt;</a></li>
                                            @endif
                                        
                                            @if ($dayOff->currentPage() < $dayOff->lastPage() - 2)
                                                <li class="page-item"><a class="page-link" href="{{ $dayOff->url($dayOff->lastPage()) }}">&gt;&gt;</a></li>
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

@endsection