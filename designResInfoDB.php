<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/webEditor.css">
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!--GET CONNECTION & COLOR-->
    <?php 
        include 'config.php'; 
        include 'getJSON.php';
        //do I need item above?
        include 'colorHexes.php';
        $colorDef ="SELECT ColorDef FROM Users WHERE UserId='1'";
        $result=mysqli_query($conn,$colorDef);
        $row=mysqli_fetch_assoc($result);
        $myColor="";
        switch ($row["ColorDef"]){
            case 'red':
                $myColor=$red;
                $colorArray=$redArray;
                break;
            case 'orange':
                $myColor=$orange;
                $colorArray=$orangeArray;
                break;
            case 'yellow':
                $myColor=$yellow;
                $colorArray=$yellowArray;
                break;
            case 'green':
                $myColor=$green;
                $colorArray=$greenArray;
                break;
            case 'blue':
                $myColor=$blue;
                $colorArray=$blueArray;
                break;
            case 'purple':
                $myColor=$purple;
                $colorArray=$purpleArray;
                break;
            case 'gray':
                $myColor=$gray;
                $colorArray=$grayArray;
                break;
            case 'pink':
                $myColor=$pink;
                $colorArray=$pinkArray;
                break;
        }
    ?>
    <style>
        h1,h2,h3{
            color: <?php echo $myColor?>;
        }
        svg{
            height:100% !important;
            overflow:hidden;
        }
    </style>
    <script type="text/javascript">
        google.charts.load('current',{'packages':['corechart','timeline']});
        google.charts.setOnLoadCallback(pieCharts);
        google.charts.setOnLoadCallback(expTimeline);
        google.charts.setOnLoadCallback(eduTimeline);
        google.charts.setOnLoadCallback(volunTimeline);

        function checkPreferences(){
            <?php
            $pref = "SELECT * FROM Resumes WHERE UserId='1' AND ResumeId='1'";
            $result=mysqli_query($conn,$pref);
            
            ?>
        }

        function pieCharts(chartToggle) {
            document.getElementById("skillChart").style.display="inline-block";
            document.getElementById("skillChart1").style.display="inline-block";
            document.getElementById("skillChart2").style.display="inline-block";
            document.getElementById("skillText").style.display="none";
            document.getElementById("skillText1").style.display="none";
            document.getElementById("skillText2").style.display="none";
             <?php
                //Skills INFO QUERY
                $skillsInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 6";
                $result=mysqli_query($conn,$skillsInfo);
            ?>
            var skillData = new google.visualization.arrayToDataTable([
                ['Skill','Proficiency'],
                <?php
                    while($row=mysqli_fetch_array($result)){
                        echo "['".$row["Skill"]."',".$row["Proficiency"]."],";
                    }
                ?>
            ]);

            <?php
                //Skills INFO QUERY 1
                $skillsInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 6,6";
                $result=mysqli_query($conn,$skillsInfo);
            ?>

            var skillData1 = new google.visualization.arrayToDataTable([
                ['Skill','Proficiency'],
                <?php
                    while($row=mysqli_fetch_array($result)){
                        echo "['".$row["Skill"]."',".$row["Proficiency"]."],";
                    }
                ?>
            ]);

            <?php
                //Skills INFO QUERY 2
                $skillsInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 12,6";
                $result=mysqli_query($conn,$skillsInfo);
            ?>

            var skillData2 = new google.visualization.arrayToDataTable([
                ['Skill','Proficiency'],
                <?php
                    while($row=mysqli_fetch_array($result)){
                        echo "['".$row["Skill"]."',".$row["Proficiency"]."],";
                    }
                ?>
            ]);
            if(chartToggle=='donut'){
                var skillOptions = coreChartOptions('donut');
            }
            else{
                var skillOptions = coreChartOptions('pie');
            }

            var skillChart = new google.visualization.PieChart(document.getElementById('skillChart'));
            skillChart.draw(skillData, skillOptions);

            var skillChart1 = new google.visualization.PieChart(document.getElementById('skillChart1'));
            skillChart1.draw(skillData1, skillOptions);

            var skillChart2 = new google.visualization.PieChart(document.getElementById('skillChart2'));
            skillChart2.draw(skillData2, skillOptions);
        }

        function coreChartOptions(chartType){
            if(chartType=='pie'){
                var options = {
                    slices:[
                    <?php
                            for($i=0;$i<sizeof($colorArray);$i++){
                                echo "{color:'".$colorArray[$i]."'},";
                            }
                    ?>  
                    ],
                    pieHole: 0
                }
            }
            else if(chartType=='donut'){
                var options = {
                    slices: [
                    <?php
                            for($i=0;$i<sizeof($colorArray);$i++){
                                echo "{color:'".$colorArray[$i]."'},";
                            }
                        ?>  
                    ],
                    pieHole: 0.5,
                }
            }
            else if(chartType=='bar'){
                var options = {
                    width:400,
                    height:200,
                    hAxis:{
                        title:'Proficiency Level',
                        minValue: 0,
                    },
                    color:<?php echo "'".$myColor."'";?>,
                }
            }
            else if(chartType=='timeline'){
                var options = {
                    timeline:{singleColor:<?php echo "'".$myColor."'";?>}
                }
            }
            return options;
        }

