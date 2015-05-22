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
      <h1 class="header center white-text">Port Check</h1>
		<div class="card-panel">
		<span class="blue-text text-darken-2">
			<div class="row">
			<form method="GET">
					<div class="input-field col s5">
					<input type="text" id="ip" name="ip" class="validate" value="<? echo $iptools->getIP(); ?>">
					<label class="active" for="ip">IP</label>
					</div>
					<div class="input-field col s4">
					<input type="text" id="port" name="p" class="validate">
					<label class="active" for="port">Port (optional)</label>
					</div>
					<div class="input-field col s2">
					<button class="btn green waves-effect waves-light" type="submit" onclick="showProgress()">Check<i class="mdi-content-send right"></i></button>
					</div>
					<div class="input-field col s3">
					<input type="checkbox" id="checkall" name="c" value="1"/>
      				<label for="checkall">Check all common ports (optional)</label>
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
				<center>Please Wait... (this might take a while, grab a coffee or something)</center>
			</div>
			<?
				$ip = $page->sanitize($_GET['ip']);
				$port = $page->sanitize($_GET['p']);
				$checkall = $page->sanitize($_GET['c']);
				print '<div class="row">
    					<form class="col s9">
      						<div class="row">
        					<div class="input-field col s9">
          					<textarea id="textarea1" class="materialize-textarea" disabled>';
          		if (!$ip) {} else {
				if (!$checkall) {
					if (!$port) {
						print 'Please enter a port number or select to check all common ports and try again.';
					} else {
						print 'IP: '.$ip;
						print '&#13;&#10;&#13;&#10;';
						print 'Port '.$port.' is '.$iptools->checkPort($ip, $port).'.';
					}
				} else {
					if ($checkall && $port) {
						print 'You cannot check a single port and all common ports at once, try again.';
					} else {
					$commonPorts = array(21, 22, 23, 25, 53, 80, 110, 115, 135, 139, 143, 194, 443, 445, 1433, 1194, 1723, 3306, 3389, 5900);
					print 'IP: '.$ip;
					print '&#13;&#10;&#13;&#10;';
						foreach ($commonPorts as &$port) {
							print 'Port '.$port.' is '.$iptools->checkPort($ip, $port).'.';
							print '&#13;&#10;';
						}
					}
				}
			}
          		print '</textarea>
          					<label for="textarea1">Output</label>
        				</div>
      					</div>
   					 </form>
   					       ';
  			print '<div class="row"><div class="col s5 m3" style="right: 0;">
       		<div class="card-panel blue">
          	<span class="white-text">
          		Common ports:<br>21 (FTP)<br>22 (SSH)<br>23 (Telnet)<br>25 (SMTP)<br>53 (DNS)<br>80 (HTTP)<br>110 (POP3)<br>115 (SFTP)<br>135 (RCP)<br>139 (NetBIOS)<br>143 (IMAP)<br>194 (IRC)<br>443 (SSL)<br>445 (SMB)<br>1433 (MSSQL)<br>1194 (OpenVPN)<br>1723 (PPTP & L2TP)<br>3306 (MYSQL)<br>3389 (Remote Desktop)<br>5900 (VNC)<br>
          	</span>
        	</div>
      		</div>
  				</div>';
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