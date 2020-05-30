@extends('template')

@section('kontent')
<section class="news">
    <div class="news-content">
            <?php foreach ($data['berita'] as $berita) { ?>
                <div class="card-news" onclick="location.href='/berita/<?php echo $berita->idBerita ?>';" style="cursor: pointer;">
                    <?php if($berita->gambar) { ?> 
                        <img class="card-news-img" src="/images/berita/{{$berita->gambar}}" alt="<?php echo $berita->judulBerita?>">
                    <?php } else { ?>
                        <img class="card-news-img" src="/images/berita/noimage.jpg" alt="<?php echo $berita->judulBerita?>">
                    <?php } ?>
                    
                    <div class="card-news-desc">
                        <h3><?php echo $berita->judulBerita ?></h3>
                        <p><?php echo substr(strip_tags($berita->isiBerita), 0,250); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        {{ $data['berita']->links('pagination') }}
    </section>
@endsection