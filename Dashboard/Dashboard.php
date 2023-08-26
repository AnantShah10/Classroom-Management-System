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
    <link rel="stylesheet" href="Dashboard.css">
    <title>Classroom Manager</title>
</head>
<body>
    <?php include('../Common_files/Menu.php');?>
    <div class = "body">
        <?php include('../Common_files/Head.php');?>
        <div class = "main_section">
            <div class = "dashboard-box">
                <div class = "dashboard-innerbox">
                    <div class = "icon"><img src = "../Icons/student-svgrepo-com.svg" alt = "Students"></div>
                    <div>Students</div>
                </div>
                <div class = "view">
                    <button>
                        <a href = "../Students/Student.php">
                        <img src = "../Icons/right-arrow-svgrepo-com.svg" alt = "right arrow"> 
                        <div>View</div>
                        </a>
                    </button>
                </div>
            </div>
            <div class = "dashboard-box">
                <div class = "dashboard-innerbox">
                <div class = "icon"><img src = "../Icons/teacher-svgrepo-com.svg" alt = "Teachers"></div>
                    <div>Teachers</div>
                </div>
                <div class = "view">
                    <button>
                        <a href = "../Teachers/Teacher.php">
                        <img src = "../Icons/right-arrow-svgrepo-com.svg" alt = "right arrow"> 
                        <div>View</div>
                        </a>
                    </button>
                </div>
            </div>
            <div class = "dashboard-box">
                <div class = "dashboard-innerbox">
                    <div class = "icon"><img src = "../Icons/blackboard-class-svgrepo-com.svg" alt = "Classes"></div>
                    <div>Classes</div>
                </div>
                <div class = "view">
                    <button>
                        <a href = "../Classes/Class.php">
                        <img src = "../Icons/right-arrow-svgrepo-com.svg" alt = "right arrow"> 
                        <div>View</div>
                        </a>
                    </button>
                </div>
            </div>
            <div class = "dashboard-box">
                <div class = "dashboard-innerbox">
                    <div class = "icon"><img src = "../Icons/book-svgrepo-com.svg" alt = "Subjects"></div>
                    <div>Subjects</div>
                </div>
                <div class = "view">
                    <button>
                        <a href = "../Subjects/Subject.php">
                        <img src = "../Icons/right-arrow-svgrepo-com.svg" alt = "right arrow"> 
                        <div>View</div>
                        </a>
                    </button>
                </div>
            </div>
            <div class = "dashboard-box">
                <div class = "dashboard-innerbox">
                    <div class = "icon"><img src = "../Icons/calendar-date-schedule-svgrepo-com.svg" alt = "Teacher's Schedule"></div>
                    <div>Teacher Schedule</div>
                </div>
                <div class = "view">
                    <button>
                        <a href = "../Teacher_Schedule/Teacher_Schedule.php">
                        <img src = "../Icons/right-arrow-svgrepo-com.svg" alt = "right arrow"> 
                        <div>View</div>
                        </a>
                    </button>
                </div>
            </div>
            <div class = "dashboard-box">
                <div class = "dashboard-innerbox">
                    <div class = "icon"><img src = "../Icons/eml-svgrepo-com.svg" alt = "Branch Schedule"></div>
                    <div>Branch Schedule</div>
                </div>
                <div class = "view">
                    <button>
                        <a href = "../Student_Schedule/Student_Schedule.php">
                        <img src = "../Icons/right-arrow-svgrepo-com.svg" alt = "right arrow"> 
                        <div>View</div>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>