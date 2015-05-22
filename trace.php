<?
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.main.class.php");
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.basic.class.php");
$page = new IPTools\Main;
$iptools = new IPTools\BasicTools;
$page->getTemplate("header");
?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br><br><br><br>
      <h1 class="header center white-text">Traceroute</h1>
		<div class="card-panel">
		<span class="blue-text text-darken-2">
			<div class="row">
			<form method="GET">
					<div class="input-field col s6">
					<input type="text" id="ip" name="ip" class="validate">
					<label class="active" for="ip">IP</label>
					</div>
					<div class="input-field col s4">
					<input type="text" id="hops" name="hops" class="validate" value="30">
					<label class="active" for="hops">Max amount of hops</label>
					</div>
					<div class="input-field col s2">
					<button class="btn blue waves-effect waves-light" type="submit" onclick="showProgress()"><i class="mdi-content-send right"></i>Trace</button>
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
				$Hops = $page->sanitize($_GET['hops']);
				if (!$IP || !filter_var($Hops, FILTER_VALIDATE_INT)) {} else {
				print '<div class="row">
    					<form class="col s12">
      						<div class="row">
        					<div class="input-field col s12">
          					<textarea id="textarea1" class="materialize-textarea" disabled>
IP: '.$IP.'

'.$iptools->traceroute($Hops, $IP).'
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