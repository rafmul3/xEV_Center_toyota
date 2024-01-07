<div>
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="col-md-12 mt-3">
        <div class="card pb-3" style="background-color: #c3c3c3">
            <div
                class="si-card mt-4"
                style=" background-color: #ffffff;
                        border: 15px solid;
                        border-color: #c3c3c3;"
            >
                <h3 style="font-weight: bold">&nbsp;System Information</h3>

                <div
                    class="si-card-body1 d-flex align-items-center px-2"
                    style=" border: 1px solid black;
                            margin: 10px"
                >
                    <h5 class="pt-2" style="flex: 1">Allow Days</h5>
                    <table
                        class="px-3 mt-2"
                        style="float: right; border-left: 1px solid black"
                    >

                        <tr>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    color: @if(in_array("Minggu", $days)) green; @else red; @endif
                                "
                            >
                                S
                            </th>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    color: @if(in_array("Senin", $days)) green; @else red; @endif
                                "
                            >
                                M
                            </th>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    
                                    color: @if(in_array("Selasa", $days)) green; @else red; @endif
                                "
                            >
                                T
                            </th>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    
                                    color: @if(in_array("Rabu", $days)) green; @else red; @endif
                                "
                            >
                                W
                            </th>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    
                                    color: @if(in_array("Kamis", $days)) green; @else red; @endif
                                "
                            >
                                T
                            </th>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    
                                    color: @if(in_array("Jum'at", $days)) green; @else red; @endif
                                "
                            >
                                F
                            </th>
                            <th
                                style="
                                    border-left: 1px solid black;
                                    padding-left: 15px;
                                    padding-right: 15px;
                                    
                                    color: @if(in_array("Sabtu", $days)) green; @else red; @endif
                                "
                            >
                                S
                            </th>
                        </tr>
                    </table>
                </div>

                <div
                    class="si-card-body1 d-flex align-items-center px-2 mt-2 pt-2"
                    style="border: 1px solid black;
                            margin: 10px"
                >
                    <h5 style="flex: 1">Date Interval</h5>
                    <h5 style="float: right">{{ $dateInterval }}</h5>
                </div>

                <div
                    class="si-card-body1 d-flex align-items-center px-2 mt-2 pt-2"
                    style="border: 1px solid black;
                            margin: 10px"
                >
                    <h5 style="flex: 1">Quota / Session</h5>
                    <h5 style="float: right">{{ $kuota }}</h5>
                </div>
