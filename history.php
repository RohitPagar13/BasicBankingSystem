<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction_History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body {
        background: url('images/img3-bank.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 150%;
    }

    body::before {
        background: #040e27;
        background-size: cover;
        position: absolute;
        left: 0;
        top: 0;
        min-width: 100%;
        min-height: 100%;
        content: '';
        opacity: .7;
        z-index: -1;
    }

    .container .table {
        width: 90%;
        color: #212529;
        margin: 5rem 1rem;
    }
    .arrow{
        display: flex;
        justify-content: space-between;
    }

    </style>
</head>

<body>

<div class="arrow">
        <div><a href="transfer.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left-circle" style="color:white; height:8vh" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a></div>
        <div> <a href="home.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-right-circle" style="color:white; height:8vh" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                </svg></a></div>
    </div>

    <div class="container table-responsive-sm">
        <h1 class="form-h text-center text-white " style="font-size: 6vh;">Transaction History</h1>
        <table class="table table-dark table-striped text-white">
            <!--coloum names-->
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Receiver</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date-Time</th>
                </tr>
            </thead>
            <tbody>

                <?php
        // Fetching data from database
        require("connection.php");
        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td> <?php echo "$row[sender]"  ?> </td>
                    <td> <?php echo "$row[receiver]"  ?> </td>
                    <td> <?php echo "$row[Amount]" ?> </td>
                    <td> <?php echo "$row[Date]" ?> </td>
                </tr>
                <?php
        }
        ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="page-footer fixed-bottom font-small unique-color-dark pt-4">
        <!-- Copyright -->
        <div class="footer-copyright text-center" style="color: white; background: black;">© 2021 Copyright:
            CoinAlerts.com <br>The Spark Foundation Project
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>