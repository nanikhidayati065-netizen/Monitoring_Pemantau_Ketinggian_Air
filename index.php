<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Monitoring</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-bg: #1e293b; --bg-color: #f1f5f9; --accent: #b91c1c; }
        body { font-family: 'Inter', sans-serif; background: var(--bg-color); margin: 0; display: flex; }

        /* Sidebar */
        #sidebar { width: 260px; height: 100vh; background: var(--sidebar-bg); color: #cbd5e1; position: fixed; padding: 20px; transition: 0.3s; z-index: 1000; }
        #sidebar.hidden { margin-left: -260px; }
        .sidebar-header { text-align: center; margin-bottom: 30px; border-bottom: 1px solid #334155; padding-bottom: 20px; }
        .menu-item { display: flex; align-items: center; padding: 15px; color: #94a3b8; text-decoration: none; border-radius: 10px; transition: 0.3s; margin-bottom: 5px; }
        .menu-item:hover, .active { background: #334155; color: white; }
        .menu-item i { margin-right: 15px; width: 20px; }

        /* Main Content */
        #main { margin-left: 260px; padding: 30px; width: 100%; transition: 0.3s; }
        #main.full { margin-left: 0; }
        
        /* Header & Hamburger */
        .header-wrapper { display: flex; align-items: center; gap: 20px; margin-bottom: 30px; }
        .hamburger { cursor: pointer; font-size: 24px; color: var(--sidebar-bg); }
        
        /* Stats */
        .stats-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
        .card { background: white; padding: 25px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-left: 5px solid var(--accent); }
        .card-label { color: #64748b; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; }
        .card-value { font-size: 2rem; font-weight: 800; color: #1e293b; margin-top: 10px; }
    </style>
</head>
<body>

<div id="sidebar">
    <div class="sidebar-header">
        <img src="logo.jpg" style="width: 50px; border-radius: 50%; margin-bottom: 10px;">
        <h4 style="color: white; margin: 0; line-height: 1.4;">Sistem Pemantau Ketinggian Air Berbasis IoT</h4>
    </div>
    <a href="index.php" class="menu-item active"><i class="fa fa-home"></i> Dashboard</a>
    <a href="grafik.php" class="menu-item"><i class="fa fa-chart-line"></i> Grafik Data</a>
    <a href="riwayat.php" class="menu-item"><i class="fa fa-table"></i> Riwayat Data</a>
    <a href="anggota.php" class="menu-item"><i class="fa fa-users"></i> Anggota</a>
</div>

<div id="main">
    <div class="header-wrapper">
        <div class="hamburger" onclick="toggleSidebar()"><i class="fa fa-bars"></i></div>
        <h2 style="margin: 0;">Dashboard Utama</h2>
    </div>

    <div class="stats-container">
        <div class="card">
            <div class="card-label"><i class="fa fa-water" style="color: var(--accent);"></i> Ketinggian Air</div>
            <div class="card-value"><span id="live-cm">0</span> <small style="font-size: 1rem;">cm</small></div>
        </div>
        <div class="card">
            <div class="card-label"><i class="fa fa-info-circle" style="color: var(--accent);"></i> Status Air</div>
            <div id="live-status" class="card-value" style="font-size: 1.5rem;">Memuat...</div>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('hidden');
        document.getElementById('main').classList.toggle('full');
    }

    function updateLive() {
        fetch('ambil_data.php')
            .then(res => res.json())
            .then(data => {
                document.getElementById('live-cm').innerText = data.cm;
                document.getElementById('live-status').innerText = data.status;
                let color = data.status === 'Bahaya' ? '#b91c1c' : (data.status === 'Sedang' ? '#d97706' : '#059669');
                document.getElementById('live-status').style.color = color;
            });
    }
    setInterval(updateLive, 2000);
</script>
</body>
</html>