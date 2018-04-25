var xmlHttp;
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
function Cinemasearch(key){
    createXmlHttpRequestObject();
    var post_method='key='+ key;
    //alert(key);
    xmlHttp.open("POST","select_plan.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandlerCinema;
    xmlHttp.send(post_method);
}
function StatHandlerCinema(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){

        CinemaInfoShow.innerHTML = xmlHttp.responseText;

    }
}



function ChooseCinema(obj){
    var a = document.getElementById('cinemalist');
    a.style.color="#000";
    //alert(aaabbb);
    a.style.background="none";
    var b = document.getElementsByName("cinemalist2");
    for(var i=0;i<b.length;i++){
        b[i].style="background:none;color:#000;";

    }
    //alert(aaa);
    obj.style.color="#FFF";
    obj.style.background="#f42429";
    Cinemasearch(obj.innerText);


}