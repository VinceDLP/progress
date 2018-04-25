var xmlHttp;
var DateType = 1;
function createXmlHttpRequestObject(){
    if(window.ActiveXObject){
        try{
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp=false;
        }
    }else{
        try{
            xmlHttp=new XMLHttpRequest();
        }catch(e){
            xmlHttp=false;
        }
    }
    if(!xmlHttp)
        alert("aaaa");
    else
        return xmlHttp;
}
function Timesearch(key){
    createXmlHttpRequestObject();
    var post_method='key='+ key;
    //alert(key);
    xmlHttp.open("POST","select_time.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandlerTime;
    xmlHttp.send(post_method);
}
function StatHandlerTime(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){

        PlanShow.innerHTML = xmlHttp.responseText;

    }
}



function ChooseTime(obj,type){
    var a = document.getElementById('timelist');
    a.style.color="#000";

    a.style.background="none";
    var b = document.getElementsByName("timelist2");
    for(var i=0;i<b.length;i++){
        b[i].style="background:none;color:#000;";

    }
    var CinemaName = document.getElementById('CinemaName');
    var name = CinemaName.innerText;
    //alert(name);

    DateType = type;
    var pass = type +"#"+ name;

    //alert(pass);

    obj.style.color="#FFF";
    obj.style.background="#f42429";
    Timesearch(pass);

}