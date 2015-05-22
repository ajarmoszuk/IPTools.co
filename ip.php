<?
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.minify.function.php");
ob_start('minify');
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.main.class.php");
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.basic.class.php");
$page = new IPTools\Main;
$iptools = new IPTools\BasicTools;
$page->getTemplate("header");
?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br><br><br><br>
      <h1 class="header center white-text">What's my IP?</h1>
		<div class="card-panel">
			<span class="blue-text text-darken-2">
			<script>
			function showProgress() {
  				 document.getElementById('progress').style.display = "block";
			}
			</script>
			<div id="progress" style="display: none;">
				<div class="progress">
					<div class="indeterminate"></div>
				</div>
				<center>Please Wait...</center>
			</div>
			<?
			$newIP = $page->sanitize($_GET['ip']);
			if ($newIP == false) {
				print "Your IP is <b>".$iptools->getIP()."</b>.<br>";
				print "Your ISP is <b>".$iptools->getISP($iptools->getIP())."</b>.<br>";
				print "You are from <b>".$iptools->getHostnameCountry($iptools->getIP())."</b>.<br>";
				print "Your hostname is: <b>".$iptools->getHostnameIP($iptools->getIP())."</b>.<br>";
				print "Your browser agent is: <b>".$iptools->getAgent()."</b>.<br>";
				print "Advertisement blocking software is <b><script type='text/javascript'> if (document.getElementById('fakead') == undefined) { document.write('Enabled'); } else { document.write('Disabled'); } </script></b>.";
			} else {
				if (filter_var($newIP, FILTER_VALIDATE_IP)) {
					print "IP: <b>".$newIP."</b>.<br>";
					print "The ISP of the IP is: <b>".$iptools->getISP($newIP)."</b>.<br>";
					print "The country of the IP is: <b>".$iptools->getHostnameCountry($newIP)."</b>.<br>";
					print "The hostname of the IP is: <b>".$iptools->getHostnameIP($newIP)."</b>.";
				} else {
					print "Ugh... This is not an IP, please try again.";
				}
			}
			?>
				<br><br>
				<div class="row">
				<form method="GET">
					<div class="input-field col s10">
						<input type="text" id="ip" name="ip" class="validate">
						<label class="active" for="ip">Check another IP</label>
					</div>
					<div class="input-field col s2">
					<button class="btn pink waves-effect waves-light" type="submit" onclick="showProgress();">Check IP<i class="mdi-content-send right"></i></button>
					</div>
				</form>
				</div>
			</span>
		</div>
      <br><br>

    </div>
  </div>

<?
$page->getTemplate("footer-small");
?>