@can('setting')
                <!-- <div
                    class="si-card-body1 d-flex align-items-center px-2 mt-2 mb-3 pt-2"
                    style="border: 1px solid black;
                            margin: 10px"
                >
                    <h5 style="flex: 1">Day Off</h5>
                    <h5 style="float: right">
                        ini coba coba ajah klo gak butuh di apus ajh
                    </h5>
                </div> -->
            </div>
                
            <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">Allow Days</h4>
                <button
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#allowDays"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Edit
                </button>
            </div>
            <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">Date Interval</h4>
                <button
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#dateInterval"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Edit
                </button>
            </div>
            <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">Quota</h4>
                <button
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#kuota"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                Edit
            </button>
        </div>
            <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">Session</h4>
                <a
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    href="/setting/reservationSession"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Edit
                </a>
        </div>
            <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">Day Off</h4>
                <a
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    href="/setting/dayOff"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Edit
                </a>
            </div>
            <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">User Role</h4>
                <a
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    href="/userRole"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Edit
                </a>
        </div>
        <div
                class="card-body d-flex align-items-center mt-1"
                style="
                    background-color: #ffffff;
                    border: 15px solid;
                    border-color: #c3c3c3;
                "
            >
                <h4 style="font-weight: bold; flex: 1">User Permission</h4>
                <a
                    class="btn btn-primary flex-center px-5 mx-2 border-radius-8 btn-sm"
                    href="/rolePermission"
                    id="submit-reservation"
                    style="
                        background-color: #fe8f50;
                        color: white;
                        font-weight: bold;
                        float: right;
                    "
                >
                    Edit
                </a>
        </div>
            <div
                class="hi-card mt-4"
                style=" background-color: #ffffff;
                        border: 15px solid black;
                        border-color: #c3c3c3;"
            >
                <h3 style="font-weight: bold">&nbsp;&nbsp;System History</h3>
                <div class="hi-card-body2 d-flex align-items-center px-2">
                    <table
                        class="col-md-12 px-2 mt-2"
                        style="float: right; border-bottom: 1px solid black"
                    >
                        <tr>
                            <th class="col-3" style="border-bottom: 1px solid black">Date</th>
                            <th class="col-9" style="border-bottom: 1px solid black">
                                Description
                            </th>
                        </tr>
                        @foreach($logs as $log)
                        <tr>
                            <td style="padding-right: 35px">{{ $log->created_at }}</td>
                            <td>{{ $log->User->name }} {{ $log->description }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-12">
                    <i class="flex-center mt-4 py-2 px-3" style="color: #000000; float: right;">
                        <ul class="pagination">
                            @if ($logs->currentPage() > 3)
                                <li class="page-item"><a class="page-link" href="{{ $logs->url(1) }}">&lt;&lt;</a></li>
                            @endif
                        
                            @if ($logs->currentPage() > 1)
                                <li class="page-item"><a class="page-link" href="{{ $logs->previousPageUrl() }}">&lt;</a></li>
                            @endif
                        
                            @for ($i = max(1, $logs->currentPage() - 2); $i <= min($logs->lastPage(), $logs->currentPage() + 2); $i++)
                                <li class="page-item {{ $i === $logs->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $logs->url($i) }}">{{ $i }}</a></li>
                            @endfor
                        
                            @if ($logs->currentPage() < $logs->lastPage())
                                <li class="page-item"><a class="page-link" href="{{ $logs->nextPageUrl() }}">&gt;</a></li>
                            @endif
                        
                            @if ($logs->currentPage() < $logs->lastPage() - 2)
                                <li class="page-item"><a class="page-link" href="{{ $logs->url($logs->lastPage()) }}">&gt;&gt;</a></li>
                            @endif
                        </ul>
                    </i>
                </div>
            </div>
        </div>
    </div>

    <div
        wire:ignore
        class="modal fade"
        id="allowDays"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Allow Days
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card" style="background-color: #c3c3c3">
                            <form action="/allow_days" method="post">
                                @csrf
                                <div class="card-body mx-3 form-group">
                                    <input
                                        wire:model.lazy="allow_days"
                                        type="text"
                                        id="skill"
                                        name="allow_days"
                                        class="form-control"
                                    />
                                </div>
                                <div class="px-4 mb-3 mt-3">
                                    <button
                                        class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm"
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        style="
                                            background-color: #acbcb0;
                                            color: black;
                                            font-weight: bold;
                                            float: left;
                                        "
                                    >
                                        Back
                                    </button>
                                    <button
                                        class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm"
                                        type="submit"
                                        id="submit-reservation"
                                        data-bs-dismiss="modal"
                                        style="
                                            background-color: #00ce2d;
                                            color: white;
                                            font-weight: bold;
                                            float: right;
                                        "
                                    >
                                        Save & Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        wire:ignore
        class="modal fade"
        id="dateInterval"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Date Interval
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card" style="background-color: #c3c3c3">
                            <div class="card-body mx-3 pb-0">
                                <h6>Interval Dalam Hari</h6>
                            </div>
                            <form wire:submit.prevent="updateDateInterval">
                                <div class="card-body mx-3 pt-0">
                                    <input
                                        wire:model.lazy="dateInterval"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan Interval Hari Misal : 10"
                                        aria-label="Username"
                                        aria-describedby="addon-wrapping"
                                    />
                                </div>
                                <div class="px-4 mb-3 mt-3">
                                    <button
                                        class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm"
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        style="
                                            background-color: #acbcb0;
                                            color: black;
                                            font-weight: bold;
                                            float: left;
                                        "
                                    >
                                        Back
                                    </button>
                                    <button
                                        class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm"
                                        type="submit"
                                        id="submit-reservation"
                                        data-bs-dismiss="modal"
                                        style="
                                            background-color: #00ce2d;
                                            color: white;
                                            font-weight: bold;
                                            float: right;
                                        "
                                    >
                                        Save & Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="modal fade"
        id="kuota"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Kuota
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card" style="background-color: #c3c3c3">
                            <form wire:submit.prevent="updateKuota">
                                <div class="card-body mx-3">
                                    <input
                                        type="text"
                                        wire:model.lazy="kuota"
                                        class="form-control"
                                        placeholder="Masukkan Jumlah Quota Misal : 20"
                                        aria-label="Username"
                                        aria-describedby="addon-wrapping"
                                    />
                                </div>
                                <div class="px-4 mb-3 mt-3">
                                    <button
                                        class="btn btn-primary flex-center py-1 px-4 border-radius-8 btn-sm"
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        style="
                                            background-color: #acbcb0;
                                            color: black;
                                            font-weight: bold;
                                            float: left;
                                        "
                                    >
                                        Back
                                    </button>
                                    <button
                                        class="btn btn-primary flex-center px-4 mx-2 border-radius-8 btn-sm"
                                        type="submit"
                                        id="submit-reservation"
                                        data-bs-dismiss="modal"
                                        style="
                                            background-color: #00ce2d;
                                            color: white;
                                            font-weight: bold;
                                            float: right;
                                        "
                                    >
                                        Save & Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan

<script>
    $(document).ready(function () {
        $("#skill").tokenfield({
            autocomplete: {
                source: [
                    "Senin",
                    "Selasa",
                    "Rabu",
                    "Kamis",
                    "Jum'at",
                    "Sabtu",
                    "Minggu",
                ],
                delay: 100,
            },
            showAutocompleteOnFocus: true,
        });

        //  $('#skill').on('keyup', function() {
        //    var allowDays = $(this).val();
        //    console.log(allowDays); // Mencetak nilai setiap kali ada perubahan di dalam elemen input
        //  });
    });
</script>
