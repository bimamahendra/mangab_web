<canvas id="absen" width="300"></canvas>

<?php foreach ($dataout as $data){
    $a = $data->a;
    $m = $data->m;
    $s = $data->s;
    $i = $data->i;
}?>

<script type="text/javascript">
var absCanvas = document.getElementById("absen");

Chart.defaults.global.defaultFontFamily = "Arial";
Chart.defaults.global.defaultFontSize = 16;

var absen = {
    labels: [
        "Tidak Hadir",
        "Hadir",
        "Sakit",
        "Izin"
    ],
    datasets: [
        {
            data: [<?php echo $a .",". $m .",". $s .",". $i ?>],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
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