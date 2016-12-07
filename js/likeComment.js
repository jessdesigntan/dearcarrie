var likeBtn = "Like Comment";
var unlikeBtn = "Liked";

function likeComment(ele, userid, commentid) {
    if (likeBtn == "Liked") {
        $('#'+ele).removeClass("active");
        unlikeComment(ele, userid, commentid);
        return;
    }
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
            $('#'+ele).addClass("active");
        }
    };
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&commentid="+commentid+"&action=likecomment",true);
    xmlhttp.send();
}

function unlikeComment(ele, userid, commentid) {
    if (unlikeBtn == "Like Comment") {
        $('#'+ele).addClass("active");
        likeComment(ele, userid, commentid);
        return;
    }
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
