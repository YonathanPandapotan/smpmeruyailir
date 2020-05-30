@extends('template')

@section('kontent')
<section class="detail-berita">
<div class="card-detail-berita">
        <div class="card-detail-berita-desc">
            <h3><?php echo $data['berita']->judulBerita ?></h3>
            <div class="card-detail-berita-desc-header">
                <!-- <a href="#berita">Kembali</a> -->
                <p>Penulis: </p>
                <p><?php echo $data['berita']->pembuatBerita ?></p>
                <p>Tanggal: </p>
                <p>{{ date('d-m-Y', strtotime($data['berita']->tanggalBerita)) }}, <?php echo $data['berita']->waktuBerita ?></p>
            </div>

            <?php if($data['berita']->gambar) { ?> 
                <img class="card-detail-berita-img" src="/images/berita/{{ $data['berita']->gambar }}" alt="<?php echo $data['berita']->judulBerita?>">
            <?php } else { ?>
                <img class="card-detail-berita-img" src="/images/berita/noimage.jpg" alt="<?php echo $data['berita']->judulBerita?>">
            <?php } ?>
            
            <p><?php echo $data['berita']->isiBerita ?></p>
        </div>
    </div>
</section>
@endsection
