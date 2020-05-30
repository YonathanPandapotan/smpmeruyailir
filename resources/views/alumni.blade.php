@extends('template')

@section('kontent')
<section class="student">
    <div class="student-content">
        <?php foreach ($data['alumni'] as $alumni) { ?>
            <div class="card-student">
                <?php if($alumni->gambarPeserta) { ?> 
                    <img class="card-student-img" src="/images/siswa/{{$alumni->gambarPeserta}}" alt="{{$alumni->namaPeserta}}">
                <?php } else { ?>
                    <img class="card-student-img" src="/images/no_user.jpg" alt="<?php echo $alumni->alumni?>">
                <?php } ?>
                <div class="card-student-desc">
                        <h3><?php echo $alumni->namaPeserta ?></h3>
                        <p><?php echo $alumni->pesanAlumni ?></p>
                </div>
            </div>
        <?php } ?>  
        </div>
        {{ $data['alumni']->links('pagination') }}
    </section>
@endsection