<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body {
        background: url('https://images.unsplash.com/photo-1588702547919-26089e690ecc?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG9ubGluZSUyMGJhbmtpbmd8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
        background-size: cover;
    }

    body::before {
        background: #040e27;
        background-size: cover;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 102%;
        content: '';
        opacity: .8;
        z-index: -1;
    }

    .t-form {
        display: flex;
        flex-direction: column;
        background-color: transparent;
        border: 2px solid turquoise;
        border-radius: 7vh;
        margin: 16vh 45vh;
        width: 68%;
    }

    .t-form .selection {
        height: 2vh;
        width: 100vw;
    }


    .t-form input {
        border-radius: 1vh;
    }

    .form-h {
        color: white;
        font-size: 3rem;
        margin: 5vh 0vh;
    }

    .t-form button {
        color: white;
        background: turquoise;
        border-radius: 1vh;
        margin-bottom: 2vh;
    }

    .t-form button:hover {
        color: turquoise;
        background: transparent;
        border: 2px solid turquoise;
    }

    .arrow{
        display: flex;
        justify-content: space-between;
    }
    </style>
</head>

<body>

    <div class="arrow">
        <div><a href="account.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left-circle" style="color:white; height:8vh" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a></div>
        <div> <a href="history.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-right-circle" style="color:white; height:8vh" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                </svg></a></div>
    </div>

    <?php
        include 'connection.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
            $amount = $_POST['amount'];
            $sender = $_POST['sender'];
            $receiver = $_POST['receiver'];
            
            //Selcting senders detail from database
            $sql = "SELECT * FROM `userdetails` WHERE Holders_Name = '$sender'";
            $query = mysqli_query($conn,$sql) or die( mysqli_error($conn));
            $sql1 = mysqli_fetch_array($query); 

            //Selcting receivers detail from database
            $sql = "SELECT * FROM `userdetails` WHERE Holders_Name = '$receiver'";
            $query = mysqli_query($conn,$sql)or die( mysqli_error($conn));
            $sql2 = mysqli_fetch_array($query);

            // checking negative values 
            if (($amount)<0)
           {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            OOPS! Negative amount cannot transfer.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }

            // checking zero values
            else if($amount == 0){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                OOPS! Zero amount cannot transfer.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
             }

             //  checking insufficient balance
            else if($amount > $sql1['balance']){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Insufficient balance!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
             }


            else {
                // Deducting amount from senders account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE userdetails set balance= '$newbalance' where Holders_Name='$sender'";
                mysqli_query($conn,$sql);
             
                // Adding amount to reciever's account
                 $newbalance = $sql2['balance'] + $amount;
                 $sql = "UPDATE userdetails set balance= '$newbalance' where Holders_Name='$receiver'";
                 mysqli_query($conn,$sql);

                //Inserting details to database
                 $sql = "INSERT INTO transfer(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount');";
                 $query=mysqli_query($conn,$sql);

                 if($query){
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     Transaction Sucessful.
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>';
                 }

                $newbalance= 0;
                $amount =0;
                }
            }
            ?>
    <!-- Form for transfer of money -->
    <div class="t-form mx-auto">
        <form action="transfer.php" method="post">
            <h1 class="form-h text-center">Transfer Now</h1>
            <div class="form-group my-3 mx-5">
                <select class="form-control" name="sender" id="exampleFormControlSelect1">
                    <option selected>Apeksha</option>
                    <option>Sayli</option>
                    <option>Kundan</option>
                    <option>Mansi</option>
                    <option>Akash</option>
                    <option>Pranav</option>
                    <option>Anisha</option>
                    <option>Prachi</option>
                    <option>Priyanka</option>
                    <option>Mohit</option>
                </select>
            </div>
            <div class="form-group my-3 mx-5">
                <select class="form-control " name="receiver" id="exampleFormControlSelect1">
                    <option selected>Sayli</option>
                    <option>Apeksha</option>
                    <option>Kundan</option>
                    <option>Mansi</option>
                    <option>Akash</option>
                    <option>Pranav</option>
                    <option>Anisha</option>
                    <option>Prachi</option>
                    <option>Priyanka</option>
                    <option>Mohit</option>
                </select>
            </div>

            <div class="mb-5 mx-5 my-3">
                <input type="number" name="amount" class="form-control" id="formGroupExampleInput2"
                    placeholder="Enter amount">
            </div>
            <button type="submit" name="transfer" class="btn btn mx-5">Transfer</button>
        </form>
    </div>


    <!-- Footer -->
    <footer class="page-footer  fixed-bottom font-small unique-color-dark pt-4">
        <!-- Copyright -->
        <div class="footer-copyright text-center" style="color: white; background: black;">© 2021 Copyright:
            CoinAlerts.com <br>The Spark Foundation Project
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>