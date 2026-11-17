<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Peminjam</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .navbar {
            background: #1e40af;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .navbar h2 {
            margin: 0;
            font-size: 21px;
        }

        .logout button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 10px 17px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout button:hover {
            background: #b91c1c;
        }

        .container {
            max-width: 1150px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 28px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }

        .welcome h2 {
            color: #1e40af;
            margin-top: 0;
        }

        .welcome p {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .statistics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }

        .stat-card h3 {
            color: #64748b;
            font-size: 15px;
            margin-top: 0;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            color: #1e40af;
        }

        .section-title {
            margin-bottom: 17px;
            color: #1e293b;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .menu-card {
            display: block;
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-decoration: none;
            color: #1e293b;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
            transition: .2s;
            border: 1px solid #e2e8f0;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 15px rgba(0,0,0,.10);
        }

        .menu-card .icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .menu-card h3 {
            color: #1e40af;
            margin: 0 0 10px;
        }

        .menu-card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }

        .footer {
            text-align: center;
            color: #64748b;
            padding: 25px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
            }

            .container {
                margin-top: 20px;
            }

            .welcome {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <h2>Dashboard Peminjam</h2>

        <form class="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

    </div>

    <div class="container">

        <!-- SAMBUTAN -->
        <div class="welcome">

            <h2>
                Selamat Datang, {{ auth()->user()->name }}!
            </h2>

            <p>
                Selamat datang di Sistem Informasi Peminjaman Alat.
                Silakan gunakan menu yang tersedia untuk melakukan
                peminjaman dan pengembalian alat.
            </p>

        </div>

        <!-- STATISTIK -->
        <div class="statistics">

            <div class="stat-card">
                <h3>Alat Tersedia</h3>

                <div class="number">
                    {{ $alatTersedia }}
                </div>
            </div>

            <div class="stat-card">
                <h3>Total Transaksi Peminjaman Saya</h3>

                <div class="number">
                    {{ $totalPeminjamanSaya }}
                </div>
            </div>

        </div>

        <!-- MENU UTAMA -->
        <h2 class="section-title">Menu Utama</h2>

        <div class="menu">

            <!-- DAFTAR ALAT -->
            <a href="{{ route('pengguna.alat') }}" class="menu-card">

                <div class="icon">📦</div>

                <h3>Daftar Alat</h3>

                <p>
                    Lihat daftar alat, kategori, kondisi,
                    dan stok alat yang tersedia untuk dipinjam.
                </p>

            </a>

            <!-- PEMINJAMAN SAYA -->
            <a href="{{ route('peminjaman.saya') }}" class="menu-card">

                <div class="icon">📋</div>

                <h3>Peminjaman Saya</h3>

                <p>
                    Lihat riwayat peminjaman dan status
                    pengajuan alat yang sudah dilakukan.
                </p>

            </a>

            <!-- PENGEMBALIAN ALAT -->
            <a href="{{ route('pengembalian.peminjam.index') }}" class="menu-card">

                <div class="icon">↩️</div>

                <h3>Pengembalian Alat</h3>

                <p>
                    Ajukan pengembalian alat, isi catatan transaksi,
                    pilih kondisi alat, dan lihat riwayat pengembalian.
                </p>

            </a>

        </div>

    </div>

    <!-- FOOTER -->
    <div class="footer">
        @ Yasmin Firda
    </div>

</body>
</html>
