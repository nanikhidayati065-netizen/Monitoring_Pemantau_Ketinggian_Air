<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Data</title>
    <style>
        body { font-family: sans-serif; background: #fff1f2; padding: 20px; }
        .navbar { background: #b91c1c; padding: 15px; text-align: center; margin-bottom: 20px; }
        .navbar a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .box { background: white; padding: 20px; border-radius: 20px; max-width: 1000px; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; text-align: center; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
<div class="navbar">
    <a href="index.php">HOME</a>
    <a href="grafik.php">GRAFIK</a>
    <a href="riwayat.php">RIWAYAT DATA</a>
</div>
<div class="box">
    <h3>Riwayat Ketinggian Air</h3>
    <table>
        <thead><tr><th>No</th><th>Waktu</th><th>Ketinggian</th><th>Status</th></tr></thead>
        <tbody id="tabel-riwayat"></tbody>
    </table>
</div>

<script>
    function updateTable() {
        fetch('api.php')
            .then(res => res.json())
            .then(data => {
                let html = '';
                data.forEach((item, index) => {
                    html += `<tr><td>${index+1}</td><td>${item.waktu}</td><td>${item.ketinggian}</td><td>${item.status_air}</td></tr>`;
                });
                document.getElementById('tabel-riwayat').innerHTML = html;
            });
    }
    setInterval(updateTable, 2000);
</script>
</body>
</html>