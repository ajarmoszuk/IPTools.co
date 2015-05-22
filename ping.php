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
      <h1 class="header center white-text">Ping Tool</h1>
		<div class="card-panel">
		<span class="blue-text text-darken-2">
			<div class="row">
			<form method="GET">
					<div class="input-field col s6">
					<input type="text" id="ip" name="ip" class="validate">
					<label class="active" for="ip">IP (or hostname)</label>
					</div>
					<div class="input-field col s4">
					<input type="text" id="t" name="t" class="validate" value="4">
					<label class="active" for="t">Amount (max 10)</label>
					</div>
					<div class="input-field col s2">
					<button class="btn orange waves-effect waves-light" type="submit" onclick="showProgress()">Ping<i class="mdi-content-send right"></i></button>
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
				$IP = $page->sanitize($_GET['ip']);
				$Times = $page->sanitize($_GET['t']);
				if (!$IP || !filter_var($Times, FILTER_VALIDATE_INT)) {} else {
				print '<div class="row">';
				if ($iptools->checkOnline($IP) == true) {
					print '<center><h2><i class="mdi-action-done large green" style="color: #fff;"></i> '.$IP.' is Online!</h2></center>';
				} else {
					print '<center><h2><i class="mdi-content-clear large red" style="color: #fff;"></i> '.$IP.' is Offline!</h2></center>';
				}
				print '<div class="row">
    					<form class="col s12">
      						<div class="row">
        					<div class="input-field col s12">
          					<textarea id="textarea1" class="materialize-textarea" disabled>
							'.$iptools->ping($Times, $IP).'
          					</textarea>
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