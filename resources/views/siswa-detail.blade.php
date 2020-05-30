@extends('template')

@section('kontent')
<section class="detail-siswa">
    <div class="detail-siswa-content">
        <?php if(!isset($data['siswa'])){?>
            <div class="card-detail-siswa">
                <div class="card-detail-siswa-desc">
                <h2>Siswa tidak ditemukan</h2>
                <p>Maaf kami tidak dapat menemukan siswa yang anda cari</p>
                </div>
            </div>
        <?php } else { ?>
            <div class="card-detail-siswa">
                <?php if($data['siswa']->gambarPeserta) { ?> 
                    <img class="card-detail-siswa-img" src="/images/siswa/{{$data['siswa']->gambarPeserta }}" alt="{{ $data['siswa']->namaPeserta }}">
                <?php } else { ?>
                    <img src="/images/no_user.jpg" class="card-detail-siswa-img">
                <?php } ?>
                <div class="card-detail-siswa-desc">
                    <h3>{{ $data['siswa']->namaPeserta }}</h3>
                    <table class="card-detail-siswa-table">
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->nisn }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal lahir</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->tempatLahir.', '.$data['siswa']->tanggalLahir }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>IX 8</td>
                        </tr>
                        <tr>
                            <td>Walikelas</td>
                            <td>:</td>
                            <td>Rhina .N</td>
                        </tr>
                    </table>
                    <h3>Hasil Nilai</h3>
                    <table class="card-detail-siswa-table">
                        <tr>
                            <td>Bahasa Indonesia</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->bin }}</td>
                        </tr>
                        <tr>
                            <td>Bahasa Inggris</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->ing }}</td>
                        </tr>
                        <tr>
                            <td>Matematika</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->mat }}</td>
                        </tr>
                        <tr>
                            <td>Ilmu Pengetahuan Alam</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->ipa }}</td>
                        </tr>
                        <tr>
                            <td>Nilai Akhir</td>
                            <td>:</td>
                            <td>{{ $data['siswa']->jumlahNilai }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php }?>
    </div>
</section>
@endsection