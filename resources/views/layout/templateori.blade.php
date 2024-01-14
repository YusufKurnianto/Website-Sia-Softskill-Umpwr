<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Softskill - Universitas Muhammadiyah Purworejo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-BT1teC2gUdEeHlPofh2EMpsgdveELJc4lTcQEmQw/SPx94Uq+qDZs4ypPDwXPYN1" crossorigin="anonymous">
    <style>
        .custom-sidebar {
            width: 175px;
            background-color: #000;
            border-radius: 0px;
            padding: 15px;
            margin-top: 0px;
            color: #fff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: width 0.5s;
        }

        .sidebar-toggle-text {
            margin-bottom: 20px;
            transition: opacity 0.5s;
        }

        .custom-sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .bawah {
            padding top:
        }

        .custom-sidebar li {
            margin-bottom: 10px;
        }

        .custom-sidebar a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .custom-sidebar a:hover {
            color: #0056b3;
        }

        .main-content {
            margin-right: 0;
            transition: margin-right 0.5s;
        }

        @media (max-width: 767.98px) {
            .custom-sidebar {
                width: 200px;
            }

            .main-content {
                margin-right: 0;
            }
        }

        .sidebar-toggle-btn {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1001;
            color: #fff;
            cursor: pointer;
            margin-bottom: 20px;
            font-size: 30px;
        }

        @media (min-width: 700px) {
            header, nav {
                text-align: center;
            }
            .navbar-nav {
                display: flex;
                justify-content: center;
            }
            .custom-sidebar.collapsed {
                width: 50px;
                background: transparent;
            }

            .main-content {
                margin-left: 187px;
                margin-right: 0px;
            }
        }

        body {
            background-color: #f8f9fa;
            display: flex;
    flex-direction: column;
    min-height: 100vh;
}

        footer {
    margin-top: auto;
}

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        .navbar-nav a {
            color: #fff !important;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color: #0056b3 !important;
        }

        .bg-light {
            background-color: #ffffff !important;
        }

        .btn-primary {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        .btn-primary:hover {
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
        }

        th.col-md-3,
        th.col-md-2 {
            color: #007bff !important;
        }

        th.col-md-3,
        th.col-md-4,
        th.col-md-2,
        th.col-md-3 {
            background-color: #007bff !important;
            color: #ffffff !important;
        }

        .custom-sidebar.collapsed .sidebar-toggle-text,
        .custom-sidebar.collapsed .sidebar-item {
            opacity: 0;
            pointer-events: none;
        }
        .welcome-content {
            text-align: center; /* Menengahkan teks */
        }
        .footer-links {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .footer-links a {
            margin: 0 10px;
            color: #ffffff; /* Warna tulisan putih */
            background-color: #007bff; /* Warna latar belakang biru */
            padding: 5px 10px; /* Padding untuk menyesuaikan tata letak */
            border-radius: 5px; /* Border radius untuk sudut yang lebih lembut */
            text-decoration: none;
        }

        .footer-links a:hover {
            background-color: #0056b3; /* Warna latar belakang biru saat dihover */
        }
    </style>

</head>

<body>



    <div class="sidebar-toggle-btn" onclick="toggleSidebar()">
        &#x2261;
    </div>

    <header class="bg-primary text-white text-center py-3">
        <h1>Sistem Informasi Softskill</h1>
        <p>Universitas Muhammadiyah Purworejo</p>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">Softskill UMP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-12">
                <!-- Pesan Komponen -->
                @include('komponen.pesan')

                <!-- Konten -->
                @yield('konten')
            </main>


            <aside class="col-md-3 custom-sidebar">

                <h5 class="sidebar-toggle-text" style="padding-left: 25px; padding-top: 8px;">Menu</h5>


                <ul>
                
                    <li class="sidebar-item"><a href="/nilai_peserta">Nilai Peserta</a></li>

                    <div class="container mt-4">
                        <!-- Konten lainnya -->
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <!-- Form Logout -->
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary float-end">Logout</button>
                        </form>
                    </div>
                </ul>
            </aside>



        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Universitas Muhammadiyah Purworejo. Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script>
        function toggleSidebar() {
            document.querySelector('.custom-sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('collapsed');
            document.querySelector('.sidebar-toggle-text').classList.toggle('collapsed');
            document.querySelector('.sidebar-toggle-btn').classList.toggle('collapsed');

            // Tambahkan logika untuk menyembunyikan tulisan pada sidebar yang disembunyikan
            const sidebarText = document.querySelector('.sidebar-toggle-text');
            sidebarText.style.opacity = sidebarText.style.opacity === '0' ? '1' : '0';
        }
    </script>

</body>

</html>