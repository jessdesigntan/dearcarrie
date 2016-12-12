<?php
  ob_start();
  session_start();
  include('commonFunctions.php');
?>


<?php
/**
 * Display <head> section, include all dependencies for NORMAL users pages
 *
 * @param $title show page title
 * @return <head> html codes
 */
function head($title){
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="http://imgur.com/a/qtFfN">
<!--     <?php if($ogTitle == "" || $ogTitle == null) { ?>
      <meta property="og:title" content="<?=$ogTitle;?>">
    <?php } else { ?>
      <meta property="og:title" content="Write to Carrie about your problems">
    <?php } ?> -->
    <title><?=$title;?></title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- Own style & js -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/frontend.js"></script>
    <script src="js/form_validation.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- angularjs -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/autocomplete.js"></script>

    <!-- wow.js for css animations & initialization -->
    <script src="js/wow.js"></script>
    <script src="js/pace.js"></script>
    <script>new WOW().init();</script>
    <script>
      $(window).load(function() {
      	$(".loader").fadeOut("slow");
      })
    </script>

  </head>
<?php
}

/**
 * Display top navbar for all pages
 *
 * @param nil
 * @return top navbar html codes
 */
function navbar() {
  $featuredTopics = displayFeaturedTopics();
  $countNotifications = count(getUnseenNotificationCount($_SESSION["userid"]));
?>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid page-container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index"><img alt="brand" src="images/logo.svg" width="160px;"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav hide-mobile">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Topics <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php foreach ($featuredTopics as $featuredTopic) { ?>
              <li><a href="topicDetails?topicID=<?=$featuredTopic["id"];?>"><?=$featuredTopic["title"];?></a></li>
              <?php } ?>
              <div class="divider"></div>
              <li><a href="topic">All Topics</a></li>
            </ul>
          </li>
        </ul>
        <form id="myForm" class="navbar-form navbar-left hide-mobile" action="search" method="get">
            <input id="search_keyword_id" type="text" class="search_keyword nav-search" placeholder="Search anything . . ." name="search_keyword_id" autocomplete="off">
            <button type="submit" class="hidden-submit"></button>
            <div id="result"></div>
        </form>

        <ul class="nav navbar-nav navbar-right">
          <!-- not signed in -->
          <?php if (checkLogin()) { ?>
          <li><a href="login" class="light-text">Login</a></li>
          <li><a href="signup" class="cta-btn">Sign up</a></li>
          <?php } ?>
          <!-- /not signed in -->

          <!-- signed in for mobile -->
          <?php if (!checkLogin()) { ?>
            <li><a href="addPost" class="cta-btn" >Post</a></li>
            <li class="show-mobile"><a href="profile" class="light-text"><?=$_SESSION["name"];?></a></li>
            <?php if (checkRole($_SESSION["role"], "admin")) { ?>
              <li class="show-mobile"><a href="dashboard" class="light-text">Admin Dashboard</a></li>
            <?php } ?>
            <li class="show-mobile"><a href="editProfile?userID=<?=$_SESSION["userid"];?>" class="light-text">Edit Profile</a></li>
            <li class="show-mobile"><a href="notifications" class="light-text">Notifications</a></li>
            <li class="show-mobile"><a href="logout" class="light-text">Logout</a></li>
          <?php } ?>
          <!-- /signed in for mobile-->


          <!-- signed in for desktop -->
          <li class="dropdown hide-mobile">
            <?php if (!checkLogin()) { ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?=$_SESSION["name"];?>
              <?php if($countNotifications != 0) { ?>
              <span class="badge"><?=$countNotifications?></span>
              <?php } ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="profile?userID=<?=$_SESSION["userid"];?>">Profile</a></li>
              <li><a href="addPost">Add Post</a></li>
              <li><a href="editProfile?userID=<?=$_SESSION["userid"];?>">Edit Profile</a></li>
              <li><a href="notifications">Notifications
                <?php if($countNotifications != 0) { ?>
                  <span class="badge"><?=$countNotifications;?></span>
                <?php } ?>
              </a></li>
              <?php if (checkRole($_SESSION["role"], "admin")) { ?>
                <li role="separator" class="divider"></li>
                <li><a href="dashboard">Admin Dashboard</a></li>
                <li><a href="userList">Users</a></li>
                <li><a href="postList">Post</a></li>
                <li><a href="topicList">Topics</a></li>
                <li><a href="reportList">Report</a></li>
              <?php } ?>
              <li role="separator" class="divider"></li>
              <li><a href="logout">Logout</a></li>
            </ul>
            <?php } ?>
          </li>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

    <div class="mobile-search-bar show-mobile">
        <form action="search">
            <input type="text" class="nav-search" placeholder="Search anything . . .">
        </form>
    </div><!--/.mobile-search-bar -->
  </nav>
<?php
}

