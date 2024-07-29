<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    header {
        background-color: #000080;
        color: white;
        text-align: center;
        padding: 10px;
        margin-bottom: 10px;
    }
    .box1 {
        border: 5px solid;
        border-color: #000080;
        border-radius: 20px;
        width: 98%;
        height: 84%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .box1 h1 {
        font-size: 28px;
        text-align: center;
        color: #000080;
    }
    .content {
        width: 100%;
        display: flex;
        justify-content: center;
        flex: 1;
    }
    .box2 {
        border: 5px solid;
        border-color: #8585d2;
        border-radius: 20px;
        display: flex;
        justify-content: space-around;
        flex-grow: 1;
        width: 100%;
        height: 630px;
    }
    .box3 {
        border: 5px solid;
        border-color: #8585d2;
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-grow: 1;
        width: 40%;
        height: 50%;
    }
    .box3 h1 {
        text-align: center;
    }
    .ketinggian_makanan {
        width: 60%;
    }
    .box4 {
        border: 5px solid;
        border-color: #8585d2;
        border-radius: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-grow: 1;
        width: 40%;
        height: 630px;
    }
    .box4 h1 {
        text-align: center;
    }
</style>
<body>
{{-- @include('components.navbar') --}}
<header>
    <h1 style="color: white">Sistem Cerdas Pada Lab Pemograman dan Komputasi FMIPA UNTAN</h1>
</header>
<div style="text-align: end; margin-right: 20px;">
    <h2 id="clock"></h2>
</div>

<!-- awal carousel -->
<div id="carouselExampleControls" class="box1 container-fluid carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <h1 class="mt-1 mb-3" style="font-size: 45px;">Aquaponik</h1>
            <div class="content">
                <div class="box2 me-3">
                    <div class="box3 ms-3" style="margin: auto">
                        <h1 style="color: #ff0000; font-size: 50px;">Sisa Makanan</h1>
                        <h1 id="foodWasteValue" class="mt-3" style="color: #0085ff; font-size: 70px">
                            <span>{{ $latest_aquaponic_data->sisa_makanan }}</span><span>%</span>
                        </h1>
                    </div>
                    <div class="ketinggian_makanan m-4">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="box4">
                    <h1 style="color: #ff0000; font-size: 57px;">Kekeruhan Air</h1>
                    <h1 class="mt-3 mb-1" style="color: #0085ff; font-size: 70px">
                        <span>{{ $latest_aquaponic_data->kekeruhan_air }}</span><span>NTU</span>
                    </h1>
                    <h1 style="color: #000080; font-size: 55px">Air Jernih</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir carousel -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function updateClock() {
        var now = new Date();
        var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var dayOfWeek = days[now.getDay()];
        var date = now.getDate();
        var months = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];
        var month = months[now.getMonth()];
        var year = now.getFullYear();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        document.getElementById("clock").textContent =
            dayOfWeek +
            ", " +
            date +
            " " +
            month +
            " " +
            year +
            " - " +
            hours +
            ":" +
            (minutes < 10 ? "0" : "") +
            minutes +
            ":" +
            (seconds < 10 ? "0" : "") +
            seconds;
        setTimeout(updateClock, 1000);
    }

    function updateChart() {
        const foodWasteElement = document.getElementById("foodWasteValue");
        const foodWasteValue = parseInt(foodWasteElement.textContent, 10);

        const ctx = document.getElementById("myChart");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Sisa Makanan"],
                datasets: [
                    {
                        label: "Sisa Makanan",
                        data: [foodWasteValue],
                        backgroundColor: ["rgba(255, 165, 0, 0.2)"],
                        borderColor: ["rgb(255, 159, 64)"],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 100,
                    },
                },
                maintainAspectRatio: false,
            },
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateClock();
        updateChart();
    });
</script>
</body>
</html>
