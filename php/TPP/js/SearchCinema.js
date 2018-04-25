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
function AreaSearch(key){
    createXmlHttpRequestObject();
    var post_method='key='+ key;
    //alert(key);
    xmlHttp.open("POST","select_cinema.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandlerArea;
    xmlHttp.send(post_method);
}
function StatHandlerArea(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){
        CinemaShow.innerHTML = xmlHttp.responseText;
        /*alert(aaa);
        CinemaIndoShow.hidden;*/
    }
}

function ChooseArea(obj){
    var a = document.getElementById('arealist');

    a.style.color="#000";
    a.style.background="none";
    var b = document.getElementsByName("arealist2");
    for(var i=0;i<b.length;i++){
        b[i].style="background:none;color:#000;";

    }
    //alert(aaa);
    obj.style.color="#FFF";
    obj.style.background="#f42429";
    AreaSearch(obj.innerText);

    var pass = DateType + "#" + obj.innerText;
    //alert(pass);
    //Timesearch(pass);
}

