<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CoinAlerts</title>
    <style>
      *{
    font-size: 1rem;
}
/* Body of Page*/
body{
    background: url('images/img2-bank.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    width:100%;
}

body::before{
    background: #040e27;
    position: absolute;
    left: 0;
    top: 0;
    min-width: 100%; 
    min-height: 100%;
    content: '';
    opacity: .7;
    z-index: -1;
}

/* Navigation Bar */

a{
    margin: 0px 33px;
}

.nav-link:hover{
    font-size: 19px;
}

/* HOME Section */

.home{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 4vh;
    height: 75vh;
}

 /* Heading welcome */

.text-white{
    font-size: 72px;
}

.pre{
    font-size: 5rem;
    color: white;
    font-family: "Roboto",sans-serif;
    font-weight: 400;
    line-height: 6rem;
}

/* Heading CoinAlerts */

.home span{
    font-family: 'Yellowtail', cursive;
    letter-spacing: 0.4rem;
    color: turquoise;
    font-size: 4rem;
}

.home .button {
    border: 2px solid turquoise;
    padding: 1vh;
    color: turquoise;
    background-color: transparent;
    border-radius: 5px;
    font-size: 1.3rem;
}

.home .button:hover{
    color: white;
    background-color: #03c7b3;
}
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg " style="background-color: #f8f9fa00;">
        <a class="navbar-brand" href="#"> <img src="images/gggg.gif" width="72" height="72"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: f8f9fa33;  padding: 0rem 0rem;">
            <span class="navbar-toggler-icon" style="color:white;font-size: 32px;"><svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" style="color:white;" href="account.php">Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" style="color:white;" href="transfer.php">Transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" style="color:white;" href="history.php">History</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    
    ?>

    <!-- Home Page -->
    <section class="home text-center">
        <h1 class="text-white" style="font-family:Roboto;">Welcome to<br> <span>CoinAlerts</span></h1>
        <a href="transfer.php"><button class="button">Transfer Now</button></a>
    </section>
    <!-- Home Page -->

    <!-- Footer -->
    <footer class="page-footer  fixed-bottom font-small unique-color-dark pt-4">
        <!-- Copyright -->
        <div class="footer-copyright text-center" style="color: white; background: black;">© 2021 Copyright:
            CoinAlerts.com <br>The Spark Foundation Project
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>