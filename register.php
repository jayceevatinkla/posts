<?php require "layouts/header.php"; ?>

<?php
if (!is_null($_SESSION['username'])){
    header( "location: home.php");
    exit(0);
}
?>
    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">Register</h1>
            <br>
            <form action="register.php" method="post">
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
                        <td>Retype Password</td>
                        <td><input name="password_confirmation" type="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input name="email" type="email" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input name="name" type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="">
                            <input type="submit" value="Register" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
            if (isset($_POST["username"])){
                require "config.php";
                $username = $_POST["username"];
                $password = $_POST["password"];
                $confirmpass = $_POST["password_confirmation"];
                $email= $_POST["email"];
                $name = $_POST["name"];

                if (is_null($username) || is_null($password) || is_null($confirmpass)|| is_null($email)|| is_null($name)){
                    echo "<div class='alert alert-danger'>กรุณาระบุข้อมูลให้ครบ</div>";
                }elseif ($password != $confirmpass){
                    echo "<div class='alert alert-danger'>กรุณาใส่รหัสผ่านให้ตรงกัน</div>";
                }else{
                    $query = mysqli_query($conn,"SELECT * FROM users WHERE  username = '$username' OR email = '$email'") or die(mysqli_error($conn));
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        echo "<div class='alert alert-danger'>username or password has been taken</div>";
                    } else {
                        $str = "INSERT INTO users VALUES(NULL , '$name', '$username', '$password','$email', 0, NOW(),NOW())";
                        $query = mysqli_query($conn,$str) or die(mysqli_error($conn));
                        echo "<div class='alert alert-success'>เรียบร้อย</div>";
                    }

                }
            }
            ?>
        </div>
    </section>
<?php require "layouts/footer.php"; ?>

