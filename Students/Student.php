<?php
    session_start();

    if (isset($_POST['delete'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

        if ($connection) {
            $delete_row = $_POST['delete'];
            $select_all_query = "DELETE FROM student WHERE Id = $delete_row";
            $result = mysqli_query($connection, $select_all_query);
        }
        else {
            echo "Connection Error";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Common_files/Common_css.css">
    <link rel="stylesheet" href="Student.css">
    <title>Classroom Manager</title>
</head>
<body>
    <?php include('../Common_files/Menu.php');?>
    <div class = "body">
        <?php include('../Common_files/Head.php');?>
        <div class = "main_section">
            <div class = "section_name">Students</div>
            <div class = "new_student">
                <button><a href = "../Students/Student_form.php">New Student</a></button>  
            </div>
            <div class = "Year_Table">
                <div class = "Year">FY</div>
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 5%">ID</th>
                                <th style = "width: 25%">Registration Number</th>
                                <th style = "width: 20%">Roll Number</th>
                                <th style = "width: 25%">Name</th>
                                <th style = "width: 15%">Branch</th>
                                <th style = "width: 15%"></th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM student";
                                $result = mysqli_query($connection, $select_all_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['Year_of_Study'] == 'FY') {
                                        echo "<tr>";
                                        echo "<td style = 'width: 5%; text-align: center;'>" . $row['Id'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Admission_Number'] . "</td>" . "<td style = 'width: 20%; text-align: center;'>" . $row['Roll_Number'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Student_Name'] . "</td>" . "<td style = 'width: 15%; text-align: center;'>" . $row['Branch'] . "</td>";
                                        $_SESSION["srow"] = $row['Id'];
                                        echo "<td><form method = 'post' action = 'Student.php' style = 'display: flex; flex-flow: column; gap: 0.25vw;'><button name = 'delete' value =" .  $_SESSION["srow"] . ">Delete</button></form></td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            else {
                                echo "Connection Failed";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class = "Year_Table">
                <div class = "Year">SY</div>
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 5%">ID</th>
                                <th style = "width: 25%">Registration Number</th>
                                <th style = "width: 20%">Roll Number</th>
                                <th style = "width: 25%">Name</th>
                                <th style = "width: 15%">Branch</th>
                                <th style = "width: 15%"></th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM student";
                                $result = mysqli_query($connection, $select_all_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['Year_of_Study'] == 'SY') {
                                        echo "<tr>";
                                        echo "<td style = 'width: 5%; text-align: center;'>" . $row['Id'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Admission_Number'] . "</td>" . "<td style = 'width: 20%; text-align: center;'>" . $row['Roll_Number'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Student_Name'] . "</td>" . "<td style = 'width: 15%; text-align: center;'>" . $row['Branch'] . "</td>";
                                        $_SESSION["srow"] = $row['Id'];
                                        echo "<td><form method = 'post' action = 'Student.php' style = 'display: flex; flex-flow: column; gap: 0.25vw;'><button name = 'delete' value =" .  $_SESSION["srow"] . ">Delete</button></form></td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            else {
                                echo "Connection Failed";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class = "Year_Table">
                <div class = "Year">TY</div>
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 5%">ID</th>
                                <th style = "width: 25%">Registration Number</th>
                                <th style = "width: 20%">Roll Number</th>
                                <th style = "width: 25%">Name</th>
                                <th style = "width: 15%">Branch</th>
                                <th style = "width: 15%"></th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM student";
                                $result = mysqli_query($connection, $select_all_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['Year_of_Study'] == 'TY') {
                                        echo "<tr>";
                                        echo "<td style = 'width: 5%; text-align: center;'>" . $row['Id'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Admission_Number'] . "</td>" . "<td style = 'width: 20%; text-align: center;'>" . $row['Roll_Number'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Student_Name'] . "</td>" . "<td style = 'width: 15%; text-align: center;'>" . $row['Branch'] . "</td>";
                                        $_SESSION["srow"] = $row['Id'];
                                        echo "<td><form method = 'post' action = 'Student.php' style = 'display: flex; flex-flow: column; gap: 0.25vw;'><button name = 'delete' value =" .  $_SESSION["srow"] . ">Delete</button></form></td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            else {
                                echo "Connection Failed";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class = "Year_Table">
                <div class = "Year">LY</div>
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 5%">ID</th>
                                <th style = "width: 25%">Registration Number</th>
                                <th style = "width: 20%">Roll Number</th>
                                <th style = "width: 25%">Name</th>
                                <th style = "width: 15%">Branch</th>
                                <th style = "width: 15%"></th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM student";
                                $result = mysqli_query($connection, $select_all_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['Year_of_Study'] == 'LY') {
                                        echo "<tr>";
                                        echo "<td style = 'width: 5%; text-align: center;'>" . $row['Id'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Admission_Number'] . "</td>" . "<td style = 'width: 20%; text-align: center;'>" . $row['Roll_Number'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Student_Name'] . "</td>" . "<td style = 'width: 15%; text-align: center;'>" . $row['Branch'] . "</td>";
                                        $_SESSION["srow"] = $row['Id'];
                                        echo "<td><form method = 'post' action = 'Student.php' style = 'display: flex; flex-flow: column; gap: 0.25vw;'><button name = 'delete' value =" .  $_SESSION["srow"] . ">Delete</button></form></td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            else {
                                echo "Connection Failed";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>