function card($id) {
  $post = getPostByID($id);
  $user = getUserByID($post["userid"]);
  $likedPost = hasLikedPost($_SESSION["userid"], $id);
  $postLikeCount = countPostLikes($id);
  $commentCount = countCommentsByPostID($id);
?>
<div class="card">
  <div class="header">
    <div class="image">
      <a href="profile?userID=<?=$user["id"];?>"><img src="<?=$user["image"];?>"></a>
    </div>
    <div class="author-details">
      <div>
        <a href="profile?userID=<?=$user["id"];?>"><?=$user["name"];?></a>
        <span class="topics-comma">
        <?php
           $topics = getPostTopics($id);
           if (count($topics) > 0) { echo ' in ';}
           foreach ($topics as $topic) {
       ?>
             <a href="topicDetails?topicID=<?=$topic["topicid"];?>"><?=$topic["title"];?></a>
       <?php
           }
        ?>
       </span>
      </div>
      <div class="date"><?php echo calculateDays($post['timestamp']); ?></div>
      <div class="views"><?=$post["views"];?></div>
    </div>
  </div>

  <div class="content short">
    <a href="post?postID=<?=$post["id"];?>">
      <h4><?=$post["title"];?></h4>
      <p><?=$post["description"];?></p>
    </a>
    <a href="post?postID=<?=$post["id"];?>" class="read-more">Read more &#8594;</a>
  </div>

  <div class="footer">
    <div class="float-left">
      <?php
        if (!checkLogin()) {
          if ($likedPost) { //user has liked the post
      ?>
            <form class="like-inline">
              <input onclick="unlikePost(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon active" id="likePostBtn<?=$id;?>" type="button">
              <p><?=$postLikeCount;?> Likes</p>
            </form>

      <?php
          } else {
      ?>
            <form class="like-inline">
              <input onclick="likePost(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon" id="unlikePostBtn<?=$id;?>" type="button">
              <p><?=$postLikeCount;?> Likes</p>
            </form>
      <?php
          }
        }
      ?>
    </div>
    <div class="float-right">
      <a href="post?postID=<?=$post["id"];?>#commentsDiv"><?=$commentCount?> comments</a>
    </div>
  </div>
</div>
<script src="js/likePost.js"></script>

<?php
}

function suggestedCard($id) {
  $post = getPostByID($id);
  $user = getUserByID($post["userid"]);
  $postLikeCount = countPostLikes($id);
  $commentCount = countCommentsByPostID($id);
?>
<div class="card">
  <div class="header">
    <div class="image">
      <a href="profile?userID=<?=$user["id"];?>"><img src="<?=$user["image"];?>"></a>
    </div>
    <div class="author-details">
      <div>
        <a href="profile?userID=<?=$user["id"];?>"><?=$user["name"];?></a>
        <span class="topics-comma">
        <?php
           $topics = getPostTopics($id);
           if (count($topics) > 0) { echo ' in ';}
           foreach ($topics as $topic) {
       ?>
             <a href="topicDetails?topicID=<?=$topic["topicid"];?>"><?=$topic["title"];?></a>
       <?php
           }
        ?>
       </span>
      </div>
      <div class="date"><?php echo calculateDays($post['timestamp']); ?></div>
      <div class="views"><?=$post["views"];?></div>
    </div>
  </div>

  <div class="content short">
    <a href="post?postID=<?=$post["id"];?>">
      <h4><?=$post["title"];?></h4>
      <p><?=$post["description"];?></p>
    </a>
  </div>

  <div class="footer">
    <div class="float-left">
      <?php
        if (!checkLogin()) {
          if ($likedPost) { //user has liked the post
      ?>
            <form class="like-inline">
              <input onclick="unlikePost(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon active" id="likePostBtn<?=$id;?>" type="button">
              <p><?=$postLikeCount;?> Likes</p>
            </form>

      <?php
          } else {
      ?>
            <form class="like-inline">
              <input onclick="likePost(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon" id="unlikePostBtn<?=$id;?>" type="button">
              <p><?=$postLikeCount;?> Likes</p>
            </form>
      <?php
          }
        }
      ?>
    </div>
    <div class="float-right">
      <a href="#"><?=$commentCount?> comments</a>
      <script>
        $("[data-toggle=popover]").popover({html:true})
      </script>
    </div>
  </div>
  <a href="post" class="read-more-footer">Read more</a>
</div>
<script src="js/likePost.js"></script>

<?php
}


