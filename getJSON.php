<?php

include 'config.php';

$jsonArray = array();
/*$userInfo="SELECT * FROM Users";
$result=mysqli_query($conn,$userInfo);

while($row=mysqli_fetch_assoc($result)){
    $row_array["UserId"] = $row["UserId"];
    $row_array["FirstName"] = $row["FirstName"];
    $row_array["LastName"] = $row["LastName"];
    $row_array["City"] = $row["City"];
    $row_array["State"] = $row["State"];
    $row_array["Email"] = $row["Email"];
    $row_array["Password"] = $row["Password"];
    $row_array["WebLink"] = $row["WebLink"];
    $row_array["WebLink1"] = $row["WebLink1"];
    $row_array["Phone"] = $row["Phone"];
    $row_array["Email1"] = $row["Email1"];
    $row_array["Objective"] = $row["Objective"];
    $row_array["Statement"] = $row["Statement"];
    $row_array["Email"] = $row["Email"];
    $row_array["eduTypeDef"] = $row["eduTypeDef"];
    $row_array["expTypeDef"] = $row["expTypeDef"];
    $row_array["intTypeDef"] = $row["intTypeDef"];
    $row_array["projTypeDef"] = $row["projTypeDef"];
    $row_array["skillTypeDef"] = $row["skillTypeDef"];
    $row_array["volunTypeDef"] = $row["volunTypeDef"];
    $row_array["ColorDef"] = $row["ColorDef"];

    array_push($jsonArray,$row_array);
}

$skillsInfo="SELECT * FROM SkillsInfo";
$result=mysqli_query($conn,$skillsInfo);

while($row=mysqli_fetch_assoc($result)){
    $row_array["SkillId"] = $row["SkillId"];
    $row_array["UserId"] = $row["UserId"];
    $row_array["Skill"] = $row["Skill"];
    $row_array["Proficiency"] = $row["Proficiency"];

    array_push($jsonArray,$row_array);
}

$volunInfo="SELECT * FROM VolunteerInfo";
$result=mysqli_query($conn,$volunInfo);

while($row=mysqli_fetch_assoc($result)){
    $row_array["VolunteerId"] = $row["VolunteerId"];
    $row_array["UserId"] = $row["UserId"];
    $row_array["Organization"] = $row["Organization"];
    $row_array["VolunteerStart"] = $row["VolunteerStart"];
    $row_array["VolunteerEnd"] = $row["VolunteerEnd"];
    $row_array["JobRole"] = $row["JobRole"];
    $row_array["JobDescript"] = $row["JobDescript"];

    array_push($jsonArray,$row_array);
}

$projInfo="SELECT * FROM ProjectsInfo";
$result=mysqli_query($conn,$projInfo);

while($row=mysqli_fetch_assoc($result)){
    $row_array["ProjId"] = $row["ProjId"];
    $row_array["UserId"] = $row["UserId"];
    $row_array["Organization"] = $row["Organization"];
    $row_array["ProjectStart"] = $row["ProjectStart"];
    $row_array["ProjectEnd"] = $row["ProjectEnd"];
    $row_array["ProjectRole"] = $row["ProjectRole"];
    $row_array["ProjectDescript"] = $row["ProjectDescript"];
    $row_array["ProjectName"] = $row["ProjectName"];

    array_push($jsonArray,$row_array);
}

$intInfo="SELECT * FROM InterestsInfo";
$result=mysqli_query($conn,$intInfo);

while($row=mysqli_fetch_assoc($result)){
    $row_array["InterestId"] = $row["InterestId"];
    $row_array["UserId"] = $row["UserId"];
    $row_array["Interest"] = $row["Interest"];
    $row_array["Level"] = $row["Level"];

    array_push($jsonArray,$row_array);
}

$expInfo="SELECT * FROM ExperienceInfo";
$result=mysqli_query($conn,$expInfo);

while($row=mysqli_fetch_assoc($result)){
    $row_array["ExpId"] = $row["ExpId"];
    $row_array["UserId"] = $row["UserId"];
    $row_array["Company"] = $row["Company"];
    $row_array["CompanyStart"] = $row["CompanyStart"];
    $row_array["CompanyEnd"] = $row["CompanyEnd"];
    $row_array["JobRole"] = $row["JobRole"];
    $row_array["JobDescript"] = $row["JobDescript"];

    array_push($jsonArray,$row_array);
}*/

$eduInfo="SELECT * FROM EducationInfo";
$result=mysqli_query($conn,$eduInfo);
$row=mysqli_fetch_assoc($result);
  /*  $row_array["EduId"] = $row["EduId"];
    $row_array["UserId"] = $row["UserId"];
    $row_array["School"][] = $row["School"];
    $row_array["YearStart"][] = $row["YearStart"];
    $row_array["YearEnd"][] = $row["YearEnd"];
    $row_array["Major"][] = $row["Major"];
   $row_array["Major1"] = $row["Major1"];
    $row_array["Minor"] = $row["Minor"];
    $row_array["Minor1"] = $row["Minor1"];
    $row_array["CourseList"] = $row["CourseList"];*/

    $array['cols'][] = array('type'=> 'string');
    $array['cols'][] = array('type'=> 'string');
    $array['cols'][] = array('type'=> 'date');
    $array['cols'][] = array('type'=> 'date');

    $array['rows'][] = array('c' => array('v' => $row["School"]));
    $array['rows'][] = array('c' => array('v' => $row["Major"]));
    $array['rows'][] = array('c' => array('v' => $row["YearStart"]));
    $array['rows'][] = array('c' => array('v' => $row["YearEnd"]));
    

    array_push($jsonArray,$array);


json_encode($jsonArray);

?>