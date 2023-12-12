<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <title>ADMIN</title>
</head>

<body>
    <header>
        <div class="navbar">
            <nav>
                <ul>
                    <li id="title"><a href="Login.php">Logout</a></li>
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="msg.php"> Messages </a></li>
                    <li><a href="mroomview.php"> Rooms </a></li>
                    <li><a href="managerview.php">Requested Rooms</a></li>
                    <li><a href="assignroom.php"> Assign Room </a></li>
                </ul>
            </nav>

        </div>
    </header>



    <?php
    include "connect.php";


    if (!mysqli_connect_errno()) {
        $reviews = mysqli_query($con, "SELECT * FROM request_room ORDER BY id");
        mysqli_close($con);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Using internal/embedded css -->
        <style>
            .btn {
                background-color: red;
                border: none;
                color: white;
                padding: 5px 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 10px;
            }

            .green {
                background-color: #199319;
            }

            .red {
                background-color: red;
            }

            table,
            th {
                border-style: solid;
                border-width: 1;
                text-align: center;
            }

            td {
                text-align: center;
            }
        </style>
    </head>
    <center>
        <h1>Requested Room Table</h1>
    </center>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Arrive Date</th>
            <th>Depart Date</th>
            <th>Number of People</th>
            <th>Room Type</th>
            <th>Status</th>
            <th>Toggle</th>
        </thead>

        <tbody>
            <?php
            foreach ($reviews as $review) { ?>
                <tr>
                    <td> <?php echo $review['id']; ?></td>
                    <td> <?php echo $review['name']; ?></td>
                    <td> <?php echo $review['email']; ?></td>
                    <td> <?php echo $review['phone']; ?></td>
                    <td> <?php echo $review['a_date']; ?></td>
                    <td> <?php echo $review['d_date']; ?></td>
                    <td> <?php echo $review['people']; ?></td>
                    <td> <?php echo $review['room_type']; ?></td>

                    <td>
                        <?php
                        if ($review['status'] == "1")
                            echo "Confirmed";
                        else
                            echo "Pending";
                        ?>
                    </td>
                    <td>
                        <?php

                        if ($review['status'] == "1")
                            echo
                            "<a href=deactivate.php?id=" .  $review['id'] . " class='btn red'>DISAPPROVE</a>";
                        else
                            echo
                            "<a href=activate.php?id=" . $review['id'] . " class='btn green'>APPROVE</a>";
                        ?>

                </tr>

            <?php
            }
            // End the foreach loop 
            ?>
    </table>
</body>

</html>