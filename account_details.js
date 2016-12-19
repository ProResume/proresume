

function dispResDetails(str){
    str=String(str);
    var el=document.getElementById(str).style;
    if(el.display=="none"){
        el.display="block";
    }
    else{
        el.display="none";
    }
    console.log(el.display);
}