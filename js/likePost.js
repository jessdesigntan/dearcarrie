
var likeBtn = "Follow Post";
var unlikeBtn = "Following";

function likePost(userid, postid) {
    if (followBtn == "Following") {
        unfollowPost(userid, postid);
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
            //followBtn = this.responseText;
            //unfollowBtn = this.responseText;
            $('#followBtn1').val(this.responseText);
            $('#unfollowBtn1').val(this.responseText);
        }
    };
    xmlhttp.open("GET","followFunctions?userid="+userid+"&postid="+postid+"&action=followpost",true);
    xmlhttp.send();
}

function unfollowPost(userid, postid) {
    if (unfollowBtn == "Follow Post") {
        followPost(userid, postid);
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
            followBtn = this.responseText;
            unfollowBtn = this.responseText;
            $('#followBtn1').val(this.responseText);
            $('#unfollowBtn1').val(this.responseText);
        }
    };
    //xmlhttp.open("GET","unfollowPosts?userid="+userid+"&postid="+postid,true);
    xmlhttp.open("GET","followFunctions?userid="+userid+"&postid="+postid+"&action=unfollowpost",true);
    xmlhttp.send();
}


$('.delete').on('click', function () {
     return confirm('Are you sure you want to delete this comment?');
 });
