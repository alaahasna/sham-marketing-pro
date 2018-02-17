function login(){

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var error = document.getElementById("error");
    if(username.length != 0){
    if(password.length != 0){
       var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        error.innerHTML=xmlhttp.responseText;
        if(xmlhttp.responseText == 'done'){
          error.innerHTML="<img src='images/loading.gif' width='35px' />";
          window.location.assign("index.php");
        }

      }
    }
    xmlhttp.open("GET","login.php?username="+username+"&password="+password,true);
    xmlhttp.send();
    }else{
       error.innerHTML = "Password is Empty!";
    }
    }else{
       error.innerHTML = "Email is Empty!";
    }
    }