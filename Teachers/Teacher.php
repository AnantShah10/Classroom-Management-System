<?php
    session_start();
    if (isset($_POST['delete'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

        if ($connection) {
            $delete_row = $_POST['delete'];
            $select_all_query = "DELETE FROM teacher WHERE Id = $delete_row";
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
    <link rel="stylesheet" href="Teacher.css">
    <title>Classroom Manager</title>
</head>
<body>
    <?php include('../Common_files/Menu.php');?>
    <div class = "body">
        <?php include('../Common_files/Head.php');?>
        <div class = "main_section">
            <div class = "section_name">Teachers</div>
            <div class = "new_teacher">
            <button><a href = "../Teachers/Teacher_form.php">New Teacher</a></button>  
            </div>
            <div class = "Teacher_Table">
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 5%">ID</th>
                                <th style = "width: 20%">Name</th>
                                <th style = "width: 15%">Code</th>
                                <th style = "width: 30%">Assigned Subjects</th>
                                <th style = "width: 15%">Branch</th>
                                <th style = "width: 15%"></th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM teacher";
                                $result = mysqli_query($connection, $select_all_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td style = 'width: 5%; text-align: center;'>" . $row['Id'] . "</td>" . "<td style = 'width: 20%; text-align: center;'>" . $row['Teacher_Name'] . "</td>" . "<td style = 'width: 15%; text-align: center;'>" . $row['Initial'] . "</td>" . "<td style = 'width: 30%; text-align: center;'>" . $row['Assigned_Subjects'] . "</td>" . "<td style = 'width: 15%; text-align: center;'>" . $row['Class'] . "</td>";
                                    $_SESSION["trow"] = $row['Id'];
                                    echo "<td><form method = 'post' action = 'Teacher.php' style = 'display: flex; flex-flow: column; gap: 0.25vw;'><button name = 'delete' value =" .  $_SESSION["trow"] . ">Delete</button></form></td>";
                                    echo "</tr>";
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