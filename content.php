<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <h1>Latest Songs</h1>
        <div class="card-container">
            <?php
            // Database connection
            $conn = mysqli_connect("localhost", "root", "", "music");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetching songs from database
            $sql = "SELECT * FROM song";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['artist']; ?>">
                        <div class="details">
                            <h2><?php echo $row['title']; ?></h2>
                            <p><strong>Artist:</strong> <?php echo $row['artist']; ?></p>
                            <p><strong>Album:</strong> <?php echo $row['album']; ?></p>
                            <p><strong>Genre:</strong> <?php echo $row['genre']; ?></p>
                            <audio controls>
                                <source src="<?php echo $row['audio']; ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No songs found.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
