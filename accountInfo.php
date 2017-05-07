<!DOCTYPE html>
<html>
    <head>
        <title> Account Info </title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
    </head>
    <body>
         <nav class="navbar navbar-inverse navbar-fixed-top navbar-index navbar-inline">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="index.html#home">Home</a></li>
                </ul>
            </div>
        </nav>
        <?php
            $getTypes="SELECT * FROM ResumeTypes WHERE UserId='1'";
            $result=mysqli_query($conn,$getTypes);
            $row=mysqli_fetch_assoc($result);
            $hasEngr = 0;
            $hasDsgn = 0;
            $hasBusn = 0;
            $hasNonp = 0;
            for($i=0;$i<sizeof($getTypes);$i++){
                if($getTypes[$i]=='design' && $hasDsgn==0){
                    $hasDsgn = 1;
                }
                if($getTypes[$i]=='engineering' && $hasEngr==0){
                    $hasEngr = 1;
                }
                if($getTypes[$i]=='business' && $hasBusn==0){
                    $hasBusn = 1;
                }
                if($getTypes[$i]=='nonprofit' && $hasNonp==0){
                    $hasNonp = 1;
                }
            }

            if($hasEngr){
                echo "<h1>Engineering Resumes</h1>";
            }
            if($hasDsgn){
                echo "<h1>Design Resumes</h1>";
            }
            if($hasBusn){
                echo "<h1>Business Resumes</h1>";
            }
            if($hasNonp){
                echo "<h1>Non-Profit/Research Resumes</h1>";
            }
        ?>

    </body>
</html>