function topicCard($id) {
  $topic = getTopicByID($id);
  $postCount = countPostByTopicID($id);
  $followingTopic = isFollowingTopic($_SESSION["userid"],$topic["id"]);
  $followerCount = countFollowersByTopicID($topic["id"]);
?>
  <div class="card topic-card">
    <div class="image">
      <a href="topicDetails?topicID=<?=$topic["id"];?>"><img src="<?=$topic["main_image"];?>" class="img-responsive"></a>
    </div>

    <div class="content short">
      <a href="topicDetails?topicID=<?=$topic["id"];?>">
        <h4><?=$topic["title"];?></h4>
        <p><?=$topic["description"];?></p>
        <div class="followers"><?=$followerCount;?> Followers</div>
        <div class="posts"><?=$postCount;?> Posts</div>
      </a>
    </div>

    <div class="action">
      <?php
        if (!checkLogin()) {
          if ($followingTopic) { //user following topic
      ?>
            <form>
              <input onclick="unfollowTopic(<?=$_SESSION['userid'];?>,<?=$topic['id']?>);" id="unfollowBtn1" type="button" class="primary-line-btn" value="Following" onmouseover="unfollowMouseOver();" onmouseout="unfollowMouseOut()">
            </form>
      <?php
        } else { //user not following topic
      ?>
          <form>
            <input onclick="followTopic(<?=$_SESSION['userid'];?>,<?=$topic['id']?>);" id="followBtn1" type="button" class="primary-line-btn" value="Follow Topic">
          </form>
      <?php
          }
        }
      ?>
    </div>
  </div>
<?php
}

function cardExpand($postID) {
  $post = getPostByID($postID);
  $user = getUserByID($post["userid"]);
  $followingPost = isFollowingPost($_SESSION["userid"], $post["id"]);
  $likedPost = hasLikedPost($_SESSION["userid"], $post["id"]);
  $postLikeCount = countPostLikes($postID);
?>
  <div class="card mBottom-40 edit">
    <div class="header">
      <div class="image">
        <a href="profile?userID=<?=$user["id"];?>"><img src="<?=$user["image"];?>"></a>
      </div>
      <div class="author-details">
        <div>
            <a href="profile?userID=<?=$user["id"];?>"><?=$user["name"];?></a>
             <span class="topics-comma">
             <?php
                $topics = getPostTopics($postID);
                if (count($topics) > 0) { echo ' in ';}
                foreach ($topics as $topic) {
            ?>
                  <a href="topicDetails?topicID=<?=$topic["topicid"];?>"><?=$topic["title"];?></a>
            <?php
                }
             ?>
            </span>
        </div>
        <div class="date"><?php echo calculateDays($post['timestamp']); ?></div>
        <div class="views"><?=$post["views"];?></div>
      </div>
      <?php
        if (!checkLogin() && $_SESSION["userid"] != $user["id"]) {
          if ($followingPost) { //user following topic
      ?>
            <form>
              <input onclick="unfollowPost(<?=$_SESSION['userid'];?>,<?=$post['id']?>);" id="unfollowBtn1" type="button" class="follow" value="Following">
            </form>
      <?php
        } else { //user not following topic
      ?>
          <form>
            <input onclick="followPost(<?=$_SESSION['userid'];?>,<?=$post['id']?>);" id="followBtn1" type="button" class="follow" value="Follow Post">
          </form>
      <?php
          }
        }
      ?>
      <?php if($post["userid"] == $_SESSION["userid"]) { ?>
        <a class="edit" href="editPost?postID=<?=$post["id"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
      <?php } ?>
    </div>

    <div class="content">
      <h4><?=$post["title"];?></h4>
      <p><?=$post["description"];?></p>
    </div>

    <div class="footer">
      <div class="float-left">
        <?php
          if (!checkLogin()) {
            if ($likedPost) { //user has liked the post
        ?>
              <form class="like-inline">
                <input onclick="unlikePost(this.id,<?=$_SESSION['userid'];?>,<?=$post['id']?>);" class="star-icon active" id="likePostBtn" type="button">
                <p><?=$postLikeCount;?> Likes</p>
              </form>
        <?php
            } else {
        ?>
              <form class="like-inline">
                <input onclick="likePost(this.id,<?=$_SESSION['userid'];?>,<?=$post['id']?>);" class="star-icon" id="unlikePostBtn" type="button">
                <p><?=$postLikeCount;?> Likes</p>
              </form>
        <?php
            }
          }
        ?>
      </div>

      <div class="float-right">
        <a href="#commentsDiv">Report</a>
      </div>
    </div>
  </div>

  <script src="js/likePost.js"></script>
<?php
}

