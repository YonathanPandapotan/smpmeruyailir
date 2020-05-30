<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMP Meruya Ilir 1</title>
    
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/table.css">
    <link rel="shortcut icon" href="/logo.png">
    @yield('upper-script')
</head>
<body>
    <div class="navbar">
        <div onclick="location.href='/';" style="cursor: pointer;" class="brand">
            <img src="/image/logo.png">
            <div class="brand-text-container">
                <h2>SMP Meruya Ilir 1</h2>
                <h1>Untuk Indonesia Lebih Baik</h1>
            </div>
        </div>
                <!-- <a>SMP</a> -->
        <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/berita">Berita</a></li>
            <li><a href="/siswa">Siswa</a></li>
            <li><a href="/guru">Guru</a></li>
            <li><a href="/alumni">Alumni</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/tentang">Tentang kami</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
        <span class="nav-hamburger"></span>
    </div>

    @yield('kontent')

    <section id="footer">
        <div class="footer-nav">
            <ul>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
            </ul>
            <ul>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
            </ul>
            <ul>
                <li><a href="#">Lorem</a>
                    <ul>
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Lorem</a></li>
                    </ul></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Lorem</a></li>
            </ul>
        </div>
        <p>Copyright 2019 &copy; SMP Meruya Ilir 1<br>All Rights Reserved</p>
    </section>
    @yield('script') 
</body>
</html>