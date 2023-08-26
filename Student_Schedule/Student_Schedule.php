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
    <link rel="stylesheet" href="Student_Schedule.css">
    <title>Classroom Manager</title>
</head>
<body>
    <?php include('../Common_files/Menu.php');?>
    <div class = "body">
        <?php include('../Common_files/Head.php');?>
        <div class = "main_section">
            <div class = "section_name">Student's Schedule</div>
            <div class = "Schedule_Table">
                <div class = "Table">
                    <table>
                        <thead>
                            <tr>
                                <th style = "width: 40%; text-align: center;">Year of Study</th>
                                <th style = "width: 60%; text-align: center;">Schedule</th>
                            </tr>
                        </thead>
                        <tr>
                            <td style = "width: 40%; text-align: center;">FY</td>
                            <td style = "width: 60%; text-align: center;"><button><a href = "https://kjsce.s3.ap-south-1.amazonaws.com/Exam/SVU_Notices/ESE+TIME+TABLE-FY+BTECH+SEM+I_2021-22_FOR+JAN+2022+BATCH.pdf">Link</a></button></td>
                        </tr>
                        <tr>
                            <td style = "width: 40%; text-align: center;">SY</td>
                            <td style = "width: 60%; text-align: center;"><button><a href = "https://kjsce.s3.ap-south-1.amazonaws.com/Exam/SVU_TT/EXAM+TT_SEM-IV+(SVU+2020)_MJ22.pdf">Link</a></button></td>
                        </tr>
                        <tr>
                            <td style = "width: 40%; text-align: center;">TY</td>
                            <td style = "width: 60%; text-align: center;"><button><a href = "https://kjsce.s3.ap-south-1.amazonaws.com/Exam/TimbTable/EXAM+TT_SEM-VI+(KJSCE+2018)_MJ22.pdf">Link</a></button></td>
                        </tr>
                        <tr>
                            <td style = "width: 40%; text-align: center;">LY</td>
                            <td style = "width: 60%; text-align: center;"><button><a href = "https://kjsce.s3.ap-south-1.amazonaws.com/Exam/TimbTable/EXAM+TT_SEM-VIII+(KJSCE+2018)_MJ22.pdf">Link</a></button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>