<div class="page-title">Setting up Local Hostname for Mutillidae on Ubuntu</div>

<?php include_once (__ROOT__.'/includes/back-button.inc');?>

<?php 
        $lHostname = $_SERVER["SERVER_NAME"];
        $lHomepage = str_replace($_SERVER["CONTEXT_DOCUMENT_ROOT"], "", $_SERVER["SCRIPT_FILENAME"]) . "?page=home.php";
        $lHomepageURL = "https://" . $lHostname . $lHomepage
?>

<div>&nbsp;</div>
<span class="report-header">Creating Local Hostname</span>
<div>&nbsp;</div>
<pre>
You may want to give mutillidae a hostname so it can be accessed more easily.
For example, the following command would create a hostname that can stand in for
the IP address 127.0.0.1

echo -e "\n127.0.0.1\tmutillidae.local" &gt;&gt; /etc/hosts

Then the site could be access at http://127.0.0.1<?php echo $lHomepage; ?> or 
http://mutillidae.local<?php echo $lHomepage; ?>
</pre>