<!DOCTYPE html>
<html>
<head>
    <title>Resume Editor</title>
    <link rel="stylesheet" href="css/webEditor.css"/>
</head>
<body>
    <?php include 'config.php'; ?>

    <div id="leftToolBar"><h3>Left Tool Bar</h3></div>
    <div id="resumeContainer">
        <div id="headerContainer">
            <div class="headerItem">
                <?php 
                    $userInfo="SELECT FirstName, LastName, Phone, Email, City, State, Objective FROM Users WHERE UserId='1'";
                    $result=mysqli_query($conn,$userInfo);
                    $row=mysqli_fetch_assoc($result);
                    echo "<h1>" . $row["FirstName"] . " " . $row["LastName"] . "</h1>";
                ?>
            </div>
            <div class="headerItem">
                <div class="col-3"><?php echo "<h3>Phone: " . $row["Phone"] . "</h3>";?></div>
                <div class="col-3"><?php echo "<h3>Email: " . $row["Email"] . "</h3>";?></div>
                <div class="col-3"><?php echo "<h3>Location: " . $row["City"] . ", " . $row["State"] . "</h3>";?></div>
            </div>
            <div class="headerItem">
                <h3>Objective</h3>
                <?php echo "<p>".$row["Objective"]."</p>";?>
            </div>
            <?php 
                $skillsInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1'";
                $result=mysqli_query($conn,$skillsInfo);
            ?>
        </div>
        <div class="headerItem">
                <h3>Skills</h3>
                <?php 
                    if(mysqli_num_rows($result)>0){
                        echo "<ul>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                        }
                        echo "</ul>";
                    }
                ?>
        </div>
        <div class="headerItem">
                <h3>Education</h3>
                <p> ... </p>
        </div>
        <div class="headerItem">
                <h3>Experience</h3>
                <div class="col-2"><p> ... </p></div>
                <div class="col-2"><p> ... </p></div>
        </div>
        <div class="headerItem">
                <h3>Volunteer</h3>
                <div class="col-3"><p> ... </p></div>
                <div class="col-3"><p> ... </p></div>
                <div class="col-3"><p> ... </p></div>
        </div>

    </div>
</body>
</html>
