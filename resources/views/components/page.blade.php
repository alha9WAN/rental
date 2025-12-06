<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LombokRentHub - Kurasi Terbaik Sewa Mobil & Motor di Lombok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    {{-- link css  --}}
<link rel="stylesheet" href="{{ asset('css-web/index.css') }}">

{{-- css blog --}}
<link rel="stylesheet" href="{{ asset('css-web/blog.css') }}">



{{-- css blog 2--}}
<link rel="stylesheet" href="{{ asset('css-web/blog2.css') }}">


{{-- css carpoll --}}
<link rel="stylesheet" href="{{ asset('css-web/listcarpool.css') }}">




    {{-- CSS Khusus per halaman --}}
@if (Request::is('mobil*'))
    <link rel="stylesheet" href="{{ asset('css-web/listmobil.css') }}">
@elseif (Request::is('motor*'))
    <link rel="stylesheet" href="{{ asset('css-web/listmotor.css') }}">
@elseif (Request::is('voucher*'))
    <link rel="stylesheet" href="{{ asset('css-web/listvoucher.css') }}">
@endif






</head>

<body class="font-sans bg-white text-dark">

 {{-- bagian header --}}
@include('components.header')


{{-- bagian content --}}
@yield('content')

     {{-- footer --}}
  @include('components.footer')



{{-- link js --}}
<script src="{{ asset('js-web/index.js') }}"></script>

{{-- js blog --}}
<script src="{{ asset('js-web/blog.js') }}"></script>



</body>
</html>








