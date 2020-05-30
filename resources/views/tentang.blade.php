@extends('template')

@section('kontent')
<section id="tentang-sekolah">
    <h1 class="title">Sejarah Sekolah</h1>
    <div class="card-tentang-sekolah noreverse">
        <div class="card-tentang-sekolah-img">
            <div class="card-tentang-sekolah-img img" style="background-image: url('/images/sejarah/{{$data['sejarah']->gambar1}}');"></div>
            <div class="card-tentang-sekolah-img overlay"></div>
        </div>
        <div class="card-tentang-sekolah-description">
            <p>
                <?php echo $data['sejarah']->sejarah1; ?>
            </p>
        </div>
    </div>
    <div class="card-tentang-sekolah reverse">
        <div class="card-tentang-sekolah-img">
            <div class="card-tentang-sekolah-img img" style="background-image: url('/images/sejarah/{{$data['sejarah']->gambar2}}');"></div>
            <div class="card-tentang-sekolah-img overlay"></div>
        </div>
        <div class="card-tentang-sekolah-description">
            <p>
                    <?php echo $data['sejarah']->sejarah2; ?>
            </p>
        </div>
    </div>
    <h1 class="title">Visi</h1>
    <div class="card-visi-misi noreverse">
            <div class="card-visi-misi-img">
                <div class="card-visi-misi-img img" style="background-image: url('/images/visi/{{$data['visi']->gambar}}');" ></div>
                <div class="card-visimisi-img overlay"></div>
            </div>
            <div class="card-visi-misi-description">
                <p>
                    <?php echo $data['visi']->visi; ?>
                </p>
            </div>
        </div>
        <h1 class="title">Misi</h1>
    <div class="card-visi-misi reverse">
            <div class="card-visi-misi-img">
                <div class="card-visi-misi-img img" style="background-image: url('/images/misi/{{$data['misi']->gambar}}');" ></div>
                <div class="card-visimisi-img overlay"></div>
            </div>
            <div class="card-visi-misi-description">
                <p>
                    <?php echo $data['misi']->misi; ?>
                </p>
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