<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinterest | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php require "essentials/_navbar.php"; ?>
</head>
<body>
<div class="container my-4">
    <section style="background-color: #ad655f;">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="card text-body">
                        <div class="card-body p-4">
                            <h4 class="mb-0">Recent comments</h4>
                            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

                            <?php
                            session_start();
                            require "essentials/_connection.php"; // Ensure the correct path to your connection file
                            
                            // Check if pid is set and is numeric
                            if (isset($_GET["pid"]) && is_numeric($_GET["pid"])) {
                                $pid = $_GET["pid"];
                                $sql = "SELECT * FROM Comments WHERE PID = $pid";
                                $res = mysqli_query($conn, $sql);
                                
                                if ($res) {
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $uid = $row["UID"];
                                            $sql2 = "SELECT * FROM Users WHERE UID = $uid";
                                            $r2 = mysqli_query($conn, $sql2);
                                            
                                            if ($r2) {
                                                $row2 = mysqli_fetch_assoc($r2);
                                                echo '<div class="d-flex flex-start mb-4">
                                                          <img class="rounded-circle shadow-1-strong me-3"
                                                              src="img/user_default.jpeg" alt="avatar" width="60"
                                                              height="60" />
                                                          <div>
                                                              <h6 class="fw-bold mb-1" style="color: blue;">' . $row2["email"] . '</h6>
                                                              <p class="mb-0" style="color: blue;">' . $row["Text"] . '</p>
                                                          </div>
                                                      </div>';
                                            } else {
                                                echo '<p class="text-muted">No comments on this pin.</p>'; // Text-muted class for gray color
                                            }
                                        }
                                    } else {
                                        echo '<p class="text-muted">No comments on this pin.</p>'; // Text-muted class for gray color
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            } else {
                                echo '<p class="text-danger">Invalid or missing parameter (pid).</p>'; // Text-danger class for red color
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<?php include "essentials/_footer.php"; ?>
</body>
</html>
