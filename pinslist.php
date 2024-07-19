<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinterest | Pins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php require "essentials/_navbar.php"; ?>
  </head>
  <body>
    <div class="container my-4">
    <?php
    require "essentials/_connection.php"; // Ensure you include the connection file

    if (isset($_GET["bid"])) {
        $bid = $_GET["bid"];
        $sql = "SELECT * FROM Pins WHERE BID = $bid";
        $res = mysqli_query($conn, $sql);
        
        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    echo '
                    <div class="jumbotron">
                        <h3 class="display-4">Welcome to Pin on ' . htmlspecialchars($row["Description"]) . '</h3>
                        <p class="lead">We will discuss coding queries here.</p>
                        <hr class="my-4">
                        <p>Please feel free to comment!</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="comments.php?pid='.$row["PID"]. '"role="button">Comments</a>
                        </p>
                    </div>';
                }
            } else {
                echo '<div class="jumbotron">
                        <h3 class="display-4">No Pins Found</h3>
                        <p class="lead">There are no pins for this board.</p>
                        <hr class="my-4">
                        <p>Please feel free to add some pins!</p>
                      </div>';
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo '<div class="jumbotron">
                <h3 class="display-4">Invalid Request</h3>
                <p class="lead">No board selected.</p>
                <hr class="my-4">
                <p>Please select a board to view its pins.</p>
              </div>';
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <?php include "essentials/_footer.php"; ?>
  </body>
</html>