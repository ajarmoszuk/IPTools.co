<?
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.main.class.php");
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.whois.class.php");
$page = new IPTools\Main;
$page->getTemplate("header");
?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br><br><br><br>
      <h1 class="header center white-text">Whois</h1>
		<div class="card-panel">
		<span class="blue-text text-darken-2">
			<div class="row">
			<form method="GET">
					<div class="input-field col s10">
					<input type="text" id="domain" name="domain" class="validate">
					<label class="active" for="domain">Domain or IP</label>
					</div>
					<div class="input-field col s2">
					<button class="btn red waves-effect waves-light" type="submit" onclick="showProgress()">Resolve<i class="mdi-content-send right"></i></button>
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
				$input = $page->sanitize($_GET['domain']);
				if (!$input) {} else {
					if (filter_var($input, FILTER_VALIDATE_IP)) {
						$iptools = new IPTools\WhoisIP();
					} else {
						$iptools = new IPTools\WhoisDomain($input);
						if ($iptools->isAvailable()) {
							print '<center><h2><i class="mdi-action-done large green" style="color: #fff;"></i> '.$input.' is available!</h2></center>';
						} else {
							print '<center><h2><i class="mdi-content-clear large red" style="color: #fff;"></i> '.$input.' is not available!</h2></center>';
						}
					}
				print '<div class="row">
    					<form class="col s12">
      						<div class="row">
        					<div class="input-field col s12">
          					<textarea id="textarea1" class="materialize-textarea" disabled>';

          		if (filter_var($input, FILTER_VALIDATE_IP)) {
					print $iptools->getWhois($input);
				} else {
					print $iptools->info();
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