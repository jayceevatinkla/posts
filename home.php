<?php require "layouts/header.php" ?>
<?php
if (is_null($_SESSION['username'])) {
    $msg = "please log in";
    header("location: login.php?msg=" . urlencode($msg) . "&redirect=" . urlencode("/home.php"));
    exit(0);
}

require "config.php";
$query = mysqli_query($conn, "SELECT * FROM posts JOIN users ON users.id = user_id ORDER BY posts.id DESC;");

?>
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">HOME</h1>
            <br>
            <?php while ($row = mysqli_fetch_array($query)): ?>
                <div class="alert alert-info">
                    <h3><?php echo $row['content']; ?></h3>
                    Posted By: <?php echo $row['username']; ?>,
                    Posted At: <?php echo $row['created_at']; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php require "layouts/footer.php" ?>