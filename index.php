<?php
    include_once "includes/db_functions.php";
    include_once "includes/helpers.php";

    $max_sual_sayi = db_get_question_count();
    $error_msg_array = [];

    if(!empty($_GET)) {
        $adsoyad = read_input("adsoyad");
        $sual_sayi = read_input("sual_sayi");

        if($adsoyad == "") {
            $error_msg_array['adsoyad'] = "Adınızı daxil edin";
        }

        if($sual_sayi <= 0) {
            $error_msg_array['sual_sayi'] = "Sual sayı daxil edilməyib";
        }

        if($sual_sayi > $max_sual_sayi) {
            $error_msg_array['sual_sayi'] = "Maksimum sual sayı $max_sual_sayi olmalıdır";
        }

        if(count($error_msg_array) == 0) {
            header("location:exam.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/login.css">

    <script src="js/jquery-3.2.1.min"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        .circle-div {
            display: inline-block;
            border: 3px solid #56a507;
            width: 100px;
            height: 100px;           
            background-color: #7fff00;
        }
        .right {
            border-radius: 10px 40px; 
        }
        .left{
            border-radius: 40px 10px; 
        }
    </style>

    <script>
        var max_sual_sayi = <?= $max_sual_sayi?>;
    </script>

    <title>Document</title>
</head>

<body>
    <!-- <div class="circle-div left"></div>
    <div class="circle-div right"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                    if(count($error_msg_array)) {
                        echo "<ul>";
                        foreach ($error_msg_array as $item) {
                            echo "<li>$item</li>";
                        }
                        echo "</ul>";
                    }
                ?>
                <form action="." method="get" class="form">
                    <div class="form-group">
                        <label for="" class="control-label">Ad soyad</label>
                        <input name='adsoyad' type="text" class="form-control" value="<?=isset($adsoyad) ? $adsoyad : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Sual sayı</label>
                        <input name='sual_sayi' type="number" class="form-control" max=<?=$max_sual_sayi?> value="<?=isset($sual_sayi) ? $sual_sayi : ""?>">
                    </div>
                    <div class="form-group">
                        <input name='submit' type="submit" class="btn btn-success" style="width:100%" value="İMTAHANA BAŞLA">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>