@extends('template')

@section('kontent')
<section class="guru">
    <div class="guru-content">
        <div class="card-guru">
            <?php foreach ($data['guru'] as $guru) { ?>
                <?php if($guru->gambar) { ?> 
                    <img class="card-guru-img" src="/images/guru/{{$guru->gambar}}" alt="{{$guru->namaGuru}}">
                <?php } else { ?>
                    <img class="card-news-img" src="/images/no_user.jpg" alt="<?php echo $guru->namaGuru?>">
                <?php } ?>
                <div class="card-guru-desc">
                        <h3>{{$guru->namaGuru}}</h3>
                        <table class="card-guru-table">
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{$guru->nip}}</td>
                            </tr>
                            <tr>
                                <td>NUPTK</td>
                                <td>:</td>
                                <td>{{$guru->nuptk}}</td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td>:</td>
                                <td>{{$guru->tempatLahir.', '.$guru->tanggalLahir }}</td>
                            </tr>
                        </table>
                    </div>
            <?php } ?>            
        </div>
        </div>
        {{ $data['guru']->links('pagination') }}
    </section>
@endsection