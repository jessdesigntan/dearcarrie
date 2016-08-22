<?php
/**
 * Display <head> section, include all dependencies
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
    <title><?=$title;?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- wow.js for css animations & initialization -->
    <script src="js/wow.js"></script>
    <script>new WOW().init();</script>

    <!-- enable popovers -->


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
        <a class="navbar-brand" href="#"><strong>LOGO</strong></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Topics <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control nav-search">
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Login</a></li>
          <li><a href="#">Sign up</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
<?php
}

function card() {
?>
  <div class="card">
    <div class="header">
      <div class="image">
        <a href="#"><img src="images/avatar.png"></a>
      </div>
      <div class="author-details">
        <a>Jess Tan</a> in <a>Bipolar</a>
        <div class="date">12 Aug 16</div>
      </div>

    </div>

    <div class="content">
      <a href="#">
        <h4>Ryan Lochte Is the Ugly American</h4>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
      </a>
      <a href="#" class="read-more">Read more &#8594;</a>
    </div>

    <div class="footer">
      <div class="float-left">
        <a href="#" class="star-icon"></a>
        200
      </div>
      <div class="float-right">
        <a href="#">400 comments</a>
        <a href="#" class="dots-icon" data-placement="bottom" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
        data-content="
          <a href='#' title='test add link'>Report</a>
          <a href='#' title='test add link'>Share</a>
          "
        ><img src="images/dots.svg"></a>
        <script>
          $("[data-toggle=popover]").popover({html:true})
        </script>
      </div>
    </div>
  </div>
<?php
}
?>
