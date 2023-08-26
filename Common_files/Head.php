<!-- <?php
    session_start();
?> -->

<div class = "header">
    <div class = "projname">
        Classroom Manager
    </div>
    <div class = "profile">
        <button>
            <a href = "../Login/login.php">
                <?php 
                    echo $_SESSION["username"]; 
                ?>
            </a>
        </button>
    </div>
</div>