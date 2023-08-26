<?php
    session_start();

    if(isset($_POST['submit'])) {
        $teachername = $_POST['teachername'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $initial = $_POST['initial'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $datebirth = $_POST['datebirth'];
        $datebirth = explode('-', $datebirth);
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        else {
            $gender = '';
        }
        $yearsexperience = $_POST['yearsexperience'];
        $assignedsubject = $_POST['assignedsubject'];
        if (isset($_POST['class'])) {
            $class = $_POST['class'][0];
            for ($i = 1; $i < count($_POST['class']); $i++){
                $class = $class . ", " . $_POST['class'][$i];
            }
        }
        else {
            $class = '';
        }

        GLOBAL $flag;
        $flag = 0;
        if (ctype_alpha($teachername) and ctype_alpha($middlename) and ctype_alpha($lastname) and ctype_alpha($initial)) {
            if (strlen($teachername) < 3 or strlen($middlename) < 3 or strlen($lastname) < 3 or strlen($initial) != 3) {
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter a valid Name!")';
                echo '</script>';
                $flag += 1;
            }
            if (strlen($assignedsubject) < 3){
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter a valid Assigned Subjects!")';
                echo '</script>';
                $flag += 1;
            }
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter alphabets only for Name!")';
            echo '</script>';
            $flag += 1;
        }

        if (is_numeric($mobile) and is_numeric($yearsexperience)) {
            if (strlen($mobile) != 10) {
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter a valid Mobile Number!")';
                echo '</script>';
                $flag += 1;
            }
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter numbers only!")';
            echo '</script>';
            $flag += 1;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter a valid Email Id!")';
            echo '</script>';
            $flag += 1;
        }

        if (!checkdate($datebirth[1], $datebirth[2], $datebirth[0])){
            echo '<script type="text/javascript">';
            echo 'alert("Please Enter a valid Date!")';
            echo '</script>';
            $flag += 1;
        }

        if ($gender == '') {
            echo '<script type="text/javascript">';
            echo 'alert("Please Select a Gender!")';
            echo '</script>';
            $flag += 1;
        }

        if ($class == '') {
            echo '<script type="text/javascript">';
            echo 'alert("Please Select a Class!")';
            echo '</script>';
            $flag += 1;
        }

        if ($teachername and $initial and $assignedsubject and $class) {
            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

            if ($connection) {
                $select_all_query = "SELECT * FROM teacher";
                $result = mysqli_query($connection, $select_all_query);
                GLOBAL $id;
                $id = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['Id'];
                    if ($row['Initial'] == $initial) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Teacher Already Exists Enter a different Initial!")';
                        echo '</script>';
                        $flag += 1;
                    }
                }

                if ($flag == 0) {
                    $id += 1;
                    $insert_query = "INSERT INTO teacher VALUES ($id, '$teachername', '$middlename', '$lastname', '$initial', $mobile, '$email', '$datebirth', '$gender', $yearsexperience, '$assignedsubject', '$class')";
                    $result = mysqli_query($connection, $insert_query);
                    if (!$result) {
                        die("Query Failed" . mysqli_error());
                    }
                    else {
                        header("Location: Teacher.php");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "Teacher_form.css">
</head>
<body>
    <form method = "post" action = "Teacher_form.php">
        <div class = "heading">
            <div>New Teacher</div>
            <div class = "cross">x</div>
        </div>
        <div class="formelement">
            <label for = "tname">Teacher's Name *</label>
            <input id = "tname" type = "text" name = "teachername">
        </div>
        <div class="formelement">
            <label for = "mname">Middle Name</label>
            <input id = "mname" type = "text" name = "middlename">
        </div>
        <div class="formelement">
            <label for = "lname">Last Name</label>
            <input id = "lname" type = "text" name = "lastname">
        </div>
        <div class="formelement">
            <label for = "ini">Initials *</label>
            <input id = "ini" type = "text" name = "initial">
        </div>
        <div class="formelement">
            <label for = "mob">Mobile</label>
            <input id = "mob" type = "numeric" name = "mobile">
        </div>
        <div class="formelement">
            <label for = "em">Email</label>
            <input id = "em" type = "text" name = "email">
        </div>
        <div class="formelement">
            <label for = "dob">Date of Birth</label>
            <input id = "dob" type = "date" name = "datebirth">
        </div>
        <div class="formelement">
            <label for = "gen">Gender</label>
            <div class = "radio">
                <div>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>
                </div>
            </div>
        </div>
        <div class="formelement">
            <label for = "yoe">Years of Experience</label>
            <input id = "yoe" type = "numeric" name = "yearsexperience">
        </div>
        <div class="formelement">
            <label for = "asssub">Assigned Subjects *</label>
            <input id = "asssub" type = "text" name = "assignedsubject">
        </div>
        <div class="formelement">
            <label for = "class">Class *</label>
            <div class = "class"><input type = "checkbox" name = "class[]" value = "FY">FY</div>
            <div class = "class"><input type = "checkbox" name = "class[]" value = "SY">SY</div>
            <div class = "class"><input type = "checkbox" name = "class[]" value = "TY">TY</div>
            <div class = "class"><input type = "checkbox" name = "class[]" value = "LY">LY</div>
        </div>
        <div class = "button">
            <button type = "submit" name = "submit">Submit</button>
        </div>
    </form>
</body>
</html>