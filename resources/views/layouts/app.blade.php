
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Clinic Patient Records')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        /* GENERAL */
        body {
            background-color: #f4f7fb;
            font-family: Arial, sans-serif;
            font-size: 15px;
            margin: 0;
        }

        /* MAIN CONTENT SIZE */
        .main-container {
            max-width: 1140px;
            width: 100%;
            margin: 35px auto;
            padding: 0 15px;
        }

        /* NAVIGATION BAR */
        .navbar {
            background-color: #0d6efd !important;
            min-height: 58px;
            padding: 8px 0;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        }

        .card-body {
            padding: 24px;
        }

        /* HEADINGS */
        h2 {
            font-size: 32px;
            font-weight: bold;
        }

        h5 {
            font-size: 18px;
        }

        /* TABLE */
        .table {
            font-size: 14px;
            margin-bottom: 0;
        }

        .table th,
        .table td {
            padding: 12px 10px;
            vertical-align: middle;
        }

        .table thead th {
            font-weight: 600;
            white-space: nowrap;
        }

        /* BUTTONS AND INPUTS */
        .form-control {
            font-size: 14px;
            min-height: 38px;
        }

        .btn {
            font-size: 14px;
            padding: 8px 14px;
        }

        .btn-sm {
            font-size: 13px;
            padding: 5px 10px;
        }

        /* PAGINATION */
        .pagination {
            margin-bottom: 0;
        }

        .page-link {
            font-size: 14px;
        }

        /* MOBILE RESPONSIVENESS */
        @media (max-width: 768px) {

            .main-container {
                margin: 25px auto;
                padding: 0 12px;
            }

            .navbar-brand {
                font-size: 18px;
            }

            h2 {
                font-size: 26px;
            }

            .card-body {
                padding: 18px;
            }

            .table {
                min-width: 750px;
            }
        }

        @media (max-width: 480px) {

            .navbar .container {
                flex-wrap: wrap;
                gap: 10px;
            }

            .navbar .ms-auto {
                width: 100%;
            }

            .navbar .ms-auto .btn {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">

        <div class="container">

            <a class="navbar-brand" href="{{ route('patients.index') }}">
                Clinic Patient Records
            </a>

            <div class="ms-auto">

                <a href="{{ route('patients.index') }}"
                   class="btn btn-outline-light btn-sm me-2">
                    Patient List
                </a>

                <a href="{{ route('patients.create') }}"
                   class="btn btn-light btn-sm">
                    + Register Patient
                </a>

            </div>

        </div>

    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-container">

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>

            </div>

        @endif

        <!-- VALIDATION ERRORS -->
        @if ($errors->any())

            <div class="alert alert-danger" role="alert">

                <strong>Please correct the following errors:</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <!-- PAGE CONTENT -->
        @yield('content')

    </main>

    <!-- BOOTSTRAP JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
