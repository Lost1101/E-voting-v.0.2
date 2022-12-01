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

        .judul{
            font-family: 'Raleway', sans-serif;
        }

        .nav-link{
            color: rgb(0, 0, 0);
            transition: 0.2s ease-in-out 0s;
            text-decoration: none;
        }

        .nav-link:hover{
            color: rgb(250, 139, 2);
        }

        .fitur{
            width: 400px;
            height: 400px;
            margin: auto;
            padding: 5px;
            color: white;
        }
        
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white" style="margin: auto; width: 100%;">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-bold">
                <li class="nav-item">
                    <a class="nav-link" href="#About">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Login/Sign-up">Login/Sign up</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>

        <div class="header p-3 bg-white text-black text-center">
            <div class="justify-content-center">
                <img src="img/judul.png" alt="" style="width: 20vw;">
                <p style="font-size:1.5vw;"><b>"Voting together is the way to advance democracy"</b></p>
            </div>
        </div>
        <img src="img/robek-atas.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0; margin-bottom:30px;">

    <div id="About" class="section mb-5">
        <h1 class="fw-bold text-white text-center m-3 p-3" style="font-size: 40px; padding: 5px;">About</h1>
            <div class="text-white text-center justify-content-center align-items-center m-3 p-2">
                <p style="font-size: 30px; display:inline">Welcome to <p style="font-size:40px;color:chocolate; display:inline">VOTEit!</p>.<p style="font-size:30px; display:inline;"> You can vote anything here with no idea limits! and you can vote with friends</p> 
                <p style="font-size: 30px;">or...<p style="font-size:40px;color:chocolate; display:inline">THE WORLD!</p>.</p>
            </div>
    </div>

    <div id="Features" class="section">
    <h1 class="fw-bold text-white text-center p-3" style="font-size: 40px;">Features</h1>

            <div class="header d-flex align-items-baseline text-white text-center">
                <div class="fitur d-flex flex-column m-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-outline-light m-2 text-center" style="border-radius: 50%; font-size: 35px; width: 70px; height: 70px;"><i class="fa-solid fa-user-pen"></i></button>
                    <p class="m-3 w-75" style="font-size: 28px;"><b>You are the admin for yourself</b></p>
                    <p style="font-size: 20px;">You can create, edit, delete your own vote even as a user</p>
                </div>

                <div class="fitur d-flex flex-column m-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-outline-light m-2 text-center" style="border-radius: 50%; font-size: 35px; width: 70px; height: 70px;"><i class="fa-solid fa-user-group"></i></button>
                    <p class="m-3 w-75" style="font-size: 28px;"><b>Share with other users</b></p>
                    <p style="font-size: 20px;">Voting will not result a decision if you alone, you can fill it together with friends</p>
                </div>

                <div class="fitur d-flex flex-column m-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-outline-light m-2 text-center" style="border-radius: 50%; font-size: 35px; width: 70px; height: 70px;"><i class="fa-solid fa-infinity"></i></button>
                    <p class="m-3 w-75" style="font-size: 28px;"><b>Unlimited ideas, make anyvote</b></p>
                    <p style="font-size: 20px;">You can make whatever vote you want, whether it's a big thing, normal or even weird stuff</p>
                </div>

                <div class="fitur d-flex flex-column m-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-outline-light m-2 text-center" style="border-radius: 50%; font-size: 35px; width: 70px; height: 70px;"><i class="fa-solid fa-clock-rotate-left"></i></button>
                    <p class="m-3 w-75" style="font-size: 28px;"><b>Fill in and instant results</b></p>
                    <p style="font-size: 20px;">No need waiting to getting the results, you will get it immadiately after filling in the vote</p>
                </div>

            </div>
    </div>

<div id="Login/Sign-up" class="section">
        <div class="bg p-4 mb-5 mt-5 text text-center text-white border border-light" style="width:75%; margin: auto;">
            <div class="container">
                <p class="headerp">Please login first</p>
                    <div class="datainput">
                        <form action="ceklogin.php" method="post" autocomplete="off" class="m-3">
                            <div class="input-  mb-3">
                                <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" required>
                              </div>
                              
                              <div class="input-  mb-3">
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                              </div>
    
                              <button class="btn btn-outline-light" type="submit" name="login">Login</button>
                        </form>
                        <br>
                        <p style="font-size: 20px;">Don't have account?</p>
                           <a href="signup.php" class="btn btn-outline-light mb-3" style="text-decoration: none;">Sign in <i class="fa-solid fa-arrow-right"></i></a>
                        <p>Or login with :</p>
                        <div style="font-size: 20px;">
                            <button type="button" class="btn btn-outline-light" style="border-radius: 50%;"><i class="fa-brands fa-google"></i></button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <img src="img/robek-bawah.png" alt="" style="width: 100%; height: 40px; margin: 0; padding: 0;">
    <div class="footer p-3 bg-white text-black text-center ">
        <p>© Kelompok15 2022, all right reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>