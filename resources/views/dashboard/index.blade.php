<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('components.navbar')
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
        <div class="carousel-item" data-bs-interval="5000">
            <div class="container">
                <h1 class="mt-2" style="font-size: 45px">Pertanian Cabe</h1>
                <div class="status-container">
                    <div class="status-item">
                        <h2>Kelembaban Udara <br> (%)</h2>
                        <div class="gauge2">
                            <div class="gauge__body2">
                                <div class="gauge__fill2"></div>
                                <div class="gauge__cover2">
                                    <span>{{ $latest_pertanian_data->kelembaban_udara }}</span><span>%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h2>Pompa</h2>
                        <div class="pump-status" id="pump-status">ON</div>
                    </div>
                    <div class="moisture-container">
                        <h2>Kelembaban Tanah <br> (%)</h2>
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill"></div>
                                <div class="gauge__cover">
                                    <span>{{ $latest_pertanian_data->kelembaban_tanah }}</span><span>%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- akhir carousel -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
