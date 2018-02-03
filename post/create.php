<?php require "../layouts/header.php" ?>
<?php
if (is_null($_SESSION['username'])) {
    $msg = "please log in";
    header("location: login.php?msg=" . urlencode($msg) . "&redirect=" . urlencode("/home.php"));
    exit(0);
}
?>
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">CREATE POST</h1>
            <br>
            <form action="create.php" method="post">
                <textarea name="content" rows="3" class="form-control" placeholder="content..."></textarea>
                <input type="submit" class="btn btn-success" value="Save">
            </form>
            <?php
            if (isset($_POST["content"])){
                $content = $_POST["content"];
                if (is_null($content)){
                    echo "<div class='alert alert-danger'>please specify content</div>";
                } else {
                    require "../config.php";
                    $userid = $_SESSION["user"]["id"];
                    $query = mysqli_query($conn,"INSERT INTO posts VALUES(NULL , $userid , '$content' , NOW() , NOW())");
                     echo "<div class='alert alert-success'>posted</div>";
                }
            }
            ?>
        </div>
    </section>
<?php require "../layouts/footer.php" ?>