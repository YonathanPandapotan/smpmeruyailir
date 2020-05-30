@extends('template')

@section('kontent')
<section class="student" style="margin-top: 100px;">
    <form class="form" action="/carisiswa?nisn={nisn}" method="get" style="width: 25%;">
        <label>Cari Siswa</label>
        <input class="form-control" type="text" placeholder="NISN" aria-label="Search" name="nisn" required>
        <button type="submit" class="page">Simpan</button>
    </form>
    <div class="table-responsive-vertical">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
                <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['siswa'] as $siswa) { ?>
                    <tr onclick="location.href='/siswa/{{ $siswa->idSiswa}}';" style="cursor: pointer;">
                    <td data-title="NISN">{{ $siswa->nisn }}</td>
                    <td data-title="Nama">{{ $siswa->namaPeserta }}</td>
                    <td data-title="Tempat, Tanggal Lahir">{{ $siswa->tempatLahir.', '.$siswa->tanggalLahir }}</td>
                    <?php if($siswa->gambarPeserta) { ?> 
                        <td data-title="Foto" style="padding-top: 10px; padding-bottom: 10px"><img style="width: 50px;height: 50px" src="/images/siswa/{{$siswa->gambarPeserta}}" alt="<?php echo $siswa->namaPeserta?>"></td>
                    <?php } else { ?>
                        <td data-title="Foto" style="padding-top: 10px; padding-bottom: 10px"><img style="width: 50px;height: 50px" src="/images/no_user.jpg" alt="<?php echo $siswa->namaPeserta?>"></td>
                    <?php } ?>
                    </tr>
                <?php } ?>
        </table>
    </div>
    
    {{ $data['siswa']->links('pagination') }} 
</section>
@endsection

@section('script')
<script>
        $(document).ready(function() {

var table = $('#table');

// Table bordered
$('#table-bordered').change(function() {
    var value = $( this ).val();
    table.removeClass('table-bordered').addClass(value);
});

// Table striped
$('#table-striped').change(function() {
    var value = $( this ).val();
    table.removeClass('table-striped').addClass(value);
});

// Table hover
$('#table-hover').change(function() {
    var value = $( this ).val();
    table.removeClass('table-hover').addClass(value);
});

// Table color
$('#table-color').change(function() {
    var value = $(this).val();
    table.removeClass(/^table-mc-/).addClass(value);
});
});

// jQuery’s hasClass and removeClass on steroids
// by Nikita Vasilyev
// https://github.com/NV/jquery-regexp-classes
(function(removeClass) {

jQuery.fn.removeClass = function( value ) {
    if ( value && typeof value.test === "function" ) {
        for ( var i = 0, l = this.length; i < l; i++ ) {
            var elem = this[i];
            if ( elem.nodeType === 1 && elem.className ) {
                var classNames = elem.className.split( /\s+/ );

                for ( var n = classNames.length; n--; ) {
                    if ( value.test(classNames[n]) ) {
                        classNames.splice(n, 1);
                    }
                }
                elem.className = jQuery.trim( classNames.join(" ") );
            }
        }
    } else {
        removeClass.call(this, value);
    }
    return this;
}

})(jQuery.fn.removeClass);
    </script>
@endsection