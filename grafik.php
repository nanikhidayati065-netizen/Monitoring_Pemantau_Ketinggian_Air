<!DOCTYPE html>
<html>
<head>
    <title>Grafik Ketinggian</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: sans-serif; background: #fff1f2; padding: 20px; }
        .navbar { background: #b91c1c; padding: 15px; text-align: center; margin-bottom: 20px; }
        .navbar a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .box { background: white; padding: 20px; border-radius: 20px; max-width: 1000px; margin: 0 auto; }
    </style>
</head>
<body>
<div class="navbar">
    <a href="index.php">HOME</a>
    <a href="grafik.php">GRAFIK</a>
    <a href="riwayat.php">RIWAYAT DATA</a>
</div>
<div class="box">
    <h3>Grafik Ketinggian Air</h3>
    <canvas id="realtimeChart" height="100"></canvas>
</div>

<script>
    const ctx = document.getElementById('realtimeChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: { labels: [], datasets: [{ label: 'cm', data: [], borderColor: '#b91c1c' }] }
    });

    function updateChart() {
        fetch('api.php')
            .then(res => res.json())
            .then(data => {
                chart.data.labels = data.map(i => i.waktu).reverse();
                chart.data.datasets[0].data = data.map(i => i.ketinggian).reverse();
                chart.update();
            });
    }
    setInterval(updateChart, 2000);
</script>
</body>
</html>