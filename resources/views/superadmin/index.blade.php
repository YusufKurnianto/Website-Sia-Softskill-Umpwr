@extends('layout.superadmin')

@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-BT1teC2gUdEeHlPofh2EMpsgdveELJc4lTcQEmQw/SPx94Uq+qDZs4ypPDwXPYN1" crossorigin="anonymous">
    <style>
        .main-content {
            margin-right: 0;
            transition: margin-right 0.5s;
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

        .bg-dark {
            background-color: #343a40 !important; /* Warna latar belakang navbar */
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

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-12 welcome-content">
                <h1>Selamat Datang Di Sistem Informasi Softskill Universitas Muhammadiyah Purworejo</h1>
                <br>
                <div class="footer-links">
                    <a href="/nilai_peserta">Fasilitator</a>
                </div>
                <div class="footer-links">
                    <a href="/peserta">Peserta</a>
                </div>
                <div class="footer-links">
                    <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary float-end">Logout</button>
                </form>
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Universitas Muhammadiyah Purworejo. Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>

@endsection
