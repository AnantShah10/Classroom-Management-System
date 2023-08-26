<?php
    session_start();

    if(isset($_POST['submit'])) {
        $subjectname = $_POST['subjectname'];
        $subjectcode = $_POST['subjectcode'];
        if (isset($_POST['subjecttype'])) {
            $subjecttype = $_POST['subjecttype'];
        }
        else {
            $subjecttype = '';
        }
        
        GLOBAL $flag;
        $flag = 0;
        if(isset($_POST['submit'])) {
            $subjectname = $_POST['subjectname'];
            $subjectcode = $_POST['subjectcode'];
            if (isset($_POST['subjecttype'])) {
                $subjecttype = $_POST['subjecttype'];
            }
            else {
                $subjecttype = '';
            }
    
            GLOBAL $flag;
            $flag = 0;
            if (ctype_alpha($subjectname) and ctype_alpha($subjectcode)) {
                if (strlen($subjectname) < 3 or strlen($subjectcode) < 5) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Please Enter valid Subject Credentials!")';
                    echo '</script>';
                    $flag += 1;
                }
            }
            if ($subjecttype == '') {
                echo '<script type="text/javascript">';
                echo 'alert("Please Select the Type of Subject!")';
                echo '</script>';
                $flag += 1;
            }
        }

        if ($subjectname and $subjectcode and $subjecttype) {
            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

            if ($connection) {
                $select_all_query = "SELECT * FROM subject";
                $result = mysqli_query($connection, $select_all_query);
                GLOBAL $id;
                $id = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['Id'];
                    if ($row['Subject_Code'] == $subjectcode) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Subject Already Exists Enter a different Subject Code!")';
                        echo '</script>';
                        $flag += 1;
                    }
                }

                if ($flag == 0) {
                    $id += 1;
                    $insert_query = "INSERT INTO subject VALUES ($id, '$subjectname', '$subjectcode', '$subjecttype')";
                    $result = mysqli_query($connection, $insert_query);

                    if (!$result) {
                        die("Query Failed" . mysqli_error());
                    }
                    else {
                        header("Location: Subject.php");
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
    <link rel = "stylesheet" href = "Subject_form.css">
</head>
<body>
    <form method = "post" action = "Subject_form.php">
        <div class = "heading">
            <div>New Subject </div>
            <div class = "cross">x</div>
        </div>
        <div class="formelement">
            <label for = "sname">Subject Name *</label>
            <input id = "sname" type = "text" name = "subjectname">
        </div>
        <div class="formelement">
            <label for = "scode">Subject Code *</label>
            <input id = "scode" type = "text" name = "subjectcode">
        </div>
        <div class="formelement">
            <label for = "st">Subject Type *</label>
            <div class = "radio">
                <div>
                    <input type="radio" id="Theory" name="subjecttype" value="Theory">
                    <label for="Theory">Theory</label>
                </div>
                <div>
                    <input type="radio" id="Practical" name="subjecttype" value="Practical">
                    <label for="Practical">Practical</label>
                </div>
            </div>
        </div>
        <div class = "button">
            <button type = "submit" name = "submit">Submit</button>
        </div>
    </form>
</body>
</html>