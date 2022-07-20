
<?php require($_SERVER['DOCUMENT_ROOT']."/PHP/belajar/hitungipk/config.php");

    $jml_matkul = $_GET['jumlah_matkul'];
    $type_n = $_GET['tipe_nilai'];
    $bobot = [];
    $nm_matkul = [];

    if (empty($_GET['jumlah_matkul']) || empty($_GET['tipe_nilai'])){
        header("Location: error.php");
    }

    if (!is_numeric($jml_matkul)){
        header("Location: error.php");
    }

    if ($jml_matkul > 200){
        echo "<script> alert('Maksimal jumlah mata kuliah 200');
                    document.location.href = 'input.php';
              </script>";
        
    } if ($jml_matkul < 1){
        echo "<script> alert('Minimal jumlah mata kuliah 1');
                    document.location.href = 'input.php';
              </script>";
    }

    if(isset($_POST['kirim'])){
        $jml_sks = $_POST['jumlah_sks'];
        $nm_matkul[] = $_POST['nama_matkul'];
        $nilai_m = $_POST['nilai_matkul'];

        if ($type_n == "num"){     
            foreach($nilai_m as $i => $nilai){
                if ($nilai >= 80 and $nilai <=100){
                    $nilai_m[$i] = "A";
                } else if ($nilai >= 73 and $nilai <= 79){
                    $nilai_m[$i] = "AB";
                } else if ($nilai >= 65 and $nilai <= 72){
                    $nilai_m[$i] = "B";
                } else if ($nilai >= 60 and $nilai <= 64){
                    $nilai_m[$i] = "BC";
                } else if ($nilai >= 50 and $nilai <= 59){
                    $nilai_m[$i] = "C";
                } else if ($nilai >= 40 and $nilai <= 49){
                    $nilai_m[$i] = "D";
                } else if ($nilai >= 0 and $nilai <= 39){
                    $nilai_m[$i] = "E";
                }
            }
        }

        foreach($nilai_m as $i => $nilai){
            if ($nilai == 'A'){
                $A = 4;
                $bobot[$i] = $jml_sks[$i]*$A;
            } else if ($nilai == 'AB'){
                $AB = 3.5;
                $bobot[$i] = $jml_sks[$i]*$AB;
            } else if ($nilai == 'B'){
                $B = 3;
                $bobot[$i] = $jml_sks[$i]*$B;   
            } else if ($nilai == 'BC'){
                $BC = 2.5;
                $bobot[$i] = $jml_sks[$i]*$BC;
            } else if ($nilai == 'C'){
                $C = 2;
                $bobot[$i] = $jml_sks[$i]*$C;
            } else if ($nilai == 'D'){
                $D = 1;
                $bobot[$i] = $jml_sks[$i]*$D;
            } else if ($nilai == 'E'){
                $E = 0;
                $bobot[$i] = $jml_sks[$i]*$E;
            }
        }

        $total_bobot = 0;
        $total_sks = 0;

        foreach($bobot as $key => $bbt){
            $total_bobot += $bbt;
            $total_sks += $jml_sks[$key];
        }

        $IP = $total_bobot/$total_sks;


        if ($IP > 3.00){
            $sks_diambil = 24;
        } else  if ($IP <= 3.00 and $IP > 2.00){
            $sks_diambil = 20;
        } else  if ($IP <= 2.00){
            $sks_diambil = 18;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung IPS</title>
    <link rel="stylesheet" type="text/css" href="/PHP/belajar/hitungipk/css/style.css">
</head>
<body>
    <?php if($type_n == "abjad"){?>
        <div class="long-form">
        <form method="post" action="ips.php?jumlah_matkul=<?php echo $jml_matkul?>&tipe_nilai=<?php echo $type_n ?>" autocomplete="off">
        <h2>Hitung IPS menggunakan Penilaian Abjad</h2>
            <?php $j =0; for($i = 0; $i < $jml_matkul; $i++){?>
                <label class="link" >   Mata kuliah ke-<?php echo $j+1?> : </label>
                    <input type="text" name='nama_matkul[]' placeholder="input nama matakuliah" class="textbox">
                <label class="link">   Jumlah SKS : </label>
                    <input type="number" name='jumlah_sks[]' placeholder="input jumlah SKS" class="textbox" required>
                <label class="link">   Nilai : </label>
                <select name='nilai_matkul[]' class="opt" required>
                    <option selected disabled value="" hidden>Select your option</option>
                    <option value="A" >A</option>
                    <option value="AB" >AB</option>
                    <option value="B" >B</option>
                    <option value="BC" >BC</option>
                    <option value="C" >C</option>
                    <option value="D" >D</option>
                    <option value="E" >E</option>				
                </select>
                <br></br>
            <?php $j++; } ?>
        <input type="submit" name="kirim" class="btn" value="Hitung"  <?php if ($jml_matkul == 0){  echo "hidden='hidden'"; } ?>>
        <a class="link" href="input.php">kembali</a>

    <?php } else if($type_n == "num"){ ?>
        <div class="long-form">
        <form method="post" action="ips.php?jumlah_matkul=<?php echo $jml_matkul?>&tipe_nilai=<?php echo $type_n ?>">
            <h2>Hitung IPS menggunakan Penilaian angka</h2>
                <?php $j =0; for($i = 0; $i < $jml_matkul; $i++){?>
                    <label class="link">   Mata kuliah ke-<?php echo $j+1?> : </label>
                    <input type="text" class="textbox" name='nama_matkul[]' placeholder="input nama matakuliah">
                    <label class="link">   Jumlah SKS : </label>
                    <input type="number" class="textbox" name='jumlah_sks[]' placeholder="input jumlah SKS" required>
                    <label class="link">   Nilai : </label>
                    <input type="number" class="textbox" name='nilai_matkul[]' placeholder="input nilai angka" required>
                <br></br>
                <?php $j++; } ?>
            <input class="btn" type="submit" name="kirim" value="Hitung"  <?php if ($jml_matkul == 0){  echo "hidden='hidden'"; } ?>>
            <a class="link" href="input.php">kembali</a>

        <?php } else {
            header("Location: error.php");
        } ?>

        <?php if(isset($_POST['kirim'])){ ?>
            <h3><?php  echo "IPK anda : ".round((float)$IP,2); ?></h3>
            <h3><?php  echo "SKS yang bisa diambil : $sks_diambil SKS"; ?></h3>
           
        <?php } ?>
        </div>
        <p><a class="link-me" href="https://alcupu.carrd.co/"> © 2022 - alcupu</a></p>
    </body>
</html>
