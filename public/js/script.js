//<script type="text/javascript" src="{{asset('js/script.js')}}"></script>;
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

// gauge kelembaban udara
const gauge2Element = document.querySelector(".gauge2");

function setGauge2Value(gauge) {
    const coverElement = gauge.querySelector(".gauge__cover2 span");
    const value = parseFloat(coverElement.textContent) / 100;
    if (value < 0 || value > 1) {
        return;
    }

    gauge.querySelector(".gauge__fill2").style.transform = `rotate(${
        value / 2
    }turn)`;
}

setGauge2Value(gauge2Element);

// gauge kelembaban tanah
const gaugeElement = document.querySelector(".gauge");

function setGaugeValue(gauge) {
    const coverElement = gauge.querySelector(".gauge__cover span");
    const value = parseFloat(coverElement.textContent) / 100;
    if (value < 0 || value > 1) {
        return;
    }

    gauge.querySelector(".gauge__fill").style.transform = `rotate(${
        value / 2
    }turn)`;
}

setGaugeValue(gaugeElement);

window.onload = function () {
    updateClock();
    updateChart();
};