//EXPERIENCE INFO QUERY
        function expTimeline(){
            document.getElementById("expTimeline").style.display="inline-block";
            document.getElementById("expText").style.display="none";

             <?php
                $expInfo="SELECT Company, JobRole, YEAR(CompanyStart), MONTH(CompanyStart), DAY(CompanyStart), YEAR(CompanyEnd), MONTH(CompanyEnd), DAY(CompanyEnd) FROM ExperienceInfo WHERE UserId='1' ORDER BY CompanyStart DESC";
                $result=mysqli_query($conn,$expInfo);
            ?>

            var expChart = new google.visualization.Timeline(document.getElementById('expTimeline'));
            var expData = new google.visualization.DataTable();

            expData.addColumn({ type: 'string', id: 'Company' });
            expData.addColumn({ type: 'string', id: 'Role' });
            expData.addColumn({ type: 'date', id: 'Start' });
            expData.addColumn({ type: 'date', id: 'End' });

            <?php
                while($row=mysqli_fetch_array($result)){
                        $company = $row["Company"];
                        $jobRole = $row["JobRole"];
                        $yStart = $row["YEAR(CompanyStart)"];
                        $mStart = $row["MONTH(CompanyStart)"];
                        $dStart = $row["DAY(CompanyStart)"];
                        if($row["YEAR(CompanyEnd)"]==NULL){
                            $yEnd = date("Y");
                        }
                        else{
                            $yEnd = $row["YEAR(CompanyEnd)"];
                        }
                        if($row["MONTH(CompanyEnd)"]== NULL){
                            $mEnd = date("m");
                        }
                        else{
                            $mEnd = $row["MONTH(CompanyEnd)"];
                        }
                        if($row["DAY(CompanyEnd)"]==NULL){
                            $dEnd = date("d");
                        }
                        else{
                            $dEnd = $row["DAY(CompanyEnd)"];
                        }
                        echo "expData.addRow(['".$company."','".$jobRole."',new Date(".$yStart.",".$mStart.",".$dStart."), new Date(".$yEnd.",".$mEnd.",".$dEnd.")]); ";
             }
            ?>
            document.getElementById("expTimeline").style.height= expData.getNumberOfRows()*60;

            var expOptions = coreChartOptions('timeline');

            expChart.draw(expData, expOptions);
        }
/********************************************************************************/
//EDUCATION INFO QUERY
        function eduTimeline(){
            document.getElementById("eduTimeline").style.display="inline-block";
            document.getElementById("eduText").style.display="none";
           <?php
                $eduInfo="SELECT School, Major, YEAR(YearStart), MONTH(YearStart), DAY(YearStart), YEAR(YearEnd), MONTH(YearEnd), DAY(YearEnd) FROM EducationInfo WHERE UserId='1' ORDER BY YearEnd DESC";
                $result=mysqli_query($conn,$eduInfo);
            ?>

            var eduChart = new google.visualization.Timeline(document.getElementById('eduTimeline'));
            var eduData = new google.visualization.DataTable();

            eduData.addColumn({ type: 'string', id: 'School' });
            eduData.addColumn({ type: 'string', id: 'Major' });
            eduData.addColumn({ type: 'date', id: 'Start' });
            eduData.addColumn({ type: 'date', id: 'End' });
            <?php
                while($row=mysqli_fetch_array($result)){
                        $school = $row["School"];
                        $major = $row["Major"];
                        $yStart = $row["YEAR(YearStart)"];
                        $mStart = $row["MONTH(YearStart)"];
                        $dStart = $row["DAY(YearStart)"];
                        $yEnd = $row["YEAR(YearEnd)"];
                        $mEnd = $row["MONTH(YearEnd)"];
                        $dEnd = $row["DAY(YearEnd)"];
                        echo "eduData.addRow(['".$school."','".$major."',new Date(".$yStart.",".$mStart.",".$dStart."), new Date(".$yEnd.",".$mEnd.",".$dEnd.")]); ";
             }
            ?>
            document.getElementById("eduTimeline").style.height= eduData.getNumberOfRows()*60;
            var eduOptions = coreChartOptions('timeline');

            eduChart.draw(eduData, eduOptions);
        }
