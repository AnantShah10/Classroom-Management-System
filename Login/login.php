<?php
    session_start();
    $random_image_number =  rand(0, 1069);
    $dir = "../Captcha_Images/";
    $captcha_image = array();
    $increment = 0;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            $file_without_extension = basename($file, '.png');
            $captcha_image[$increment] = [$file, $file_without_extension];
            $increment += 1;
        }
        array_splice($captcha_image, 0, 2);
        $image_src = $dir.$captcha_image[$random_image_number][0]; 
        closedir($handle);
    }
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $_SESSION["username"] = $username;
        $password = $_POST['password'];
        $captcha_answer = $_POST['captcha'];

        if($username and $password and $captcha_answer) {
            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

            if ($connection) {
                $select_all_query = "SELECT * FROM login";
                $result = mysqli_query($connection, $select_all_query);
                $hashed_password = hash('sha256', $password);
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['Username'] == $username and $row['Password'] == $hashed_password) {
                        if ($captcha_answer == $captcha_image[$_SESSION["image_number"]][1]) {
                            header("Location: ../Dashboard/Dashboard.php");
                        }
                        else {
                            echo "Please enter a valid captcha!";
                        }
                    }
                    else {
                        echo '<script type="text/javascript">';
                        echo 'alert("Enter Valid Credentials!")';
                        echo '</script>';
                    }
                }
            }
            else {
                echo "Connection Failed";
            }
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter Required Fields!")';
            echo '</script>';
        }
    }
    if (isset($_POST['reset'])) {
        

        require "../../../php/windowsXamppPhp/vendor/autoload.php";
        $random_password_number =  rand(0, 9999);
        $mail = new PHPMailer(true);

        try {								
            $mail->isSMTP();											
            $mail->Host	 = 'smtp.gmail.com;';					
            $mail->SMTPAuth = true;							
            $mail->Username = 'anant.shah@somaiya.edu';				
            $mail->Password = 'Ashah2002';						
            $mail->SMTPSecure = 'tls';							
            $mail->Port	 = 587;

            $mail->setFrom('anant.shah@somaiya.edu', 'Anant');		
            $mail->addAddress('suhani.agarwal@somaiya.edu');
            
            $mail->isHTML(true);								
            $mail->Subject = 'Subject';
            $mail->Body = 'Your New password is ' . $random_password_number . '.Retry Logining in by clicking on the link http://localhost/Wp_Mini_project/Login/login.php';
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                
            $new_password = hash('sha256', $random_password_number);
            if ($connection) {
                $update_query = "UPDATE login SET Password = '$new_password' WHERE Username = 'suhani'";
                $result = mysqli_query($connection, $update_query);
                if ($result) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Please Check your Mail for new Password!")';
                    echo '</script>';
                }
            }
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>School Manager</title>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <form action = "login.php" method = "post">
    <h2>Log In</h2>
    <p>Login and start managing your school!</p>
    <input type="text" name="username" placeholder="Username" ><br /><br />
    <input type="password" name="password" placeholder="Password" ><br /><br />
    <span id="reset" name = "reset"><button type = "submit" name = "reset">Reset Password?</button></span><br /><br />
    <div id = "captcha"></div>
    <input type = "text" name = 'captcha' placeholder="Enter Captcha" ><br /><br />
    <script>
        var captcha_img = document.createElement('img');
        captcha_img.src = '<?php echo $image_src; ?>';
        <?php $_SESSION["image_number"] = $random_image_number; ?>;
        var src = document.getElementById('captcha');
        captcha_img.style.width = '15.970vw'; 
        captcha_img.style.height = '3.427vw';
        src.appendChild(captcha_img);
    </script>
    <button type="submit" name = "submit" id = "login">Log In</button>
  </form>
</body>

</html>