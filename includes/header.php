<?php
	if($_SESSION['loggedin'] == "True"){

		switch ($_SESSION["security-level"]){
	   		case "0": // This code is insecure
				$logged_in_user = $_SESSION['logged_in_user'];
				$logged_in_usersignature = $_SESSION['logged_in_usersignature'];
				$lSecurityLevelDescription = "Hosed";
	   		break;
	   		case "1": // This code is insecure
	   			// DO NOTHING: This is equivalent to using client side security		
				$logged_in_user = $_SESSION['logged_in_user'];
				$logged_in_usersignature = $_SESSION['logged_in_usersignature'];
				$lSecurityLevelDescription = "Arrogent";
	   		break;
		    
	   		case "2":
	   		case "3":
	   		case "4":
	   		case "5": // This code is fairly secure
	  			/* 
	  			 * NOTE: Input validation is excellent but not enough. The output must be
	  			 * encoded per context. For example, if output is placed in HTML,
	  			 * then HTML encode it. Blacklisting is a losing proposition. You 
	  			 * cannot blacklist everything. The business requirements will usually
	  			 * require allowing dangerous charaters. In the example here, we can 
	  			 * validate username but we have to allow special characters in passwords
	  			 * least we force weak passwords. We cannot validate the signature hardly 
	  			 * at all. The business requirements for text fields will demand most
	  			 * characters. Output encoding is the answer. Validate what you can, encode it
	  			 * all.
	  			 */
	   			// encode the entire message following OWASP standards
	   			// this is HTML encoding because we are outputting data into HTML
				$logged_in_user = $Encoder->encodeForHTML($_SESSION['logged_in_user']);
				$logged_in_usersignature = $Encoder->encodeForHTML($_SESSION['logged_in_usersignature']);
				$lSecurityLevelDescription = "Secure";
			break;
	   	}// end switch		

	   	$lUserAuthorizationLevelText = 'User';
	   	if ($_SESSION['is_admin'] == 'TRUE'){
	   		$lUserAuthorizationLevelText = 'Admin';
	   	}// end if

		$lAuthenticationStatusMessage = 
				'Logged In ' . 
				$lUserAuthorizationLevelText . ": " . 
				'<span style="color:#990000;font-weight:bold;">'.$logged_in_user . "</span> (" . 
				$logged_in_usersignature . ")";
	} else {
		$logged_in_user = "anonymous";
		$lAuthenticationStatusMessage = "Not Logged In";
	}// end if($_SESSION['loggedin'] == "True")

	if ($_SESSION["EnforceSSL"] == "True"){
		$lEnforceSSLLabel = "Drop SSL";
	}else {
		$lEnforceSSLLabel = "Enforce SSL";
	}//end if

	if ($BubbleHintHandler->hintsAreDispayed() == 1){
		$lPopupHintsLabel = "Hide Popup Hints";
	}else {
		$lPopupHintsLabel = "Show Popup Hints";
	}//end if

	switch ($_SESSION["security-level"]){
   		case "0": // This code is insecure
			$lSecurityLevelDescription = "Hosed";
   		break;
   		case "1": // This code is insecure
   			// DO NOTHING: This is equivalent to using client side security		
			$lSecurityLevelDescription = "Client-side Security";
   		break;
	    
   		case "2":
   		case "3":
   		case "4":
   		case "5": // This code is fairly secure
			$lSecurityLevelDescription = "Server-side Security";
		break;
   	}// end switch		
	
	$lHintsMessage = "Hints: ".$_SESSION["hints-enabled"];
	$lSecurityLevelMessage = "Security Level: ".$_SESSION["security-level"]." (".$lSecurityLevelDescription.")";

	try{
   		$lReflectedXSSExecutionPointBallonTip = $BubbleHintHandler->getHint("ReflectedXSSExecutionPoint");
   		$lCookieTamperingAffectedAreaBallonTip = $BubbleHintHandler->getHint("CookieTamperingAffectedArea"); 
	} catch (Exception $e) {
		echo $CustomErrorHandler->FormatError($e, "Error attempting to execute query to fetch bubble hints.");
	}// end try	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />	
	<!--<link rel="stylesheet" type="text/css" href="./styles/global-styles.css" />
	<link rel="stylesheet" type="text/css" href="./styles/ddsmoothmenu/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="./styles/ddsmoothmenu/ddsmoothmenu-v.css" />-->

	<link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./styles/sb-admin-2.css" rel="stylesheet">

	<script type="text/javascript" src="./javascript/bookmark-site.js"></script>
	<script type="text/javascript" src="./javascript/ddsmoothmenu/ddsmoothmenu.js"></script>
	<script type="text/javascript" src="./javascript/ddsmoothmenu/jquery.min.js">
		/***********************************************
		* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>
	<script type="text/javascript">
		ddsmoothmenu.init({
			mainmenuid: "smoothmenu1", //menu DIV id
			orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
			//customtheme: ["#cccc44", "#cccccc"],
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		});
	</script>
	<script type="text/javascript">
		$(function() {
			$('[ReflectedXSSExecutionPoint]').attr("title", "<?php echo $lReflectedXSSExecutionPointBallonTip; ?>");
			$('[ReflectedXSSExecutionPoint]').balloon();
			$('[CookieTamperingAffectedArea]').attr("title", "<?php echo $lCookieTamperingAffectedAreaBallonTip; ?>");
			$('[CookieTamperingAffectedArea]').balloon();
		});
	</script>
</head>
<body onload="onLoadOfBody(this);" id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="./images/logo.png" width="75px" />
                </div>
                <div class="sidebar-brand-text mx-3">Mutillidae Poligran</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                    <span style="padding: 10px;color:white;display: block;">Keep Calm and Pwn On</span>
            </li>
            
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Utilities
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>OWASP 2017</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="buttons.html">A1 - Injection (SQL)</a>
                        <a class="collapse-item" href="cards.html">A1 - Injection (Other)</a>
                        <a class="collapse-item" href="buttons.html">A2 - Broken Authentication and Session Management</a>
                        <a class="collapse-item" href="cards.html">A3 - Sensitive Data Exposure</a>
                        <a class="collapse-item" href="cards.html">A4 - XML External Entities</a>
                        <a class="collapse-item" href="cards.html">A5 - Broken Access Control</a>
                        <a class="collapse-item" href="cards.html">A6 - Security Misconfiguration</a>
                        <a class="collapse-item" href="cards.html">A7 - Cross Site Scripting (XSS)</a>
                        <a class="collapse-item" href="cards.html">A8 - Insecure Deserialization</a>
                        <a class="collapse-item" href="cards.html">A9 - Using Components with Known Vulnerabilities</a>
                        <a class="collapse-item" href="cards.html">A10 - Insufficient Logging and Monitoring</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>OWASP 2013</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">A8 - Cross Site Request Forgery (CSRF)</a>
                        <a class="collapse-item" href="utilities-border.html">A10 - Unvalidated Redirects and Forwards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>OWASP 2010</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">A7 - Insecure Cryptographic Storage</a>
                        <a class="collapse-item" href="utilities-border.html">A8 - Failure to Restrict URL Access</a>
                        <a class="collapse-item" href="utilities-border.html">A9 - Insufficient Transport Layer Protection</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>OWASP 2007</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">A3 - Malicious File Execution</a>
                        <a class="collapse-item" href="utilities-border.html">A6 - Information Leakage</a>
                        <a class="collapse-item" href="utilities-border.html">A6 - Improper Error Handling</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Others</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">REST:</h6>
                        <a class="collapse-item" href="utilities-color.html">SQL Injection</a>
                        <a class="collapse-item" href="utilities-color.html">Username Enumeration</a>
                        <h6 class="collapse-header">SOAP:</h6>
                        <a class="collapse-item" href="utilities-border.html">Hello World</a>
                        <a class="collapse-item" href="utilities-border.html">DNS Lookup</a>
                        <a class="collapse-item" href="utilities-border.html">Lookup User</a>
                        <h6 class="collapse-header">HTML5:</h6>
                        <a class="collapse-item" href="utilities-border.html">HTML5 Web Storage</a>
                        <a class="collapse-item" href="utilities-border.html">JavaScript Object Noration (JSON)</a>
                        <a class="collapse-item" href="utilities-border.html">Asyncronous JavaScript and XML (AJAX)</a>
                        <h6 class="collapse-header">Client-side "Security" Controls:</h6>
                        <a class="collapse-item" href="utilities-border.html">Challenge</a>
                        <h6 class="collapse-header">Cross-Frame Framing (Third-party Framing):</h6>
                        <a class="collapse-item" href="utilities-border.html">Framer</a>
                        <h6 class="collapse-header">Unrestricted File Upload:</h6>
                        <a class="collapse-item" href="utilities-border.html">File Upload</a>
                        <h6 class="collapse-header">Denial of Service:</h6>
                        <a class="collapse-item" href="utilities-border.html">Text File Viewer</a>
                        <a class="collapse-item" href="utilities-border.html">Show Web Log</a>
                        <h6 class="collapse-header">JavaScript Validation Bypass:</h6>
                        <a class="collapse-item" href="utilities-border.html">Login</a>
                        <a class="collapse-item" href="utilities-border.html">User Info (SQL)</a>
                        <a class="collapse-item" href="utilities-border.html">User Info (XPath)</a>
                        <a class="collapse-item" href="utilities-border.html">Add to your blog</a>
                        <a class="collapse-item" href="utilities-border.html">HTML5 Web Storage</a>
                        <a class="collapse-item" href="utilities-border.html">DNS Lookup</a>
                        <a class="collapse-item" href="utilities-border.html">Repeater</a>
                        <a class="collapse-item" href="utilities-border.html">User-Agent Impersonation</a>
                        <h6 class="collapse-header">Data Capture Pages:</h6>
                        <a class="collapse-item" href="utilities-border.html">Data Capture</a>
                        <a class="collapse-item" href="utilities-border.html">View Captured Data</a>
                        <h6 class="collapse-header">Documentation:</h6>
                        <a class="collapse-item" href="utilities-border.html">Installation Instructions (Linux)</a>
                        <a class="collapse-item" href="utilities-border.html">Installation Instructions (Windows)</a>
                        <a class="collapse-item" href="utilities-border.html">Usage Instructions</a>
                        <a class="collapse-item" href="utilities-border.html">Listing of Vulnerabilites</a>
                        <a class="collapse-item" href="utilities-border.html">Change Log</a>
                        <a class="collapse-item" href="utilities-border.html">Credits</a>
                        <h6 class="collapse-header">Resources:</h6>
                        <a class="collapse-item" href="utilities-border.html">Bookmark Site</a>
                        <a class="collapse-item" href="utilities-border.html">Latest Version</a>
                        <a class="collapse-item" href="utilities-border.html">OWASP Top Ten</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="./images/img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2">Don't know where to start?<br>Click on the link below and check our <strong>YouTube Tutorials</strong>.</p>
                <a class="btn btn-success btn-sm" href="https://youtube.com/user/webpwnized">Watch Now!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Version Info -->
                    Version: 2.6.67 - Security Level: 0 (Hosed) 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Carlos Menco Guardo</span>
                                <img class="img-profile rounded-circle"
                                    src="./images/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<!--
<table class="main-table-frame" border="1px" cellspacing="0px" cellpadding="0px">
	<tr>
		<td bgcolor="#ccccff" align="center" colspan="7">
			<table width="100%">
				<tr>
					<td style="text-align:center;">
						<span style="text-align:center; font-weight: bold; font-size:30px; text-align: center;">
						<img style="vertical-align: middle; margin-right: 10px;" border="0px" align="top" src="images/coykillericon-50-38.png"/>
							OWASP Mutillidae II: Keep Calm and Pwn On
						</span>
					</td>
				</tr>		
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#ccccff" align="center" colspan="7">
			<?php /* Note: $C_VERSION_STRING in index.php */ ?>
			<span class="version-header"><?php echo $C_VERSION_STRING;?></span>
			<span id="idSecurityLevelHeading" class="version-header" style="margin-left: 20px;"><?php echo $lSecurityLevelMessage; ?></span>
			<span id="idHintsStatusHeading" CookieTamperingAffectedArea="1" class="version-header" style="margin-left: 20px;"><?php echo $lHintsMessage; ?></span>
			<span id="idSystemInformationHeading" ReflectedXSSExecutionPoint="1" class="version-header" style="margin-left: 20px;"><?php echo $lAuthenticationStatusMessage ?></span>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="header-menu-table">
			<table class="header-menu-table">
				<tr>
					<td><a href="index.php?page=home.php&popUpNotificationCode=HPH0">Home</a></td>
					<td>|</td>
					<td>
						<?php
							if ($_SESSION['loggedin'] == 'True'){
								echo '<a href="index.php?do=logout">Logout</a>';
							} else {
								echo '<a href="index.php?page=login.php">Login/Register</a>';
							}// end if
						?>		
					</td>
					<td>|</td>
					<?php 
						if ($_SESSION['security-level'] == 0){
							echo '<td><a href="index.php?do=toggle-hints&page='.$lPage.'">Toggle Hints</a></td><td>|</td>';
						}// end if
					?>
					<td><a href="index.php?do=toggle-bubble-hints&page=<?php echo $lPage?>"><?php echo $lPopupHintsLabel; ?></a></td>
					<td>|</td>
					<td><a href="index.php?do=toggle-security&page=<?php echo $lPage?>">Toggle Security</a></td>
					<td>|</td>
					<td><a href="index.php?do=toggle-enforce-ssl&page=<?php echo $lPage?>"><?php echo $lEnforceSSLLabel; ?></a></td>
					<td>|</td>
					<td><a href="set-up-database.php">Reset DB</a></td>
					<td>|</td>
					<td><a href="index.php?page=show-log.php">View Log</a></td>
					<td>|</td>
					<td><a href="index.php?page=captured-data.php">View Captured Data</a></td>
				</tr>
			</table>	
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;text-align:left;background-color:#ccccff;width:125pt;">
			<?php require_once 'main-menu.php'; ?>
			<div>&nbsp;</div>
			<div class="label" style="text-align: center;">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="45R3YEXENU97S">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<span style="color: blue;">Want to Help?</span>
			</div>
			<div>&nbsp;</div>
			<div class="label" style="text-align: center;">
				<a href="http://www.youtube.com/user/webpwnized" style="white-space:nowrap;" target="_blank">
					<img align="middle" alt="Webpwnized YouTube Channel" src="./images/youtube-48-48.png" />
					<br/>
					Video Tutorials
				</a>
			</div>
			<div>&nbsp;</div>
			<div class="label" style="text-align: center;">
				<a href="https://twitter.com/webpwnized" target="_blank">
					<img align="middle" alt="Webpwnized Twitter Channel" src="./images/twitter-bird-48-48.png" />
					<br/>
					Announcements
				</a>
			</div>		
			<div>&nbsp;</div>
			<div class="label" style="text-align: center;">
				<a 
					href="https://www.sans.org/reading-room/whitepapers/application/introduction-owasp-mutillidae-ii-web-pen-test-training-environment-34380" 
					target="_blank"
					title="Whitepaper: Introduction to OWASP Mutillidae II Web Pen Test Training Environment"
				>			
					<img align="middle" alt="Webpwnized Twitter Channel" src="./images/pdf-icon-48-48.png" />
					<br/>
					Getting Started
				</a>
			</div>
			<div>&nbsp;</div>
		</td>
		<td valign="top">
			<blockquote>
