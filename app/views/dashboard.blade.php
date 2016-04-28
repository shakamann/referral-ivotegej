<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard :: iVoteGEJ</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo asset('style/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" href="<?php echo asset('style/style.css') ?>"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">   

	<!-- <link href="navbar-static-top.css" rel="stylesheet">-->
	<!-- <link rel="stylesheet" href="css/bootstrap-responsive.css"/>-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="<?php echo asset('js/blockUI.js') ?>"></script>
		<script src="<?php echo asset('js/twitter.js') ?>"></script>

			
		
		
</head>
<body style="margin-top:0px;">
<!-- facebook Plugin -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
<!-- Header Starts Here -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
           <!-- <a target="_blank" href="#" class="navbar-brand"><span style="color:green">P</span><span style="">D</span><span style="color:red">P</span>4NAIJA<span style="color:red">.</span></a> -->
           		<a  href="/" class="navbar-brand logo-fit"><img src="" alt=""/><span>i &nbsp;<i class="fa fa-check"></i>ote&nbsp;GEJ</span></a>

        </div>
        <div class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> 
                        <strong>Welcome, {{{Confide::user()->username}}}</strong>&nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="fa fa-user icon-large"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>{{{Confide::user()->last_name}}} {{{Confide::user()->first_name}}}</strong></p>
                                        <p class="text-left small">{{{Confide::user()->email}}}</p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">LINK TO SPONSOR'S SITE</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="{{{ URL::to('/users/logout') }}}" class="btn btn-danger btn-block">Sign Out</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Header Ends Here -->
<section id="personal_info_dashboard_section">
<div class="col-sm-12" style="text-align:center;margin-top:0px"><span ng-class="{stopLoading: true}" style="margin:auto;padding:0.5em;background:#F7EA95;border-style:solid;border-width:1px;border-color:#B9B9C8;font-weight:bold;"><i class="fa fa-refresh"></i> Loading...</span></div>
<br>
<br>
<br>
<br>
<div   class="container">
<div class="panel panel-success">
    <div id="numero2" class="panel-heading"><h2><i class="fa fa-bar-chart"></i> Kenn Shaka Dashboard</h2></div>
    <div class="panel-body">
    <div class="row">
    <div class="col-md-8">
	<div><h3><i class="fa fa-user"></i> Progress for {{{Confide::user()->last_name}}} {{{Confide::user()->first_name}}} ({{{Confide::user()->count_stamp}}}) GMT</h3> </div>
	<div id="starthere"  class="progress">
	<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{{Confide::user()->downlines_count}}}%">
		{{{Confide::user()->downlines_count}}}
	</div>
	</div>
	<div>
      <a class="fb-share-button"  data-href="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}" data-layout="button"></a>
	</div>
	<div id="numero1" class="input-group">
        <input type="text" value="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}" class="form-control" disabled>
		<span class="input-group-btn">
            <button class="btn btn-default" type="button">
			<i class="fa fa-facebook"></i>  Share
			</button>
	    </span>
	</div><br>
	<div>
    	<a class="twitter-share-button"
            href="https://twitter.com/share"
            data-size="large"
            data-text="The campaign don enter our finger. Nigeria is ours to decide #iVoteGEJ scholarships, amenities etc"
            data-url="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}"
            data-counturl="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}">Share
          </a>
    </div>
	<div class="input-group">
        <input type="text" value="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}" class="form-control" disabled>

		<span class="input-group-btn">
			 <a style="color: #ffffff"  href="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}" title="The campaign don enter our finger. Nigeria is ours to decide #iVoteGEJ scholarships, amenities etc" class="btn btn-default tweet" target="_blank"><i class="fa fa-twitter"></i> Share</a>



	    </span>

	</div><br>
	<div>
    <script src="//platform.linkedin.com/in.js" type="text/javascript">
      lang: en_US
    </script>
    <script type="IN/Share" data-url="www.ivotegej.com/users/create/{{{Confide::user()->username}}}" data-counter="right"></script>
    </div>
	<div class="input-group">
        <input type="text" value="http://www.ivotegej.com/users/create/{{{Confide::user()->username}}}" class="form-control" disabled>
		<span class="input-group-btn">
		  <button class="btn btn-default" type="button">
			<i class="fa fa-linkedin"></i>  Share
		  </button>
	    </span>
	</div><br>
	<i class="fa fa-info-circle"></i> Click buttons on top ur referral links to share. You can share your link via WhatsApp by typing and sharing the url
	</div>
	<div id="numero5" class="col-md-4">
	    <div><h3><i class="fa fa-info-circle"></i> Basic information</h3></div>
		<ul class="list-group">
		  <li class="list-group-item"><span style="font-weight:bold">Group Name:</span> {{{Confide::user()->group_code}}}</li>
		  <li class="list-group-item"><span style="font-weight:bold">Referred By:</span> {{{Confide::user()->referred_by}}}</li>
		  <li class="list-group-item"><span style="font-weight:bold">Downlines Count:</span> {{{Confide::user()->downlines_count}}}</li>
		  <li class="list-group-item"><span style="font-weight:bold">Registered on:</span> {{{Confide::user()->created_at}}} GMT</li>
		  <li class="list-group-item"><span style="font-weight:bold">Location:</span> {{{Confide::user()->state_of_residence}}}</li>
		</ul>
	  
	</div>
	</div>
	</div>