/********************************************************************************/
//VOLUNTEER INFO QUERY 
        function volunTimeline(){     
            document.getElementById("volunTimeline").style.display="inline-block";
            document.getElementById("volunText").style.display="none";    
           <?php
                $volunInfo="SELECT Organization, JobRole, VolunteerEnd, YEAR(VolunteerStart), MONTH(VolunteerStart), DAY(VolunteerStart), YEAR(VolunteerEnd), MONTH(VolunteerEnd), DAY(VolunteerEnd), JobDescript FROM VolunteerInfo WHERE UserId='1' ORDER BY VolunteerEnd DESC";
                $result=mysqli_query($conn,$volunInfo);
            ?>

            var volunChart = new google.visualization.Timeline(document.getElementById('volunTimeline'));
            var volunData = new google.visualization.DataTable();

            volunData.addColumn({ type: 'string', id: 'Organization' });
            volunData.addColumn({ type: 'string', id: 'JobRole' });
            volunData.addColumn({ type: 'date', id: 'Start' });
            volunData.addColumn({ type: 'date', id: 'End' });
            <?php
                while($row=mysqli_fetch_array($result)){
                        $org = $row["Organization"];
                        $volunJob = $row["JobRole"];
                        $yStart = $row["YEAR(VolunteerStart)"];
                        $mStart = $row["MONTH(VolunteerStart)"];
                        $dStart = $row["DAY(VolunteerStart)"];
                        $yEnd = $row["YEAR(VolunteerEnd)"];
                        $mEnd = $row["MONTH(VolunteerEnd)"];
                        $dEnd = $row["DAY(VolunteerEnd)"];
                        echo "volunData.addRow(['".$org."','".$volunJob."',new Date(".$yStart.",".$mStart.",".$dStart."), new Date(".$yEnd.",".$mEnd.",".$dEnd.")]); ";
                        }
            ?>
            document.getElementById("volunTimeline").style.height= volunData.getNumberOfRows()*60;
            var volunOptions = coreChartOptions('timeline');

            volunChart.draw(volunData, volunOptions);
        }

     function timelinesToText(){
            var eduText = document.getElementById("eduText");
            var expText = document.getElementById("expText");
            var volunText = document.getElementById("volunText");
          
            <?php
                        //EXPERIENCE INFO QUERY
                        $expTxtInfo="SELECT Company,JobRole,JobDescript,MONTHNAME(CompanyStart),YEAR(CompanyStart),MONTHNAME(CompanyEnd),YEAR(CompanyEnd),CompanyEnd FROM ExperienceInfo WHERE UserId='1' ORDER BY CompanyStart DESC LIMIT 2";
                        $result=mysqli_query($conn,$expTxtInfo);
                        echo "expText.innerHTML = \"";
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
                        echo "\";"
                    ?>
                    <?php
                        //VOLUNTEER INFO QUERY
                        $volunTxtInfo="SELECT Organization,JobRole,JobDescript,MONTHNAME(VolunteerStart),YEAR(VolunteerStart),MONTHNAME(VolunteerEnd),YEAR(VolunteerEnd),VolunteerEnd FROM VolunteerInfo WHERE UserId='1' ORDER BY VolunteerStart DESC LIMIT 1";
                        $result=mysqli_query($conn,$volunTxtInfo);
                        echo "volunText.innerHTML = \"";
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
                        echo "\";"
                    ?>     

        }

        function skillTextDisplay(){
            var skillText = document.getElementById("skillText");
            var skillText1 = document.getElementById("skillText1");
            var skillText2 = document.getElementById("skillText2");

            //SKILLS TABLE 1
             <?php 
                $skillInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 6";
                $result=mysqli_query($conn,$skillInfo);
                echo "skillText.innerHTML = \"";
                if(mysqli_num_rows($result)>0){
                    echo "<ul>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                        }
                        echo "</ul>";
                }
                echo "\";"
            ?>

            //SKILLS TABLE 2
            <?php 
                $skillInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 6,6";
                $result=mysqli_query($conn,$skillInfo);
                echo "skillText1.innerHTML = \"";
                if(mysqli_num_rows($result)>0){
                    echo "<ul>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                    }
                    echo "</ul>";
                }
                echo "\";"
            ?>

            //SKILLS TABLE 3
            <?php 
                $skillInfo="SELECT Skill, Proficiency FROM SkillsInfo WHERE UserId='1' ORDER BY Proficiency DESC LIMIT 12,6";
                $result=mysqli_query($conn,$skillInfo);
                echo "skillText2.innerHTML=\"";
                if(mysqli_num_rows($result)>0){
                    echo "<ul>";
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<li>".$row["Skill"].", ".$row["Proficiency"]."</li>";
                    }
                    echo "</ul>";
                }
                echo "\";"
            ?>
        } 
        function skillsToText(){
            document.getElementById("skillChart").style.display="none";
            document.getElementById("skillChart1").style.display="none";
            document.getElementById("skillChart2").style.display="none";
            document.getElementById("skillText").style.display="inline-block";
            document.getElementById("skillText1").style.display="inline-block";
            document.getElementById("skillText2").style.display="inline-block";
        }
        function timelinesToText(){
            document.getElementById("expTimeline").style.display="none";
            document.getElementById("eduTimeline").style.display="none";
            document.getElementById("volunTimeline").style.display="none";
            document.getElementById("expText").style.display="inline-block";
            document.getElementById("eduText").style.display="inline-block";
            document.getElementById("volunText").style.display="inline-block";
        }

    </script>
