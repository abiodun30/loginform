<?php

    include('connect.php');
    include('functions.php');

    session_start();

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error_msg .= 'Please Email and Password is required';
            $does_not_have_error = false;
        }

        $user_details_sql = "SELECT * from `list` where `email_ad`='" . $email . "' AND `password`='" . md5($password) . "' AND `status`= 'enabled' "; 
        $user_details_result = mysqli_query($conn, $user_details_sql);

        if (mysqli_num_rows($user_details_result) == 1) {

            while ($row = mysqli_fetch_assoc($user_details_result)) {
                
                $fname = $row['fname'];
                $lname = $row['lname'];

                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
            }

            header('Location: welcome.php');
            exit;
            
        } else {
            $error_msg = 'Invalid Email or Password';
            $does_not_have_error = false;    
        }
    }

    session_destroy();

?>

<?php include('partial/header.php') ; ?>
<?php

if (isset($_GET['r']) && ($_GET['r'] == '232443')) {
    echo '<h4><font color="green">User registered successfully</font></h4>';
}

    if (!empty($error_msg)) {
        echo '<h4><font color="red">' . $error_msg . '</font></h4>';
    }
?>
            <form method="POST">
                <table>
                    <tr>
                        <td>Email Address*</td><td><input name="email" type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ; ?>"></td>
                    </tr>
                    <tr>
                        <td>Password*</td><td><input name="password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td><td><input name="submit" type="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
<?php include('partial/footer.php') ; ?>