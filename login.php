<?php require "layouts/header.php"?>
<?php
if (!is_null($_SESSION['username'])){
    header( "location: home.php");
    exit(0);
}
?>

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">Login</h1>
            <br>
            <?php if (isset($_GET["msg"])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_GET["msg"];
                ?>
            </div>
            <br>
            <?php endif; ?>
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input name="username" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input name="password" type="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="">
                            <input type="submit" value="Login" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            if (isset($_POST["username"])){
                require "config.php";
                $username = $_POST["username"];
                $password = $_POST["password"];
                if (is_null($username) || is_null($password)){
                    echo "<div class='alert alert-danger'>กรุณาระบุข้อมูลให้ครบ</div>";
                }else{
                    $str = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $query = mysqli_query($conn,$str) or die(mysqli_error($conn));
                    $count = mysqli_num_rows($query);
                    if ($count > 0){
                        $user = mysqli_fetch_assoc($query);
                        $_SESSION["isLogin"] = true;
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["user"] = $user;
                        echo "<div class='alert alert-success'>login success</div>";
                        header( "location: home.php");
                        exit(0);
                    } else {
                        echo "<div class='alert alert-danger'>username or password incorrect</div>";
                    }

                }
            }
            ?>
        </div>
    </section>
<?php require "layouts/footer.php"?>