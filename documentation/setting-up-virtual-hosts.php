<div class="page-title">Setting up Virtual Hosts in Apache2 on Ubuntu</div>

<?php include_once (__ROOT__.'/includes/back-button.inc');?>

<?php 
        $lHostname = $_SERVER["SERVER_NAME"];
        $lHomepage = str_replace($_SERVER["CONTEXT_DOCUMENT_ROOT"], "", $_SERVER["SCRIPT_FILENAME"]) . "?page=home.php";
        $lHomepageURL = "https://" . $lHostname . $lHomepage
?>
<a href="<?php echo $lHomepageURL; ?>"><?php echo $lHomepageURL; ?></a>
<div>&nbsp;</div>
<span class="report-header">Creating Virtual Hosts</span>
<div>&nbsp;</div>
<pre>
This method causes Apache to serve the site over HTTPS only but virtual hosts can be used to allow 
both HTTP and HTTPS sites for the same application. An example of a possible configuration is below. 
This example limits mutillidae to running on localhost only at IP address 127.0.0.1 on standard ports 
80 and 443 respectively.

&#x3C;VirtualHost 127.0.0.1:80&#x3E;
&#x9;ServerName mutillidae.local
&#x9;DocumentRoot /var/www/html/mutillidae

&#x9;ErrorLog ${APACHE_LOG_DIR}/mutillidae-error.log
&#x9;CustomLog ${APACHE_LOG_DIR}/mutillidae-access.log combined
&#x3C;/VirtualHost&#x3E;

&#x3C;VirtualHost 127.0.0.1:443&#x3E;
&#x9;DocumentRoot /var/www/html/mutillidae
&#x9;ServerName mutillidae.local

&#x9;ErrorLog ${APACHE_LOG_DIR}/mutillidae-error.log
&#x9;CustomLog ${APACHE_LOG_DIR}/mutillidae-access.log combined

&#x9;SSLEngine On
&#x9;SSLOptions +StrictRequire
&#x9;SSLCertificateFile /etc/ssl/certs/mutillidae-selfsigned.crt
&#x9;SSLCertificateKeyFile /etc/ssl/private/mutillidae-selfsigned.key
&#x9;SSLProtocol TLSv1
&#x3C;/VirtualHost&#x3E;
</pre>
