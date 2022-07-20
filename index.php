
<?php require($_SERVER['DOCUMENT_ROOT']."config.php"); 

    if (isset($_POST["submit"])){
        $pil = $_POST["choose"];

        $_SESSION['tipe'] = $pil;
        if(!empty($pil)){
            $_SESSION['tipe'] = $pil;
            header("Location: input.php");
        } 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung IPK dan IPS anda</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <div class="form"> 
    <form method="post">
        <h2>Pilih salah satu yang akan di hitung</h2>
        <select name="choose" placeholder="adw" class="opt" required>
            <option selected disabled value="" hidden>Select your option</option>
            <option value="ipk">IPK</option>
            <option value="ips">IPS</option>
        </select>
        <input type="submit" name="submit" value="submit" class="btn">
    </div>
    <p><a class="link-me" href="https://alcupu.carrd.co/"> © 2022 - alcupu</a></p>
</body>
</html>
