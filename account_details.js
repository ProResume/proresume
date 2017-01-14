

function dispResDetails(str){
    str=String(str);
    var el=document.getElementById(str).style;
    if(el.display=="none"){
        el.display="block";
    }
    else if(el.display=="block"){
        el.display="none";
    }
    else{
        el.display="block";
    }
    console.log(el.display);
}

function colorLabel(el){
    el=String(str);
    var el=document.getElementById("colorLabel").innerHTML;
    if(str=="rdCirc") el="RED";
    else if(str=="orngCirc")  el="ORANGE";
    else if(str=="yllwCirc")  el="YELLOW";
    else if(str=="grnCirc") el="GREEN";
    else if(str=="blCirc") el="BLUE";
    else if(str=="prplCirc") el="PURPLE";
    else if(str=="grCirc") el="GRAY";
    else if(str=="pnkCirc") el="PINK";
    else if(str==null || str=="") el="";  
            
}
