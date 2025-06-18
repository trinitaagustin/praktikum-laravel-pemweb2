<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel App') }}</title>
    <!-- Bootstrap CSS (atau bisa diganti sesuai kebutuhan) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    {{-- Header --}}
    @include('admin.header')

    @include('admin.sidebar')

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('admin.footer')

    <!-- Bootstrap JS (atau framework JS lain jika digunakan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>