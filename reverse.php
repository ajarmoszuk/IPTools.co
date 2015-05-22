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
      <h1 class="header center white-text">Reverse IP (Hostname) Resolver</h1>
		<div class="card-panel">
		<span class="blue-text text-darken-2">
			<div class="row">
			<form method="GET">
					<div class="input-field col s10">
					<input type="text" id="ip" name="ip" class="validate">
					<label class="active" for="ip">Hostname or IP</label>
					</div>
					<div class="input-field col s2">
					<button class="btn brown waves-effect waves-light" type="submit" onclick="showProgress()">Resolve<i class="mdi-content-send right"></i></button>
					</div>
			</form>
			</div>
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
				$input = $page->sanitize($_GET['ip']);
				if (!$input) {} else {
				print '<div class="row">
    					<form class="col s12">
      						<div class="row">
        					<div class="input-field col s12">
          					<textarea id="textarea1" class="materialize-textarea" disabled>';
				if (filter_var($input, FILTER_VALIDATE_IP)) {
					print 'IP: '.$input;
					print '&#13;&#10;Resolved Hostname: '.$iptools->getHostnameIP($input);
				} else {
					print 'Hostname: '.$input;
					print '&#13;&#10;Resolved IP: '.$iptools->getIPHostname($input);
				}
          		print '</textarea>
          					<label for="textarea1">Output</label>
        				</div>
      					</div>
   					 </form>
  				</div>';
  			}
			?>
				<br><br>
			</span>
		</div>
      <br><br>

    </div>
  </div>

<?
$page->getTemplate("footer-small");
?>