</div>


</div>
</section>
<section id="related_info_dashboard_section">
<div class="container">
<div class="row" >
	<div class="col-md-8">
	<div class="well well-sm"><h3><i class="fa fa-sort-amount-desc"></i> Group Chart ({{{Confide::user()->group_code}}})</h3></div>
    <div style="">
	<?php $a=1; ?>
    @foreach ($group_members as $group_members)
        <div><h5><span class="badge">{{{$a++}}}</span> {{{$group_members->first_name}}}  {{{$group_members->last_name}}} ({{{$group_members->count_stamp}}}) GMT</h5></div>
            <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:{{{$group_members->downlines_count}}}%">
                {{{$group_members->downlines_count}}}
            </div>
            </div>
    @endforeach
    </div>
	<div class="col-xs-12 col-sm-12 hidden-md hidden-lg hidden"></div>



	</div>
	<div class="col-md-4">
	<div>
                          <h4 class="well"><span class="fa fa-users"></span> Social Activities</h4>
                          <a class="twitter-timeline" href="https://twitter.com/TANconnectgroup" data-widget-id="553596077723906050">Tweets by @TANconnectgroup</a>

    </div>
    <br>
    <div class="well well-sm"><h3><i class="fa fa-users"></i> Your downlines <span class="badge">{{{Confide::user()->downlines_count}}}</span></h3></div>
    <div style="">

    <ul class="list-group">
        @foreach ($all_downlines as $all_downlines)
        <li class="list-group-item">
                    <span class="badge">{{{$all_downlines->downlines_count}}}</span>
            {{{$all_downlines->first_name}}} {{{$all_downlines->last_name}}}
        </li>
        @endforeach
      <li class="list-group-item list-group-item-succes">
        <span class="badge">...</span>
        ... <a>more</a>
      </li>

    </ul>
    </div>


	</div>
	
</div>
<div class="row">
<!-- 	<div class="col-sm-offset-8  col-sm-4">
 -->	<!-- <div class="well well-sm"><h3><i class="fa fa-sort-amount-desc"></i> Group Chart (ALPHA1)</h3></div>
	<div><h5><span class="badge">1</span> Mitch  Parker</h5></div>
	<div class="progress">
	  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:  2%">
		2
	</div>
	</div> -->
	<!-- <div class="col-md-8">
				<div style="width:100%">
					<script type="text/javascript">
					window.twttr = (function (d, s, id) {
					  var t, js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id; js.src= "https://platform.twitter.com/widgets.js";
					  fjs.parentNode.insertBefore(js, fjs);
					  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
					}(document, "script", "twitter-wjs"));
					</script>
					
					<a class="twitter-timeline"  href="https://twitter.com/YouDecideNgr" data-widget-id="518344674763759618">Tweets by @YouDecideNgr</a>
				</div>
	</div> -->
<!-- 	<div class="col-md-4"><div  class="fb-like-box" data-href="https://www.facebook.com/youdecidenigeria" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div></div>
 -->	</div>
</div>	
</div>
<br>
<br>
<br>
</section>
<section>
	<div class="footer-div">
	<div class="container">
		<div class="row">
		<br>
		<div class="col-md-12 container muted">&copy;iVoteGEJ. &nbsp;<span style="font-style:italic"> </span><!-- <a class="brand" href="http://www.kennethetal.com" target="_blank">Kenneth et al</a> --></div>

		</div>
	</div>
		
	</div>
</section>


<script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
<script>
$( ".awesome-tooltip" ).tooltip({ position: { my: "left+30 center", at: "right center"} });
 // We bind a new event to our link
$('a.tweet').click(function(e){

   //We tell our browser not to follow that link
   e.preventDefault();

   //We get the URL of the link
   var loc = $(this).attr('href');

   //We get the title of the link
   var title  = escape($(this).attr('title'));

   //We trigger a new window with the Twitter dialog, in the middle of the page
   window.open('http://twitter.com/share?url=' + loc + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');

});

</script>
      
</body>
</html>