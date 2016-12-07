var likeBtn = "Like Post";
var unlikeBtn = "Liked";

function likePost(ele, userid, postid) {
    if (likeBtn == "Liked") {
        $('#'+ele).removeClass("active");
        unlikePost(ele, userid, postid);
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
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&postid="+postid+"&action=likepost",true);
    xmlhttp.send();
}

function unlikePost(ele, userid, postid) {
    if (unlikeBtn == "Like Post") {
        $('#'+ele).addClass("active");
        likePost(ele, userid, postid);
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
    xmlhttp.open("GET","likeFunctions?userid="+userid+"&postid="+postid+"&action=unlikepost",true);
    xmlhttp.send();
}
