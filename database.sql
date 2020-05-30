

create table siswa(
    idSiswa varchar(25),
    noPeserta varchar(25),
    nisn varchar(10),
    namaPeserta varchar(100),
    tempatLahir varchar(100),
    kelas varchar(10),
    tanggalLahir date,
    bin decimal(4,1),
    ing decimal(4,1),
    mat decimal(4,1),
    ipa decimal(4,1),
    jumlahNilai decimal(4,1),
    statusLulus varchar(10),
    gambarPeserta varchar(100),
    statusSiswa varchar(10),
    pesanAlumni text
);

create table guru(
    idGuru varchar(25),
    namaGuru varchar(100),
    tempatLahir varchar(100),
    tanggalLahir date,
    nip varchar(20),
    nuptk varchar(20),
    gambarGuru varchar(100)
);

create table gallery(
    idGambar varchar(25),
    tanggalUpload date,
    waktuUpload time,
    deskripsi text,
    uploader varchar(100)
);

create table berita(
    idBerita varchar(10),
    judulBerita varchar(100),
    tanggalBerita date,
    waktuBerita time,    
    pembuatBerita varchar(50),
    isiBerita text,
    gambar text
);

create table user(
    idUser varchar(10),
    email varchar(100),
    password text,
    username varchar(100)
);

create table visi(
    visi text,
    gambar text
);

create table misi(
    misi text,
    gambar text
);

create table tentang(
    tentang1 text,
    gambar1 text,
    tentang2 text,
    gambar2 text,
    tentang3 text,
    gambar3 text,
    tentang4 text,
    gambar4 text
);

create table sejarah(
    sejarah1 text,
    gambar1 text,
    sejarah2 text,
    gambar2 text
);

insert into user VALUES
("aadc", "yonabaho@gmail.com", "7815696ecbf1c96e6894b779456d330e", "Yonathan Pandapotan");

insert into visi values
("asd", "asd");

insert into misi values
("asd", "asd");

insert into tentang values
("asd", "asd", "asd", "asd", "asd", "asd", "asd", "asd");

insert into sejarah values
("asd", "asd", "asd", "asd");