<canvas id="absen" width="300"></canvas>

<script type="text/javascript">
var absCanvas = document.getElementById("absen");

Chart.defaults.global.defaultFontFamily = "Arial";
Chart.defaults.global.defaultFontSize = 16;

var absen = {
    labels: [
        "Hadir",
        "Izin",
        "Sakit",
        "Tugas",
        "Tidak Hadir"
    ],
    datasets: [
        {
            data: [20, 3, 2, 1, 4],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ]
        }]
};

var pieChart = new Chart(absCanvas, {
  type: 'pie',
  data: absen
});
</script>