<?php
    session_start();

    if(isset($_POST['submit'])) {
        $studentname = $_POST['studentname'];
        $fathername = $_POST['fathername'];
        $mothername = $_POST['mothername'];
        $lastname = $_POST['lastname'];
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
        $rollnumber = $_POST['rollnumber'];
        $admissionnumber = $_POST['admissionnumber'];
        $dateadmission = $_POST['dateadmission'];
        $dateadmission = explode('-', $dateadmission);
        $yearstudy = $_POST["yearstudy"];
        $branch = $_POST["branch"];

        GLOBAL $flag;
        $flag = 0;
        if (ctype_alpha($studentname) and ctype_alpha($fathername) and ctype_alpha($mothername) and ctype_alpha($lastname)) {
            if (strlen($studentname) < 3 or strlen($fathername) < 3 or strlen($mothername) < 3 or strlen($lastname) < 3) {
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter a valid Name!")';
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

        if (is_numeric($mobile) and is_numeric($rollnumber) and is_numeric($admissionnumber)) {
            if (strlen($mobile) != 10) {
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter a valid Mobile Number!")';
                echo '</script>';
                $flag += 1;
            }
            if (strlen($rollnumber) > 11 or strlen($admissionnumber) > 11) {
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter valid Numbers!")';
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

        if (!checkdate($datebirth[1], $datebirth[2], $datebirth[0]) and checkdate($dateadmission[1], $dateadmission[2], $dateadmission[0])) {
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

        if ($admissionnumber and $rollnumber and $studentname and $branch) {
            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

            if ($connection) {
                $select_all_query = "SELECT * FROM student";
                $result = mysqli_query($connection, $select_all_query);
                GLOBAL $id;
                $id = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['Id'];
                    if ($row['Admission_Number'] == $admissionnumber) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Student Already Exists Enter a different Admission Number!")';
                        echo '</script>';
                        $flag += 1;
                    }
                }

                if ($flag == 0) {
                    $id += 1;
                    $insert_query = "INSERT INTO student VALUES ($id, '$studentname', '$fathername', '$mothername', '$lastname', $mobile, '$email', '$datebirth', '$gender', $rollnumber, $admissionnumber, '$dateadmission', '$yearstudy', '$branch')";
                    $result = mysqli_query($connection, $insert_query);

                    if (!$result) {
                        die("Query Failed" . mysqli_error());
                    }
                    else {
                        header("Location: Student.php");
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
    <link rel = "stylesheet" href = "Student_form.css">
</head>
<body>
    <form method = "post" action = "Student_form.php">
        <div class = "heading">
            <div>Student Addmission </div>
            <div class = "cross">x</div>
        </div>
        <div class="formelement">
            <label for = "sname">Student's Name *</label>
            <input id = "sname" type = "text" name = "studentname">
        </div>
        <div class="formelement">
            <label for = "fname">Father's Name</label>
            <input id = "fname" type = "text" name = "fathername">
        </div>
        <div class="formelement">
            <label for = "mname">Mother's Name</label>
            <input id = "mname" type = "text" name = "mothername">
        </div>
        <div class="formelement">
            <label for = "lname">Last Name</label>
            <input id = "lname" type = "text" name = "lastname">
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
            <label for = "roll">Roll Number *</label>
            <input id = "roll" type = "numeric" name = "rollnumber">
        </div>
        <div class="formelement">
            <label for = "adno">Admission Number *</label>
            <input id = "adno" type = "numeric" name = "admissionnumber">
        </div>
        <div class="formelement">
            <label for = "adda">Admission Date</label>
            <input id = "adda" type = "date" name = "dateadmission">
        </div>
        <div class="formelement">
            <label for = "yos">Year of Study</label>
            <select name="yearstudy" id="yos">
                <option value="FY">FY</option>
                <option value="SY">SY</option>
                <option value="TY">TY</option>
                <option value="LY">LY</option>
            </select>
        </div>
        <div class="formelement">
            <label for = "branch">Branch</label>
            <select name="branch" id="branch">
                <option value="CS">CS</option>
                <option value="IT">IT</option>
                <option value="EXTC">EXTC</option>
                <option value="ETRX">ETRX</option>
                <option value="MECH">MECH</option>
            </select>
        </div>
        <div class = "button">
            <button type = "submit" name = "submit">Submit</button>
        </div>
    </form>
</body>
</html>