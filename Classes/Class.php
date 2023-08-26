<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Common_files/Common_css.css">
    <link rel="stylesheet" href="Class.css">
    <title>Classroom Manager</title>
</head>
<body>
    <?php include('../Common_files/Menu.php');?>
    <div class = "body">
        <?php include('../Common_files/Head.php');?>
        <div class = "main_section">
            <div class = "section_name">Classes</div>
            <div class = "Class_Table">
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 40%">Year of Study</th>
                                <th style = "width: 60%">Number of Students</th>
                            </tr>
                        </thead>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'wp2_mini_project');
                            
                            if ($connection) {
                                $select_all_query = "SELECT * FROM student";
                                $result = mysqli_query($connection, $select_all_query);
                                $fycount = 0;
                                $sycount = 0;
                                $tycount = 0;
                                $lycount = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row['Year_of_Study'] == 'FY') {
                                        $fycount += 1;
                                    }
                                    elseif ($row['Year_of_Study'] == 'SY') {
                                        $sycount += 1;
                                    }
                                    elseif ($row['Year_of_Study'] == 'TY') {
                                        $tycount += 1;
                                    }
                                    elseif ($row['Year_of_Study'] == 'LY') {
                                        $lycount += 1;
                                    }
                                }
                                echo "<tr><td style = 'width: 40%; text-align: center;'> FY </td> <td style = 'width: 60%; text-align: center;'>" . $fycount . "</td></tr>";
                                echo "<tr><td style = 'width: 40%; text-align: center;'> SY </td> <td style = 'width: 60%; text-align: center;'>" . $sycount . "</td></tr>";
                                echo "<tr><td style = 'width: 40%; text-align: center;'> TY </td> <td style = 'width: 60%; text-align: center;'>" . $tycount . "</td></tr>";
                                echo "<tr><td style = 'width: 40%; text-align: center;'> LY </td> <td style = 'width: 60%; text-align: center;'>" . $lycount . "</td></tr>";
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