function commentCard($id) {
  $comment = getCommentByID($id);
  $user = getUserByID($comment["userid"]);
  $likedComment = hasLikedComment($_SESSION["userid"],$id);
  $commentLikes = countCommentsLikes($id);
?>
  <div class="card edit comment-card">
    <div class="header">
      <div class="image">
        <a href="profile?userID=<?=$user["id"];?>"><img src="<?=$user["image"];?>"></a>
      </div>
      <div class="author-details">
        <div>
          <a href="profile?userID=<?=$user["id"];?>"><?=$user["name"];?></a>
          <!-- only for psychiatrist -->
          <?php if ($user["role"] == "expert") { ?>
            <span class="label label-primary" style="text-transform:uppercase;"><?=$user["role"];?></span>
          <?php } ?>
          <!-- /only for psychiatrist -->
        </div>
        <div class="date no-after"><?php echo calculateDays($comment['datetime']); ?></div>
        <?php if ($user["id"] == $_SESSION["userid"]) { ?>
        <a class="delete" href="deleteCommentProcess?userID=<?=$comment['userid'];?>&postID=<?=$comment['postid'];?>&commentID=<?=$id?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        <?php } ?>
      </div>
    </div>

    <div class="content">
      <p><?=$comment["comment"];?></p>
    </div>

    <div class="footer">
      <div class="float-left">
        <?php
          if (!checkLogin()) {
            if ($likedComment) { //user has liked the post
        ?>
              <form class="like-inline">
                <input onclick="unlikeComment(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon active" id="likeCommentBtn<?=$id;?>" type="button">
                <p><?=$commentLikes;?> Likes</p>
              </form>

        <?php
            } else {
        ?>
              <form class="like-inline">
                <input onclick="likeComment(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon" id="unlikeCommentBtn<?=$id;?>" type="button">
                <p><?=$commentLikes;?> Likes</p>
              </form>
        <?php
            }
          }
        ?>
      </div>
      <div class="float-right">
        <a href="#">Report</a>
      </div>
    </div>
  </div>
  <script src="js/likeComment.js"></script>
<?php
}

function sideFilter() {
?>
  <div class="content-title">
    <h4>Filter</h4>
  </div>
  <a href="#" class="active">Posts<span class="badge">1.2k</span></a>
  <a href="#">Topics<span class="badge">6</span></a>
  <script>staticBar('.filter-sidebar','30');</script>
<?php
}

function loginModal() {
?>
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <img src="images/logo-long.svg" class="logo">
        </div>
        <div class="modal-body">
          <h4 class="modal-title" id="myModalLabel">Register</h4>
          <div>
            <form>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control">
                </div>
                <button type="submit" class="primary-line-btn">Login</button>
            </form>
            <hr/>
            <a class="facebook-btn">
                <img src="images/facebookIcon.png" width="10"/>
                <div class="text">Login with Facebook</div>
            </a>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="primary-color small" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">No account yet? Register here.</a>
        </div>
      </div>
    </div>
  </div>
<?php
}

function scrollTopBtn() {
?>
  <a class="top-btn" onclick="scrollToTop();" href="javascript:;"></a>
<?php
}

function footer() {
?>
  <footer class="footer">
    <div class="page-container">
      <div class="row">
        <div class="col-sm-12 pull-left">
          <img src="images/logo.svg" class="logo">
        </div>
        <div class="col-sm-4">
          <ul>
            <li>Trending Topics</li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <ul>
            <li>Featured Topics</li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <ul>
            <li>Top Topics</li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
            <li><a href="topicDetails">Bipolar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
<?php
}

function adminNav() {
?>
  <div class="admin-nav">
      <div class="page-container">
          <ul>
              <li><a id="dashboardNav" href="dashboard">Dashboard</a></li>
              <li><a id="usersNav" href="userList">Users</a></li>
              <li><a id="postsNav" href="postList">Posts</a></li>
              <li><a id="topicsNav" href="topicList">Topics</a></li>
              <li><a id="reportNav" href="reportList">Report</a></li>
          </ul>
      </div>
  </div>
<?php
}

function errorAlert($msg) {
?>
<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?= $msg; ?>
</div>
<?php
}



function commentCardProfile($id) {
  $comment = getCommentByID($id);
  $user = getUserByID($comment["userid"]);
  $likedComment = hasLikedComment($_SESSION["userid"],$id);
  $commentLikes = countCommentsLikes($id);
  $post = getPostByID($comment["postid"]);
?>
  <div class="card edit comment-card">
    <div class="header">
      <div class="image">
        <a href="profile?userID=<?=$user["id"];?>"><img src="<?=$user["image"];?>"></a>
      </div>
      <div class="author-details">
        <div>
          <a href="profile?userID=<?=$user["id"];?>"><?=$user["name"];?></a>
          in
          <a href="post?postID=<?=$post["id"];?>"><?=$post["title"];?></a>
          <!-- only for psychiatrist -->
          <?php if ($user["role"] == "expert") { ?>
            <span class="label label-primary" style="text-transform:uppercase;"><?=$user["role"];?></span>
          <?php } ?>
          <!-- /only for psychiatrist -->
        </div>
        <div class="date no-after"><?=$comment["datetime"];?></div>
        <?php if ($user["id"] == $_SESSION["userid"]) { ?>
        <a class="delete" href="deleteCommentProcess?userID=<?=$comment['userid'];?>&postID=<?=$comment['postid'];?>&commentID=<?=$id?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        <?php } ?>
      </div>
    </div>

    <div class="content">
      <p><?=$comment["comment"];?></p>
    </div>

    <div class="footer">
      <div class="float-left">
        <?php
          if (!checkLogin()) {
            if ($likedComment) { //user has liked the post
        ?>
              <form class="like-inline">
                <input onclick="unlikeComment(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon active" id="likeCommentBtn<?=$id;?>" type="button">
                <p><?=$commentLikes;?> Likes</p>
              </form>

        <?php
            } else {
        ?>
              <form class="like-inline">
                <input onclick="likeComment(this.id, <?=$_SESSION['userid'];?>,<?=$id?>);" class="star-icon" id="unlikeCommentBtn<?=$id;?>" type="button">
                <p><?=$commentLikes;?> Likes</p>
              </form>
        <?php
            }
          }
        ?>
      </div>
    </div>
  </div>
  <script src="js/likeComment.js"></script>
<?php
}

function userCard($id) {
  $user = getUserByID($id);
?>
  <div class="card">
      <div class="header" style="margin-bottom:0;">
        <div class="image">
          <a href="profile?userID=<?=$user["id"];?>"><img src="<?=$user["image"];?>"></a>
        </div>
        <div class="author-details">
          <div>
            <a href="profile?userID=<?=$user["id"];?>"><?=$user["name"];?></a>
          </div>
          <div><?=$user["description"];?></div>
        </div>
      </div>
    </div>
<?php
}
?>
