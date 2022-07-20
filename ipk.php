<?php require($_SERVER['DOCUMENT_ROOT']."/config.php");
    $jml_smt = $_GET['jumlah_semester'];

    if (empty($_GET['jumlah_semester'])){
        header("Location: error.php");
    }

    if (!is_numeric($jml_smt)){
        header("Location: error.php");
    }

    if ($jml_smt > 14){
        echo "<script> alert('Maksimal jumlah semester 14');
                    document.location.href = 'input.php';
              </script>";
        
    } if ($jml_smt < 1){
        echo "<script> alert('Minimal jumlah semester 1');
                    document.location.href = 'input.php';
              </script>";
    }


    if (isset($_POST['submit'])){
        $_POST['nilai_ips'] = str_replace(',', '.',  $_POST['nilai_ips']);
        $n_ips = $_POST['nilai_ips'];

        $total = 0;

        foreach ($n_ips as $i => $nilai) {
            $total += $nilai;
        }
    
        $IPK = $total/$jml_smt;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitung IPK</title>
    <link rel="stylesheet" type="text/css" href="/PHP/belajar/hitungipk/css/style.css">
</head>
<body>
    <div class="form">
        <form action="ipk.php<?php echo "?jumlah_semester=$jml_smt"?>" method="post" autocomplete="off">
                <h2>Hitung IPK dari nilai IPS</h2>
            <?php $j = 0; for ($i = 0; $i < $jml_smt; $i++): ?>
                <label for="ips" class="link" >Nilai IPS semester ke-<?php echo $j+1 ?> : </label>
                <input type="number" name="nilai_ips[]" class="opt" min="0" max="4" step="any" autofocus placeholder="input number" required>
                <br>
                </br>
            <?php $j++; endfor; ?>
            <input type="submit" name="submit" value="hitung" class="btn">
            <p><a class="link" href="input.php">kembali</a></p>

        <?php if(isset($_POST['submit'])): ?>
            <h3><?php echo "IPK anda : ".round((float)$IPK,2); ?></h3>
        <?php endif; ?>
        </form>
    </div>
    <p><a class="link-me" href="https://alcupu.carrd.co/"> © 2022 - alcupu</a></p>
</body>
</html>
