
function returnClass(ele) {
     return document.getElementById(ele).className;
}

function likePost(ele, userid, postid) {
  //alert(returnClass(ele));
  var className = returnClass(ele);
  if (className == "star-icon active") {
    $('#'+ele).removeClass("active");
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('#'+ele).removeClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&postid="+postid+"&action=unlikepost",true);
    xmlhttp.send();
    return;
  }
  else {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('#'+ele).addClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&postid="+postid+"&action=likepost",true);
    xmlhttp.send();
  }
}

function unlikePost(ele, userid, postid) {
  var className = returnClass(ele);
  if (className == "star-icon active") {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('#'+ele).removeClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&postid="+postid+"&action=unlikepost",true);
    xmlhttp.send();
  }
  else {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('#'+ele).addClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&postid="+postid+"&action=likepost",true);
    xmlhttp.send();
  }
}
