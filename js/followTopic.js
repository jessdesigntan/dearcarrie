
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
            followBtn = this.responseText;
            unfollowBtn = this.responseText;
            $('#followBtn1').val(this.responseText);
            $('#unfollowBtn1').val(this.responseText);
            $('#followBtn2').val(this.responseText);
            $('#unfollowBtn2').val(this.responseText);
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
            followBtn = this.responseText;
            unfollowBtn = this.responseText;
            $('#followBtn1').val(this.responseText);
            $('#unfollowBtn1').val(this.responseText);
            $('#followBtn2').val(this.responseText);
            $('#unfollowBtn2').val(this.responseText);
        }
    };
    xmlhttp.open("GET","followFunctions?userid="+userid+"&topicid="+topicid+"&action=unfollowtopic",true);
    xmlhttp.send();
}
