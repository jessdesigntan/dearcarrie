var followBtn = "Follow";
var unfollowBtn = "Following";

function followUser(currentUser, userid) {
    if (followBtn == "Following") {
        unfollowUser(currentUser, userid);
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
            followBtn = this.responseText.trim();
            unfollowBtn = this.responseText.trim();
            $('#followBtn1').val(this.responseText.trim());
            $('#unfollowBtn1').val(this.responseText.trim());
        }
    };
    xmlhttp.open("GET","followFunctions?userid="+userid+"&currentuser="+currentUser+"&action=followuser",true);
    xmlhttp.send();
}

function unfollowUser(currentUser, userid) {
    if (unfollowBtn == "Follow") {
        followUser(currentUser, userid);
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
            followBtn = this.responseText.trim();
            unfollowBtn = this.responseText.trim();
            $('#followBtn1').val(this.responseText.trim());
            $('#unfollowBtn1').val(this.responseText.trim());
        }
    };
    //xmlhttp.open("GET","unfollowPosts?userid="+userid+"&postid="+postid,true);
    xmlhttp.open("GET","followFunctions?userid="+userid+"&currentuser="+currentUser+"&action=unfollowuser",true);
    xmlhttp.send();
}

//script for navigation
$("#postTab").addClass("active");
removeActiveDiv();
$("#postDiv").show();

function nav(e) {
  removeActiveTab();
  $("#"+e).addClass("active");

  if (e == "postTab") {
    removeActiveDiv();
    $("#postDiv").fadeIn();
  }

  if (e == "likeTab") {
    removeActiveDiv();
    $("#likesDiv").fadeIn();
  }

  if (e == "commentTab") {
    removeActiveDiv();
    $("#commentsDiv").fadeIn();
  }

  if (e == "topicTab") {
    removeActiveDiv();
    $("#topicsDiv").fadeIn();
  }

  if (e == "followingTab") {
    removeActiveDiv();
    $("#followingDiv").fadeIn();
  }

  if (e == "followTab") {
    removeActiveDiv();
    $("#followersDiv").fadeIn();
  }

  if (e == "postFollowTab") {
    removeActiveDiv();
    $("#postfollowDiv").fadeIn();
  }
}

function removeActiveTab() {
  $("#postTab").removeClass("active");
  $("#likeTab").removeClass("active");
  $("#commentTab").removeClass("active");
  $("#topicTab").removeClass("active");
  $("#followingTab").removeClass("active");
  $("#followTab").removeClass("active");
  $("#postFollowTab").removeClass("active");
}

function removeActiveDiv() {
  $("#postDiv").hide();
  $("#likesDiv").hide();
  $("#commentsDiv").hide();
  $("#topicsDiv").hide();
  $("#followingDiv").hide();
  $("#followersDiv").hide();
  $("#postfollowDiv").hide();
}
