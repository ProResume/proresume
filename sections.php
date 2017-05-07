<!DOCTYPE html>
<html>
<head>
    <title>Resume Editor</title>
    <link rel="stylesheet" href="css/webEditor.css"/>
    <style>
        h1,h2,h3{
            color:lightcoral;    
        }
        .section-main{
            width:75%;
            float:left;
        }
        .section-aside{
            position:relative;
            top:0;
            right:0;
            text-align:justify;
        }
    </style>
</head>
<body>
    <?php include 'config.php'; ?>

    <div id="leftToolBar"><h4>Left Tool Bar</h4></div>
    <div id="resumeContainer">
        <div id="headerContainer">
            <div class="headerItem">
                <?php 
                    //USER BASIC INFO QUERY
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
                //SKILLS INFO QUERY
                $skillsInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC";
                $result=mysqli_query($conn,$skillsInfo);
            ?>
        </div>
        <div class="headerItem">
                <h3>Skills</h3>
                <div class="col-2"><?php 
                    if(mysqli_num_rows($result)>0){
                        echo "<ul>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                        }
                        echo "</ul>";
                    }
                ?></div>
                <div class="col-2">
                    <ul><li>CSS</li> <li>HTML</li> <li>JS</li></ul>
                </div>
        </div>
        <?php
            //EDUCATION INFO QUERY
            $eduInfo="SELECT School, YearStart, YearEnd, Major, Minor FROM EducationInfo WHERE UserId='1' ORDER BY YearEnd DESC";
            $result=mysqli_query($conn,$eduInfo);
        ?>
        <div class="headerItem">
                <h3>Education</h3>
                <div class="section-main">
                    <?php
                        $row=mysqli_fetch_assoc($result);
                        echo "<p><b>".$row["School"]."</b>,<i> Major in ".$row["Major"].", Minor in ".$row["Minor"].".</i></p>";
                    ?>
                    
                    <div class="section-aside">
                        <p>2000-2000<p>
                    </div>
                </div>
        </div>

         <?php
            //EXPERIENCE INFO QUERY
            $eduInfo="SELECT Company, YearStart, YearEnd, JobRole, JobDescript FROM ExperienceInfo WHERE UserId='1' ORDER BY YearEnd DESC";
            $result=mysqli_query($conn,$eduInfo);
        ?>
        <div class="headerItem">
                <h3>Experience</h3>
                <div class="section-main">
                <?php 
                    $row=mysqli_fetch_assoc($result);
                    echo "<p><b>".$row["Company"]."</b>,<i> ".$row["JobRole"]."</i> | ".$row["YearStart"] ."-Present</p>";
                    echo "<p>".$row["JobDescript"]."</p>";
                ?>
                </div>
        </div>

         <?php
            //VOLUNTEER INFO QUERY
            $eduInfo="SELECT Organization, YearStart, YearEnd, JobRole, JobDescript FROM VolunteerInfo WHERE UserId='1' ORDER BY YearEnd DESC";
            $result=mysqli_query($conn,$eduInfo);
        ?>
        <div class="headerItem">
                <h3>Volunteer</h3>
                <?php 
                    $row=mysqli_fetch_assoc($result);
                    echo "<p><b>".$row["Organization"]."</b>,<i> ".$row["JobRole"]."</i> | ".$row["YearStart"] ."-".$row["YearEnd"]. "</p>";
                    echo "<p>".$row["JobDescript"]."</p>";
                ?>
        </div>

    </div>
</body>
</html>
