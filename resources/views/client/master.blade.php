<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('client.head')
    {{-- @include('js')
    @include('images') --}}

</head>
<body>
        <!-- Page client -->
    <div class="container">

        @include('client.layout.header.header')

        @yield('main')

        @include('client.layout.footer.footer')

    </div>
    <script src="{{ asset('app/js/client.js') }}"></script>
</body>
</html>
