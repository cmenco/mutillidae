<style>
	a{
		font-weight: bold;
	}
</style>

<?php
	/* Check if required software is installed. Issue warning if not. */
 
	if (!$RequiredSoftwareHandler->isPHPCurlIsInstalled()){
		echo $RequiredSoftwareHandler->getNoCurlAdviceBasedOnOperatingSystem();
	}// end if

	if (!$RequiredSoftwareHandler->isPHPJSONIsInstalled()){
		echo $RequiredSoftwareHandler->getNoJSONAdviceBasedOnOperatingSystem();
	}// end if
?>

<div style=" width: 750px; overflow: hidden;">
<?php include_once (__ROOT__.'/includes/hints/hints-menu-wrapper.inc'); ?>
<span style="float: right">
	<img src="images/arrow-45-degree-left-up.png" style="margin-right: 5px" />
	<span class="label" style="float: right;">TIP:&nbsp;
	<span style="float: right; text-align: center;">Click 
	<span style="color: blue;font-style: italic;">Hint and Videos</span><br/>on each page</span></span>
</span>
</div>

<!-- TEMPORARY WARNING ABOUT MUTILLIDAE HAVING A NEW PASSWORD IN MYSQL -->
<link rel="stylesheet" type="text/css" href="styles/gritter/jquery.gritter.css" />
<script type="text/javascript" src="javascript/gritter/jquery.gritter.min.js"></script>
<script>
$.gritter.add({
    // (string | mandatory) the heading of the notification
    title: 'IMPORTANT',
    // (string | mandatory) the text inside the notification
    text: 'Please be aware of recent update. MySQL will not accept blank passwords in recent versions. This project now tries to connect to MySQL using password of "mutillidae". Please ensure the password for the root account in MySQL is set to the password configured in	Mutillidae&apos;s database configuration file includes/database-config.php. To learn how to reset root password in MySQL, please refer to https://www.youtube.com/watch?v=sG5Z4JqhRx8',
    // time until fade begins
    time: 15000
});
</script>

<table style="margin:0px;margin-top:5px;">
 	<tr>
	    <td>
			<a title="Usage Instructions" href="./index.php?page=documentation/usage-instructions.php">
				<img alt="What Should I Do?" align="middle" src="./images/question-mark-40-61.png" />
				What Should I Do?
			</a>
		</td>
		<td>
			<a href="http://www.youtube.com/user/webpwnized" target="_blank">
			<img align="middle" alt="Webpwnized YouTube Channel" src="./images/youtube-48-48.png" />
				Video Tutorials
			</a>
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
			<?php include_once './includes/help-button.inc';?>
		</td>
		<td>
			<a href="./index.php?page=./documentation/vulnerabilities.php">
				<img alt="Help" align="middle" src="./images/siren-48-48.png" />
				Listing of vulnerabilities
			</a>
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
			<a href="http://sourceforge.net/p/mutillidae/bugs/" target="_blank">
				<img align="middle" alt="OWASP Mutillidae II Bug Tracker" src="./images/technical-support-48-48.png" />
				Bug Tracker
			</a>
		</td>
		<td>
			<a href="" onclick="alert('The email account is webpwnized. Its a gmail account.');">
				<img alt="Help" align="middle" src="./images/mail-icon-48-48.png" />
				Bug Report Email Address 
			</a>
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
			<a href="./index.php?page=documentation/change-log.html">
				<img alt="See the latest vulnerabilities in Mutillidae" align="middle" src="./images/new-icon-48-48.png" />
				What's New? Click Here
			</a>
		</td>
		<td>
			<a href="https://twitter.com/webpwnized" target="_blank">
				<img align="middle" alt="Webpwnized Twitter Channel" src="./images/twitter-bird-48-48.png" />
				Release Announcements
			</a>
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
			<a href="index.php?page=phpmyadmin.php">
				<img alt="Open PHP MyAdmin Console" align="middle" src="./images/phpmyadmin-logo-48-48.png" />
				PHP MyAdmin Console
			</a>
		</td>	
		<td>
			<a href="http://sourceforge.net/p/mutillidae/feature-requests/" target="_blank">
				<img align="middle" alt="Feature Requests" src="./images/worm-gear-48-48.png" />
				Feature Requests
			</a>
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
			<table style="margin:0px;">
				<tr>
					<td class="label" title="Installation Instructions">
						<img alt="Installation Instructions" align="middle" src="./images/installation-icon-48-48.png" />
						Installation Instructions
					</td>
				</tr>
				<tr>
					<td class="label" style="padding-right:30px;" title="Installation Instructions">
						<ul>
							<li><a title="Latest Version" href="http://sourceforge.net/projects/mutillidae/files/mutillidae-project/" target="_blank">Latest Version</a></li>
							<li><a title="Installation Instructions" href="./index.php?page=installation.php">Installation Instructions</a></li>
							<li><a title="Usage Instructions" href="./index.php?page=documentation/usage-instructions.php">Usage Instructions</a></li>
							<li><a title="Get rid of those pesky PHP errors" href="./index.php?page=php-errors.php">Get rid of those pesky PHP errors</a></li>		
						</ul>			
					</td>
				</tr>
			</table>		
		</td>
		<td>
			<table style="margin:0px;">
				<tr>
					<td class="label">
						<img 	title="Pentesting Tools" 
								alt="Tools" 
								align="middle" 
								src="./images/tools-icon-48-48.png" />
						Tools
					</td>
				</tr>
				<tr>
					<td class="label">
						<ul>
							<li>
								<a 	title="Download Backtrack" 
									href="http://www.kali.org/" 
									target="_blank">Kali Linux</a></li>
							<li>
								<a 	title="Download Samurai Web Testing Framework" 
									href="http://samurai.inguardians.com/" 
									target="_blank">Samurai Web Testing Framework</a>
							</li>
							<li>
								<a href="http://sqlmap.org/" target="_blank" title="SQLMap Automated SQL Injection Tool (Included in Backtrack)">sqlmap</a>
							</li>
							<li>
								<a href="https://addons.mozilla.org/en-US/firefox/collections/jdruin/pro-web-developer-qa-pack/" target="_blank">Some Useful Firefox Add-ons</a>
							</li>
						</ul>
					</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<img alt="Helpful hints and scripts" align="middle" src="./images/help-icon-48-48.png" />
			<span style="font-weight: bold;">More Hints?: See "/documentation/mutillidae-test-scripts.txt"</span>
		</td>
	</tr>
</table>
