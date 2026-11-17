<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .container {
            max-width: 1150px;
            margin: auto;
        }

        .header {
            background: #1e40af;
            color: white;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 5px 0;
        }

        .logout {
            background: #dc2626;
            color: white;
            border: 0;
            padding: 11px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
            margin: 25px 0;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }

        .stat-card h3 {
            margin: 0 0 12px;
            color: #64748b;
            font-size: 14px;
        }

        .stat-card strong {
            font-size: 30px;
            color: #1e40af;
        }

        .section-title {
            margin: 30px 0 15px;
        }

        .menus {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
        }

        .menu-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }

        .menu-card h3 {
            margin-top: 0;
            color: #1e40af;
        }

        .menu-card p {
            color: #64748b;
            line-height: 1.5;
            min-height: 45px;
        }

        .menu-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #1e40af;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
        }

        .menu-link:hover {
            background: #1d4ed8;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .header {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Dashboard Petugas</h1>

            <p>
                Selamat datang, {{ auth()->user()->name }}.
            </p>

            <p>
                Kelola peminjaman dan pantau pengembalian alat.
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>

    </div>


    {{-- STATISTIK --}}
    <div class="stats">

        <div class="stat-card">
            <h3>Total Peminjaman</h3>
            <strong>{{ $totalPeminjaman }}</strong>
        </div>

        <div class="stat-card">
            <h3>Menunggu Persetujuan</h3>
            <strong>{{ $totalMenunggu }}</strong>
        </div>

        <div class="stat-card">
            <h3>Peminjaman Disetujui</h3>
            <strong>{{ $totalDisetujui }}</strong>
        </div>

        <div class="stat-card">
            <h3>Total Pengembalian</h3>
            <strong>{{ $totalPengembalian }}</strong>
        </div>

    </div>


    {{-- MENU --}}
    <h2 class="section-title">Menu Pengelolaan</h2>

    <div class="menus">

        <div class="menu-card">
            <h3>Data Peminjaman</h3>

            <p>
                Lihat pengajuan peminjaman dan setujui atau tolak
                pengajuan dari peminjam.
            </p>

            <a href="{{ route('peminjaman.index') }}" class="menu-link">
                Kelola Peminjaman
            </a>
        </div>


        <div class="menu-card">
            <h3>Data Pengembalian</h3>

            <p>
                Pantau riwayat pengembalian alat, kondisi alat,
                dan denda keterlambatan.
            </p>

            <a href="{{ route('pengembalian.index') }}" class="menu-link">
                Lihat Pengembalian
            </a>
        </div>


        <div class="menu-card">
            <h3>Laporan dan Nota</h3>

            <p>
                Lihat laporan transaksi, total pengembalian,
                denda, serta cetak laporan dan nota.
            </p>

            <a href="{{ route('laporan.petugas.index') }}" class="menu-link">
                Buka Laporan
            </a>
        </div>

    </div>


    <div class="footer">
        @ Yasmin Firda
    </div>

</div>

</body>
</html>
