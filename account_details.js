

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

function colorLabel(str){
    str=String(str);
    var el=document.getElementById("colorLabel");
    el.style.color="black";
    if(str=="rdCirc"){
        el.innerHTML="RED: energetic, passionate";
    }
    else if(str=="orngCirc"){
        el.innerHTML="ORANGE: bold, cheerful";
    }
    else if(str=="yllwCirc"){
        el.innerHTML="YELLOW: bright, social";
    }
    else if(str=="grnCirc"){
        el.innerHTML="GREEN: sustainable, healthy";
    }
    else if(str=="blCirc"){
        el.innerHTML="BLUE: calm, intelligent";
    }
    else if(str=="prplCirc"){ 
        el.innerHTML="PURPLE: ambitious, wise";
    }
    else if(str=="gryCirc"){
         el.innerHTML="GRAY: reliable, mature";
    }
    else if(str=="pnkCirc"){
        el.innerHTML="PINK: compassionate, energetic";
    }
    else if(str=="clear"){
        el.style.color="white";
    }
}


