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
                            <h1 style="font-weight: bold; font-size: 30px">Feedback Visitor</h1>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm mt-3" href="/download/feedback" id="submit-reservation" style="background-color: #50BFFE; color: white; font-weight: bold; float: right;">Download</a>

                <div class="box-reservation-xev my-3 py-5">
                    <div class="card border-radius-8">
                        <div class="card-body">
                            <form action="/feedbackDashboard/delete" method="post">
                                @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Institution Category</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Testimony</th>
                                        <th scope="col">Advice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($feedbacks as $feedback)
                                    <tr>
                                        <td><input name="id[]" value={{ $feedback->id }} class="checkItem" type="checkbox"></td>
                                        @php 
                                        $date = substr($feedback->created_at, 0, 10);
                                        @endphp
                                        <th scope="row">{{ $date }}</th>
                                        <td>{{ $feedback->pengunjung->intitution_category }}</td>
                                        <td>{{ $feedback->pengunjung->email }}</td>
                                        <td>{{ $feedback->testimoni }}</td>
                                        <td>{{ $feedback->advice }}</td>
                                    </tr>                                    
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    @can('feedback')
                                    <button class="btn btn-primary flex-center mt-3 py-1 px-4 mx-2 border-radius-8 btn-sm" type="submit" id="submit-reservation" style="background-color: #CE2500; color: white; font-weight: bold; float: left;">Delete</button>
                                    @endcan
                                    <i class="flex-center mt-4 py-2 px-3" style="color: #000000; float: right;">
                                        <ul class="pagination">
                                            @if ($feedbacks->currentPage() > 3)
                                                <li class="page-item"><a class="page-link" href="{{ $feedbacks->url(1) }}">&lt;&lt;</a></li>
                                            @endif
                                        
                                            @if ($feedbacks->currentPage() > 1)
                                                <li class="page-item"><a class="page-link" href="{{ $feedbacks->previousPageUrl() }}">&lt;</a></li>
                                            @endif
                                        
                                            @for ($i = max(1, $feedbacks->currentPage() - 2); $i <= min($feedbacks->lastPage(), $feedbacks->currentPage() + 2); $i++)
                                                <li class="page-item {{ $i === $feedbacks->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $feedbacks->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                        
                                            @if ($feedbacks->currentPage() < $feedbacks->lastPage())
                                                <li class="page-item"><a class="page-link" href="{{ $feedbacks->nextPageUrl() }}">&gt;</a></li>
                                            @endif
                                        
                                            @if ($feedbacks->currentPage() < $feedbacks->lastPage() - 2)
                                                <li class="page-item"><a class="page-link" href="{{ $feedbacks->url($feedbacks->lastPage()) }}">&gt;&gt;</a></li>
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