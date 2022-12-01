<?php
include "koneksi.php";
include "functions.php";


if( isset($_POST['submit']) ){

    if(newaccount($_POST) > 0 ){
        echo "
            <script>
                document.location.href = 'signup_success.php';
            </script>
        }
        ";
    }else{
        echo "
            <script>
                alert('Failed to create account...');
                document.location.href = 'signup.php';
            </script>
        ";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:wght@100;200;300;400;500;700&family=Ubuntu:ital,wght@0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
    <title>VoteIt!</title>
    <style>
        body{
            font-family: 'PT Sans', sans-serif;
            line-height: 1.6;
            background-color: rgb(38, 38, 38);
        }
        
    </style>
</head>
<body>

    <div class="header p-3 text-white text-center">
        <div class="justify-content-center">
                <p style="font-size:2vw;"><b>Before starting the &#10024;AMAZING VOTE&#10024;, please fill this out first!</b></p>
            </div>
    </div>

    <div class="bg p-4 mt-1 mb-3 text text-white" style="width:75%; margin: auto;">
            <div class="container">
                <p class="headerp"></p>
                    <div class="datainput">
                        <form action="" class="m-3" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username :</label>
                                <input type="text" class="form-control" name="uname" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                              </div>
                              
                              <div class="mb-3">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" class="form-control" name="pass" placeholder="Password" id="password" aria-label="Password" aria-describedby="basic-addon2" required minlength="8">
                              </div>

                              <div class="mb-3">
                                <label for="formFile" class="form-label">Your photo profile :</label>
                                <input class="form-control" type="file" id="formFile" name="gambar" required>
                            </div>
                              <input class="btn btn-outline-light" type="submit" name="submit" value="Make it!">
                        </form>
                        <br>
                        </div>
                    </div>
            </div>
            
        <div class="bg p-4 text text-center text-white" style="width:75%; margin: auto;">
                <p>Or login with :</p>
                <div style="font-size: 20px;">
                <button type="button" class="btn btn-outline-light" style="border-radius: 50%;"><i class="fa-brands fa-google"></i></button>
            </div>
        </div>


        <img src="img/robek-bawah.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">
    <div class="footer p-3 bg-white text-black text-center">
        <p>© Kelompok15 2022, all right reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>