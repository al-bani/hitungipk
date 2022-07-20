<?php require($_SERVER['DOCUMENT_ROOT']."/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input data</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php if ($_SESSION['tipe'] == "ips") { ?>
    <div class="medium-form">
    <form method="get" action="ips.php">
        <h2>Menghitung IPS anda</h2>
        <label for="jumlah_matkul" class="link" >Jumlah mata kuliah : </label>
        <input class="textbox" type="Number" name="jumlah_matkul" min="1" max="200" placeholder="input number" required>
        <label for="tipe_nilai" class="link">Tipe Penilaian : </label>
        <select class="opt" name ="tipe_nilai" required>
            <option selected disabled value="" hidden>Select your option</option>
            <option value="num" >Nilai angka</option>
            <option value="abjad">Nilai abjad</option>
        </select>
        <input type="submit" class="btn">
        <p> <a class="link"href="/PHP/belajar/hitungipk/">kembali</a></p>
    </form>
    </div>
   
<?php } else if ($_SESSION['tipe'] == "ipk"){ ?>
    <div class="form">
    <form method="get" action="ipk.php">
        <h2>Menghitung IPK anda</h2>
        <label for="jumlah_semester" class="link" >Masukkan Jumlah semester : </label>
        <input class="textbox" type="Number" name="jumlah_semester" max="14" min="1" placeholder="input number" autofocus required>
        <input type="submit" class="btn">
        <p> <a class="link"href="/PHP/belajar/hitungipk/">kembali</a></p>
    </form>
    </div>
<?php } ?>
   
<p><a class="link-me" href="https://alcupu.carrd.co/"> © 2022 - alcupu</a></p>
</body>
</html>
