
function returnClass(ele) {
     return document.getElementById(ele).className;
}


function likeComment(ele, userid, commentid) {
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
            likeBtn = this.responseText.trim();
            unlikeBtn = this.responseText.trim();
            $('#'+ele).removeClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&commentid="+commentid+"&action=unlikecomment",true);
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
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&commentid="+commentid+"&action=likecomment",true);
    xmlhttp.send();
  }
}

function unlikeComment(ele, userid, commentid) {
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
            likeBtn = this.responseText.trim();
            unlikeBtn = this.responseText.trim();
            $('#'+ele).removeClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&commentid="+commentid+"&action=unlikecomment",true);
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
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&commentid="+commentid+"&action=likecomment",true);
    xmlhttp.send();
  }

}
