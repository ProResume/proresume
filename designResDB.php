<!DOCTYPE html>
<html><head>
    <link rel="stylesheet" href="css/webEditor.css" type="text/css">
    <!--CONNECT AND GET COLOR-->
    <?php 
        include 'config.php'; 
        include 'colorHexes.php';
        $colorDef ="SELECT ColorDef FROM Users WHERE UserId='1'";
        $result=mysqli_query($conn,$colorDef);
        $row=mysqli_fetch_assoc($result);
        $myColor="";
        switch ($row["ColorDef"]){
            case 'red':
                $myColor=$red;
                break;
            case 'orange':
                $myColor=$orange;
                break;
            case 'yellow':
                $myColor=$yellow;
                break;
            case 'green':
                $myColor=$green;
                break;
            case 'blue':
                $myColor=$blue;
                break;
            case 'purple':
                $myColor=$purple;
                break;
            case 'gray':
                $myColor=$gray;
                break;
            case 'pink':
                $myColor=$pink;
                break;
        }
    ?>
    <style>
        h1,h2,h3{
            color: <?php echo $myColor?>;
        }
    </style>
</head>
<body>
    <div id="leftToolBar">
        
    
    </div>
    <!--RESUME BODY-->
    <div id="resumeContainer">

        <!--HEADER INFORMATION-->
        <div id="headerContainer">
            <div class="headerItem">
                <?php 
                    //USER BASIC INFO QUERY
                    $userInfo="SELECT * FROM Users WHERE UserId='1' LIMIT 1";
                    $result=mysqli_query($conn,$userInfo);
                    $row=mysqli_fetch_assoc($result);
                    echo "<h1>" . $row["FirstName"] . " " . $row["LastName"] . "</h1>";
                ?>
            </div>
            <div class="headerItem">
                <div class="col-3"> <?php echo "<p>Phone: ". $row["Phone"] . "</p>"; ?> </div>
                <div class="col-3"> <?php echo "<p>Email: ". $row["Email"] . "</p>"; ?> </div>
                <div class="col-3"><?php echo "<p>Location: ". $row["City"].", ". $row["State"]."</p>"; ?></div>
            </div>
        </div>

        <!--EDUCATION 1ST-->
         <div class="headerItem">
                <h3>Education</h3>
                <?php
                        //EDUCATION INFO QUERY
                        $eduInfo="SELECT * FROM EducationInfo WHERE UserId='1' ORDER BY YearEnd DESC LIMIT 1";
                        $result=mysqli_query($conn,$eduInfo);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<div class='section-main'>";
                                echo "<p><b>". $row["School"] . "</b></p>";
                                if($row["Major1"]!=NULL){
                                    echo "<p>".$row["Major"]." and ".$row["Major1"];
                                }
                                else{
                                    echo "<p>".$row["Major"];
                                }

                                if ($row["Minor1"]!=NULL && $row["Minor"]!= NULL){
                                    echo " and double minors in ".$row["Minor"]." and ".$row["Minor1"].".</p>";
                                }
                                else if($row["Minor1"]==NULL && $row["Minor"]!=NULL){
                                    echo " and a minor in " . $row["Minor"]."</p>";
                                }
                                else{
                                    echo ".</p>";
                                }
                                echo "<p><b>Courses:</b> " . $row["CourseList"]."</p></div> <div class='section-aside'>";
                                echo "<p>".$row["YearStart"]." - ".$row["YearEnd"]."</p>"; 
                                echo "</div>";
                            }
                        } 
                    ?>

        <!--SKILLS 2ND-->
        <div class="headerItem">
                <h3>Skills</h3>
                <div class="col-3" style="text-align:left">
                    <?php 
                        $skillInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 6";
                        $result=mysqli_query($conn,$skillInfo);
                        if(mysqli_num_rows($result)>0){
                            echo "<ul>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
                <div class="col-3" style="text-align:left">
                    <?php 
                        $skillInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 6,6";
                        $result=mysqli_query($conn,$skillInfo);
                        if(mysqli_num_rows($result)>0){
                            echo "<ul>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
                <div class="col-3" style="text-align:left">
                    <?php 
                        $skillInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 12,6";
                        $result=mysqli_query($conn,$skillInfo);
                        if(mysqli_num_rows($result)>0){
                            echo "<ul>";
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                            }
                            echo "</ul>";
                        }
                    ?>
                </div>
        </div>
        <!--PROJECTS 3RD-->
         <div class="headerItem">
                <h3>Projects</h3>
                    <?php
                        $projInfo = "SELECT ProjectName, Organization,ProjectRole,ProjectDescript, MONTHNAME(ProjectStart),YEAR(ProjectStart),MONTHNAME(ProjectEnd),YEAR(ProjectEnd),ProjectEnd FROM ProjectsInfo WHERE UserId='1' ORDER BY ProjectStart DESC";
                        $result=mysqli_query($conn,$projInfo);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<div class='section-main'>";
                                echo "<p><b>".$row["ProjectName"]."</b>, ".$row["Organization"]."</p>";
                                echo "<p>".$row["ProjectRole"]."</p></div> <div class='section-aside'>";
                                if($row["ProjectEnd"]!=NULL){
                                    echo "<p>".$row["MONTHNAME(ProjectStart)"].", ".$row["YEAR(ProjectStart)"]." - ".$row["MONTHNAME(ProjectEnd)"].", ".$row["YEAR(ProjectEnd)"]."</p>"; 
                                }
                                else{
                                    echo "<p>".$row["MONTHNAME(ProjectStart)"].", ".$row["YEAR(ProjectStart)"]." - Present</p>";
                                } 
                                echo "</div>"; 
                            }
                        }
                    ?>
                </div>
         </div>

         <!--EXPERIENCE 4TH-->
        <div class="headerItem">
                <h3>Experience</h3>
                <?php
                        //EXPERIENCE INFO QUERY
                        $expInfo="SELECT Company,JobRole,JobDescript,MONTHNAME(CompanyStart),YEAR(CompanyStart),MONTHNAME(CompanyEnd),YEAR(CompanyEnd),CompanyEnd FROM ExperienceInfo WHERE UserId='1' ORDER BY CompanyStart DESC LIMIT 2";
                        $result=mysqli_query($conn,$expInfo);
                        if(mysqli_num_rows($result)>0){
                           while($row=mysqli_fetch_assoc($result)){
                                echo "<div class='section-main'>";
                                echo "<p><b>". $row["Company"] . "</b></p>";
                                echo "<p>".$row["JobRole"]."</p>";
                                $jobDescript = explode(";",$row["JobDescript"]);
                                if(sizeof($jobDescript)>0){
                                    echo "<ul>";
                                    for($i=0;$i<sizeof($jobDescript);$i++){
                                        echo "<li>".$jobDescript[$i]."</li>";
                                    }
                                    echo "</ul>";
                                }
                                echo "</div> <div class='section-aside'>";
                                if($row["CompanyEnd"]!=NULL){
                                    echo "<p>".$row["MONTHNAME(CompanyStart)"].", ".$row["YEAR(CompanyStart)"]." - ".$row["MONTHNAME(CompanyEnd)"].", ".$row["YEAR(CompanyEnd)"]."</p>"; 
                                }
                                else{
                                    echo "<p>".$row["MONTHNAME(CompanyStart)"].", ".$row["YEAR(CompanyStart)"]." - Present</p>";
                                } 
                                echo "</div>"; 
                            }
                        }
                    ?>
        </div>

       <!--VOLUNTEER 5TH-->
        <div class="headerItem">
                <h3>Volunteer</h3>
                <?php
                        //VOLUNTEER INFO QUERY
                        $volunInfo="SELECT Organization,JobRole,JobDescript,MONTHNAME(VolunteerStart),YEAR(VolunteerStart),MONTHNAME(VolunteerEnd),YEAR(VolunteerEnd),VolunteerEnd FROM VolunteerInfo WHERE UserId='1' ORDER BY VolunteerStart DESC LIMIT 1";
                        $result=mysqli_query($conn,$volunInfo);
                        if(mysqli_num_rows($result)>0){
                           while($row=mysqli_fetch_assoc($result)){
                                echo "<div class='section-main'>";
                                echo "<p><b>". $row["Organization"] . "</b></p>";
                                echo "<p>".$row["JobRole"]."</p>";
                                $jobDescript = explode(";",$row["JobDescript"]);
                                if(sizeof($jobDescript)>0){
                                    echo "<ul>";
                                    for($i=0;$i<sizeof($jobDescript);$i++){
                                        echo "<li>".$jobDescript[$i]."</li>";
                                    }
                                    echo "</ul>";
                                }
                                echo "</div> <div class='section-aside'>";
                                if($row["VolunteerEnd"]!=NULL){
                                    echo "<p>".$row["MONTHNAME(VolunteerStart)"].", ".$row["YEAR(VolunteerStart)"]." - ".$row["MONTHNAME(VolunteerEnd)"].", ".$row["YEAR(VolunteerEnd)"]."</p>"; 
                                }
                                else{
                                    echo "<p>".$row["MONTHNAME(VolunteerStart)"].", ".$row["YEAR(VolunteerStart)"]." - Present</p>";
                                } 
                                echo "</div>"; 
                            }
                        }
                    ?>     
        </div>

    </div>



</body>
</html>