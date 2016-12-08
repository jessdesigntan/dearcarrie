
var followBtn = "Follow Topic";
var unfollowBtn = "Following";

function followTopic(userid, topicid) {
    if (followBtn == "Following") {
        unfollowTopic(userid, topicid);
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
            var res = this.responseText.trim();
            followBtn = res;
            unfollowBtn = res;
            $('#followBtn1').val(res);
            $('#unfollowBtn1').val(res);
            $('#followBtn2').val(res);
            $('#unfollowBtn2').val(res);
        }
    };
    xmlhttp.open("GET","followFunctions?userid="+userid+"&topicid="+topicid+"&action=followtopic",true);
    xmlhttp.send();
}

function unfollowTopic(userid, topicid) {
    if (unfollowBtn == "Follow Topic") {
        followTopic(userid, topicid);
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
            var res = this.responseText.trim();
            followBtn = res;
            unfollowBtn = res;
            $('#followBtn1').val(res);
            $('#unfollowBtn1').val(res);
            $('#followBtn2').val(res);
            $('#unfollowBtn2').val(res);
        }
    };
    xmlhttp.open("GET","followFunctions?userid="+userid+"&topicid="+topicid+"&action=unfollowtopic",true);
    xmlhttp.send();
}
