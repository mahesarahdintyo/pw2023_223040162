<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2D</title>
    <style>
        .wrapper {
            height: 500px;
            width: 500px;
        }

        .hitam {
            background-color: black;
            width: 100px;
            height: 100px;
            display: inline-block;
            margin-top: -5px
        }

        .putih {
            background-color: while;
            width: 100px;
            height: 100px;
            display: inline-block;
            margin-top: -5px;
            border: 1.2px solid;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <?php 

        echo'<div class= "wrapper">';
        for($i = 0; $i < 25; $i++){
            if ($i %2 == 0){
            echo '<div class="hitam"></div>';
        }   else {
            echo '<div class="putih"></div>';

        }
    }

    ?>

</body>
</html>