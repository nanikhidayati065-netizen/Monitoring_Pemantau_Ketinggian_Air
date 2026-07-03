<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%); /* Latar belakang tidak polos */
            min-height: 100vh; display: flex; justify-content: center; align-items: center; margin: 0; 
        }
        .container { 
            background: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(15px); 
            padding: 40px; 
            border-radius: 30px; 
            box-shadow: 0 10px 30px rgba(185, 28, 28, 0.2); 
            text-align: center; 
            max-width: 500px;
            border: 1px solid white;
        }
        h2 { color: #b91c1c; margin-bottom: 25px; }
        .member-card { 
            background: white; margin: 15px 0; padding: 15px; border-radius: 15px; 
            transition: 0.3s; box-shadow: 0 4px 6px rgba(0,0,0,0.05); 
        }
        .member-card:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(185,28,28,0.2); }
        .btn-back { 
            display: inline-block; margin-top: 20px; padding: 10px 25px; 
            background: #b91c1c; color: white; text-decoration: none; border-radius: 25px; 
            transition: 0.3s;
        }
        .btn-back:hover { background: #991b1b; }
    </style>
</head>
<body>

<div class="container">
    <h2><i class="fa fa-users"></i> Tim Pengembang</h2>
    
    <div class="member-card"><strong>Nanik Hidayati</strong><br><small>240602074</small></div>
    <div class="member-card"><strong>Nurul Hikmah</strong><br><small>240602075</small></div>
    <div class="member-card"><strong>M. Muzari Akbar</strong><br><small>240602072</small></div>
    <div class="member-card"><strong>Garin Tri Nugroho</strong><br><small>240602061</small></div>

    <br>
    <a href="index.php" class="btn-back"><i class="fa fa-arrow-left"></i> Kembali ke Dashboard</a>
</div>

</body>
</html>