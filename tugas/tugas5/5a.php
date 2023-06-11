<?php
$mahasiswa = [
    [
        'nama' => 'Mahesa Rahdintyo Muhammad',
        'npm' => '223040162',
        'email' => 'mhsmizanin12@gmail.com',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'esaa.jpg'
    ],
    [
        'nama' => 'Kaka Praditha Putra',
        'npm' => '223040087',
        'email' => 'kaka.223040087@mail.unpas.ac.id',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'kakaprdth.jpg'
    ],
    [
        'nama' => 'Dzikri Setiawan',
        'npm' => '223040072',
        'email' => 'dzikri.223040072@mail.unpas.ac.id',
        'jurusan' => 'Teknik Informatika',
        'foto' =>  'masjo.jpg'
    ],
    [
        'nama' => 'Arley Prajaya',
        'npm' => '223040106',
        'email' => 'arleyprajaya11@gmail.com',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'arleyprjy.jpg'
    ],
    [
        'nama' => 'M Rafly Izzudin',
        'npm' => '223040158',
        'email' => 'rafly.2230400158@gmail.com',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'raflyacil.jpg'
    ],
    [
        'nama' => 'Moch Zuhdi Maulana Nabilah',
        'npm' => '223040101',
        'email' => 'zuhdi.223040101@mail.unpas.ac.id',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'mzuhdi.jpg'
    ],
    [
        'nama' => 'Angga Nugraha',
        'npm' => '223040056',
        'email' => 'anggans56@gmail.com',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'anggaewok.jpg'
    ],
    [
        'nama' => 'Muhammad Daffa Mussyaffa',
        'npm' => '223040048',
        'email' => 'daffa.223040048@mail.unpas.ac.id',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'daffasus.jpg'
    ],
    [
        'nama' => 'Aldi Pradana',
        'npm' => '223040035',
        'email' => 'aldi.pradan.hakim26@gmail.com',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'aldiprdn.jpg'
    ],

    [
        'nama' => 'Muhammad Alfath Septian',
        'npm' => '223040014',
        'email' => 'alfath.223040014@mail.unpas.ac.id',
        'jurusan' => 'Teknik Informatika',
        'foto' => 'afatt.jpg'
    ],
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5a</title>
</head>

<body>
    <h2>Daftar mahasiswa</h2>
    <?php foreach ($mahasiswa as $mhsw) { ?>
        <br>
        <ul>
            <li style="list-style:none;">
                <img src="image/<?= $mhsw['foto']; ?>" width="150" height="150" border="5px solid black">
            </li>
            <li>Nama : <?= $mhsw['nama']; ?></li>
            <li>NPM : <?= $mhsw['npm']; ?></li>
            <li>Email : <?= $mhsw['email']; ?></li>
            <li>Jurusan : <?= $mhsw['jurusan']; ?></li>
        </ul>
    <?php } ?>
</body>

</html>