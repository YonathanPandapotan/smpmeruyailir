@extends('template')

@section('kontent')
<section id="slider">
    <button class="prev-arrow"></button>
    <button class="next-arrow"></button>
    <div class="slider-container">
        <?php foreach ($data['berita'] as $berita) {
            if($berita->gambar != null) {?>
                <div class="card-slider" style="background-image: url('/images/berita/{{$berita->gambar}}')">
            <?php } else{?>
                <div class="card-slider" style="background-image: url('/images/berita/noimage.jpg')">
            <?php } ?>
                <div class="card-slider-desc">
                    <h1><?php echo $berita->judulBerita ?></h1>
                    <p> <?php echo substr(strip_tags($berita->isiBerita), 0, strpos($berita->isiBerita, ".")); ?></p>
                    <a href="#detail">Detail</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<section id="tentang">
        <h1 class="title">Tentang Kami</h1>
        <div class="card-tentang noreverse">
            <div class="card-tentang-img">
                <div class="card-tentang-img img" style="background-image: url('/images/tentang/{{$data['tentang']->gambar1}}');"></div>
                <div class="card-tentang-img overlay"></div>
            </div>
            <div class="card-tentang-description">
                <p><?php echo $data['tentang']->tentang1; ?></p>
                <a href="./tentang">Selengkapnya</a>
            </div>
        </div>
        <div class="card-tentang reverse">
            <div class="card-tentang-img">
                <div class="card-tentang-img img" style="background-image: url('/images/tentang/{{$data['tentang']->gambar2}}');"></div>
                <div class="card-tentang-img overlay"></div>
            </div>
            <div class="card-tentang-description">
                <p><?php echo $data['tentang']->tentang2; ?></p>
                <a href="./tentang">Selengkapnya</a>
            </div>
        </div>
        <div class="card-tentang noreverse">
                <div class="card-tentang-img">
                    <div class="card-tentang-img img" style="background-image: url('/images/tentang/{{$data['tentang']->gambar3}}');"></div>
                    <div class="card-tentang-img overlay"></div>
                </div>
                <div class="card-tentang-description">
                    <p><?php echo $data['tentang']->tentang3; ?></p>
                    <a href="./tentang">Selengkapnya</a>
                </div>
            </div>
            <div class="card-tentang reverse">
                <div class="card-tentang-img">
                    <div class="card-tentang-img img" style="background-image: url('/images/tentang/{{$data['tentang']->gambar4}}');"></div>
                    <div class="card-tentang-img overlay"></div>
                </div>
                <div class="card-tentang-description">
                    <p><?php echo $data['tentang']->tentang4; ?></p>
                    <a href="./tentang">Selengkapnya</a>
                </div>
            </div>
     
</section>
<section id="galeri">
    <h1 class="title">Galeri</h1>
    <div class="gallery-container">
            <?php foreach ($data['gallery'] as $gallery) {?>
                <div class="card-gallery"><div class="img" style="background-image: url('/images/gallery/{{$gallery->idGambar}}');"></div></div>
            <?php } ?>
    </div>
    <div class="more-container">
        <a class="more" href="/gallery">Selengkapnya</a>
    </div>
</section>
<section id="alumni">
        <h1 class="title">Alumni</h1>
        <div class="alumni-content">
            <div class="alumni-content-left">
                <h1>Testimoni<br><span>Alumni</span></h1>
                <p>Cari tau kesuksesan sekolah kami dengan testimoni dari alumni-alumni sekolah SMP Meruya Ilir 1</p>
                <a href="/alumni">Selengkapnya</a>
            </div>
            <div class="alumni-content-right">

                <?php foreach ($data['alumni'] as $alumni) { ?>
                    <div class="card-alumni">
                    <?php if($alumni->gambar) { ?> 
                        <img class="card-student-img" src="/images/alumni/{{$alumni->gambar}}" alt="{{$alumni->namaAlumni}}">
                    <?php } else { ?>
                        <img class="card-student-img" src="/images/no_user.jpg" alt="<?php echo $alumni->alumni?>">
                    <?php } ?> 
                    <div class="card-alumni-desc">
                        <h3><?php echo $alumni->namaAlumni ?></h3>
                        <p><?php echo $alumni->testimoni ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
</section>
@endsection


@section('script')

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/scrollmagic.min.js"></script>
<script src="/js/animation.gsap.min.js"></script>
<script src="/js/debug.addIndicator.min.js"></script>
<script src="/js/main.js"></script>
@endsection