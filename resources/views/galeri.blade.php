@extends('template')

@section('kontent')
<section id="galleri">
    <h1 class="title">Galeri</h1>

    <div class="gallery-container" id="images">
        <?php
            foreach ($data['gallery'] as $gallery) {?>
            <div class="card-galleri"><div class="img"><img src="/images/gallery/{{$gallery->idGambar}}" alt="{{$gallery->deskripsi}}"></div></div>
            <?php } ?>
    </div>
    {{ $data['gallery']->links('pagination') }}
</section>
@endsection

@section('upper-script')
    <link rel="stylesheet" href="https://unpkg.com/viewerjs/dist/viewer.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://unpkg.com/viewerjs/dist/viewer.js"></script>
    <script src="https://fengyuanchen.github.io/jquery-viewer/js/jquery-viewer.js"></script>
@endsection

@section('script')
<script>
    $('#images').viewer();
</script>
@endsection