</head>
<body onload="checkPreferences()">

 <div id="leftToolBar">
     <h4>Left Tool Bar</h4>
     <h4>Education/Experience</h4>
     <p><a href="#" onclick="timelineTextDisplay();timelinesToText()"> Text </a></p>
     <p><a href="#" onclick="eduTimeline();"> Edu Timeline </a></p>
     <p><a href="#" onclick="expTimeline();"> Exp Timeline </a></p>
     <p><a href="#" onclick="volunTimeline();"> Volun Timeline </a></p>
     <h4>Skills/Interests</h4>
     <p><a href="#" onclick="skillTextDisplay();skillsToText();"> Text </a></p>
     <p><a href="#" onclick="pieCharts('pie');"> Pie Chart</a></p>
     <p><a href="#" onclick="pieCharts('donut');"> Donut Chart</a></p>
 </div>
<!--RESUME BODY-->
<div id="resumeContainer">
        <!--HEADER INFORMATION-->
        <div id="headerContainer">
            <div class="headerItem">
                <?php 
                    $userInfo="SELECT * FROM Users WHERE UserId='1' LIMIT 1";
                    $result=mysqli_query($conn,$userInfo);
                    $row=mysqli_fetch_assoc($result);
                    echo "<h1>" . $row["FirstName"] . " " . $row["LastName"] . "</h1>";
                ?>
            </div>
            <div class="headerItem">
                <div class="col-3"> <?php echo "<p>Phone: ". $row["Phone"] . "</p>"; ?> </div>
                <div class="col-3"> <?php echo "<p>Email: ". $row["Email"] . "</p>"; ?> </div>
                <div class="col-3"><?php echo "<p>Location: ". $row["City"].", ". $row["State"]."</p>"; ?> </div>
            </div>
        </div>

        <!--EDUCATION 1ST-->
         <div class="headerItem">
                <h3>Education</h3>
                <div id="eduTimeline" style="width:100%;">
                </div>
                <div id="eduText">
                  <?php
                        //EDUCATION INFO QUERY
                        $eduTxtInfo="SELECT School, Major, Major1, Minor, Minor1, CourseList, YearEnd, YEAR(YearStart), MONTHNAME(YearStart), DAY(YearStart),YEAR(YearEnd), MONTHNAME(YearEnd), DAY(YearEnd) FROM EducationInfo WHERE UserId='1' ORDER BY YearEnd DESC LIMIT 1";
                        $result=mysqli_query($conn,$eduTxtInfo);
                        echo "eduText.innerHTML = \"";
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
                                echo "<p>". $row["MONTHNAME(YearStart)"] . " " . $row["DAY(YearStart)"].", ".$row["YEAR(YearStart)"]." - ".$row["MONTHNAME(YearEnd)"]." ".$row["DAY(YearEnd)"].", ".$row["YEAR(YearEnd)"]."</p>";
                                echo "</div>";
                            }
                        }
                        echo "\";"
            ?>

                </div>
             <!--   <?php
                        $eduInfo="SELECT School, CourseList FROM EducationInfo WHERE UserId='1' ORDER BY YearEnd DESC";
                        $result=mysqli_query($conn,$eduInfo);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<p><b>".$row["School"]." Courses:</b> " . $row["CourseList"]."</p><br>";
                            }
                        } 
                    ?>-->
        </div>

        <!--SKILLS 2ND-->
        <div class="headerItem">
                <h3>Skills</h3>
                <div class="col-3">
                    <div id="skillChart" style="width: 100%; height: 100%;"></div>
                    <div id="skillText">
                    </div>
                </div>
                <div class="col-3">
                        <div id="skillChart1" style="width: 100%; height: 100%;"></div>
                        <div id="skillText1">
                    </div>
                </div>
                <div class="col-3">
                        <div id="skillChart2" style="width: 100%; height: 100%;"></div>
                        <div id="skillText2">
                    </div>
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

         <!--EXPERIENCE 4TH-->
        <div class="headerItem">
                <h3>Experience</h3>
                <div id="expTimeline" style="width:100%;"></div>
                <div id="expText"></div>
        </div>

       <!--VOLUNTEER 5TH-->
        <div class="headerItem">
            <h3>Volunteer</h3>          
            <div id="volunTimeline" style="width:100%"></div>
            <div id="volunText"></div>
        </div>
</div>
</body>
</html>
