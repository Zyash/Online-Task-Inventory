function show_city(str) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("drpcity").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("drpcity").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "action/get-city.php?q="+str, true);
  xhttp.send();   
}

function select_que(str) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("drpque").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("drpque").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "action/select_que.php?q="+str, true);
  xhttp.send();   
}

function check_email(str) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("hint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("hint").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "action/check_email.php?q="+str, true);
  xhttp.send();   
}

function check_phone(str) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("phone_hint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("phone_hint").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "action/check_email.php?p="+str, true);
  xhttp.send();   
}

function select_city(str,str1) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("drpcity").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("drpcity").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "../action/get-city-cd.php?q="+str+"&r="+str1, true);
  xhttp.send();   
}

function check_password(str) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("table_password").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("table_password").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "action/password-check.php?q="+str, true);
  xhttp.send();   
}

function check_emp_email(str,str1) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("email_msg").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("email_msg").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "../action/check_email.php?r="+str+"&reg_id="+str1, true);
  xhttp.send();   
}

function check_emp_phone(str,str1) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("mobile_msg").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("mobile_msg").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "../action/check_email.php?s="+str+"&reg_id="+str1, true);
  xhttp.send();   
}
function show_emp_city(str) 
{
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("drpcity").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("drpcity").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "../action/get-city.php?q="+str, true);
  xhttp.send();   
}

