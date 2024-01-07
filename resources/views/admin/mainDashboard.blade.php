@extends('layouts.navbar_dashboard')

    @section('content')

        <h1>Data Visitor</h1>
        <div class="b">
            <div class="widget">
                <p>{{ $Chart->visitorArival }}</p>
                <div class="widget-title">Total Arrival Visitor</div>
            </div>
            <div class="widget">
                <p>{{ $Chart->waitingList }}</p>
                <div class="widget-title">Waiting List</div>
            </div>
            <div class="widget">
                <p>{{ $Chart->feedback }}</p>
                <div class="widget-title">Total Submitted Feedback</div>
            </div>
        </div>
        <br />
        <div
            style="
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px;
            "
        >
            <div class="card">
                <div class="barchart">
                    <div class="age">
                        <canvas
                            id="age"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "1-10",
                                "11-20",
                                "21-30",
                                "31-40",
                                "41-50",
                                "51-60",
                                ">60",
                            ];
                            var yValues = [{{ $Chart->visitorLv1 }}, {{  $Chart->visitorLv2 }}, {{  $Chart->visitorLv3 }}, {{  $Chart->visitorLv4 }}, {{  $Chart->visitorLv5 }}, {{  $Chart->visitorLv6 }}, {{  $Chart->visitorLv7 }}];
                            var barColors = [
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                            ];

                            new Chart("age", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    legend: { display: false },
                                    title: {
                                        display: true,
                                        text: "Age Category",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="piechart1">
                    <div class="gender">
                        <canvas
                            id="gender"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = ["Male", "Female"];
                            var yValues = [{{ $Chart->visitorMale }}, {{ $Chart->visitorFemale }}];
                            var barColors = ["#F00000", "#EB00F0"];

                            new Chart("gender", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Gender",
                                    },
                                    legend: {
                                        position: "bottom",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="piechart1">
                    <div class="institution">
                        <canvas
                            id="institution"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "Government",
                                "Association",
                                "University",
                                "SHS",
                                "Internal",
                                "SupplyChain",
                                "Media",
                                "KOL",
                                "Public",
                            ];
                            var yValues = [{{  $Chart->institutionCategory_Government }}, {{  $Chart->institutionCategory_Association }}, {{  $Chart->institutionCategory_University }}, {{  $Chart->institutionCategory_SHS }}, {{  $Chart->institutionCategory_Internal }}, {{  $Chart->institutionCategory_Supply }}, {{  $Chart->institutionCategory_Media }}, {{  $Chart->institutionCategory_KOL }}, {{  $Chart->institutionCategory_Public }}];
                            var barColors = [
                                "#b91d47",
                                "#00aba9",
                                "#2b5797",
                                "#e8c3b9",
                                "#79E56B",
                                "#C8FE84",
                                "#86C5F8",
                                "#E776E2",
                                "#ACB3DF",
                            ];

                            new Chart("institution", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Institution Category",
                                    },
                                    legend: {
                                        position: "left",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="piechart1">
                    <div class="">
                        <canvas
                            id="know"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "Friends/Family",
                                "LinkedIn",
                                "Internal",
                                "News",
                                "Instagram",
                                "Youtube",
                                "Others",
                            ];
                            console.log("sacsacs")
                            var yValues = [{{ $Chart->howTheyKnow_Friend }},{{ $Chart->howTheyKnow_LinkedIn}}, {{ $Chart->howTheyKnow_Internal }}, {{ $Chart->howTheyKnow_News }}, {{ $Chart->howTheyKnow_Instagram }},{{ $Chart->howTheyKnow_Other}}, {{ $Chart->howTheyKnow_Other }}];
                            var barColors = [
                                "#b91d47",
                                "#00aba9",
                                "#2b5797",
                                "#e8c3b9",
                                "#1e7145",
                                "#956BF7",
                                "#FFC301",
                            ];

                            new Chart("know", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "How They Know xEV Center",
                                    },
                                    legend: {
                                        position: "right",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="barchart">
                    <div class="before">
                        <canvas
                            id="before"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "Bad",
                                "Fair",
                                "Average",
                                "Good",
                                "Execellent",
                            ];
                            var yValues = [{{ $Chart->knowledgeBefore_bad }}, {{ $Chart->knowledgeBefore_fair }}, {{ $Chart->knowledgeBefore_average }}, {{  $Chart->knowledgeBefore_good }}, {{ $Chart->knowledgeBefore_execellent }}];
                            var barColors = [
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                                "purple",
                            ];

                            new Chart("before", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    legend: { display: false },
                                    title: {
                                        display: true,
                                        text: "Knowledge Before Visit",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="barchart">
                    <div class="after">
                        <canvas
                            id="after"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "Bad",
                                "Fair",
                                "Average",
                                "Good",
                                "Execellent",
                            ];
                            var yValues = [{{ $Chart->knowledgeAfter_bad }}, {{ $Chart->knowledgeAfter_fair }}, {{ $Chart->knowledgeAfter_average }}, {{  $Chart->knowledgeAfter_good }}, {{ $Chart->knowledgeAfter_execellent }}];
                            var barColors = [
                                "#1E69AA",
                                "#1E69AA",
                                "#1E69AA",
                                "#1E69AA",
                                "#1E69AA",
                            ];

                            new Chart("after", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    legend: { display: false },
                                    title: {
                                        display: true,
                                        text: "Knowledge After Visit",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="piechart1">
                    <div class="">
                        <canvas
                            id="knowledge"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "xEV Ecosystem",
                                "Difference of xEV Technologies",
                                "Multi Pathways Approach",
                                "Others",
                            ];
                            var yValues = [{{ $Chart->knowledgeIncrease_xev }}, {{ $Chart->knowledgeIncrease_MPA }}, {{ $Chart->knowledgeIncrease_Differences }}, {{ $Chart->knowledgeIncrease_other }}];
                            var barColors = [
                                "#2DCDEF",
                                "#976AFB",
                                "#C8FF85",
                                "#6AC1BB",
                            ];

                            new Chart("knowledge", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Knowledge Increase",
                                    },
                                    legend: {
                                        position: "left",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="piechart1">
                    <div class="">
                        <canvas
                            id="Technology"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = ["HEV", "PHEV", "BEV", "FCEV"];
                            var yValues = [{{ $Chart->InterestedCar_HEV }}, {{ $Chart->InterestedCar_PHEV }}, {{ $Chart->InterestedCar_BEV }}, {{ $Chart->InterestedCar_FCEV }}];
                            var barColors = [
                                "#2DCDEF",
                                "#976AFB",
                                "#C8FF85",
                                "#6AC1BB",
                            ];

                            new Chart("Technology", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Interested Car Technology",
                                    },
                                    legend: {
                                        position: "left",
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div
            style="
                display: grid;
                grid-template-columns: repeat(1, minmax(0, 1fr));
            "
        >
            <div class="card">
                <div class="piechart1">
                    <div class="">
                        <canvas
                            id="car"
                            style="width: 100%; max-width: 500px; margin: auto"
                        ></canvas>
                        <script>
                            var xValues = [
                                "SUV 7 Seater",
                                "SUV 5 Seater",
                                "MPV 7 Seater",
                                "MPV 7 Seater",
                                "Sedan",
                                "Small 2 Seater Car",
                            ];
                            var yValues = [{{ $Chart->InterestedCarType_MPV5 }}, {{ $Chart->InterestedCarType_SUV5 }}, {{ $Chart->InterestedCarType_Small }}, {{ $Chart->InterestedCarType_MPV7 }}, {{ $Chart->InterestedCarType_SUV7 }}, {{ $Chart->InterestedCarType_Sedan }}];
                            var barColors = [
                                "#2DCDEF",
                                "#976AFB",
                                "#C8FF85",
                                "#6AC1BB",
                                "#CEBDE1",
                                "#79E56B",
                            ];

                            new Chart("car", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [
                                        {
                                            backgroundColor: barColors,
                                            data: yValues,
                                        },
                                    ],
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Interested Car Category",
                                    },
                                    legend: {
                                        position: "left",
                                        usePointStyle: true,
                                    },
                                },
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"
        ></script>
@endsection