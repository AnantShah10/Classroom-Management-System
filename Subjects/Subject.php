<?php
    session_start();
    if (isset($_POST['delete'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');

        if ($connection) {
            $delete_row = $_POST['delete'];
            $select_all_query = "DELETE FROM subject WHERE Id = $delete_row";
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
    <link rel="stylesheet" href="Subject.css">
    <title>Classroom Manager</title>
</head>
<body>
    <?php include('../Common_files/Menu.php');?>
    <div class = "body">
        <?php include('../Common_files/Head.php');?>
        <div class = "main_section">
            <div class = "section_name">Subjects</div>
            <div class = "new_subject">
            <button><a href = "../Subjects/Subject_form.php">New Subject</a></button>  
            </div>
            <div class = "Subject_Table">
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 15%">ID</th>
                                <th style = "width: 20%">Subject</th>
                                <th style = "width: 25%">Subject Code</th>
                                <th style = "width: 25%">Subject Type</th>
                                <th style = "width: 15%"></th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM subject";
                                $result = mysqli_query($connection, $select_all_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td style = 'width: 15%; text-align: center;'>" . $row['Id'] . "</td>" . "<td style = 'width: 20%; text-align: center;'>" . $row['Subject_Name'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Subject_Code'] . "</td>" . "<td style = 'width: 25%; text-align: center;'>" . $row['Subject_Type'] . "</td>";
                                    $_SESSION["surow"] = $row['Id'];
                                    echo "<td><form method = 'post' action = 'Subject.php' style = 'display: flex; flex-flow: column; gap: 0.25vw;'><button name = 'delete' value =" .  $_SESSION["surow"] . ">Delete</button></form></td>";
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