<?
include($_SERVER['DOCUMENT_ROOT']."/utils/iptools.main.class.php");
$page = new IPTools\Main;
$page->getTemplate("header");
?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
    <br><br>
      <h1 class="header center white-text">IP Tools</h1>
      <div class="row center">
        <h5 class="header col s12 light">Please select a service to use.</h5>
      </div>
      <div class="row center">
		     <a href="/ip" class="btn-large waves-effect waves-light pink">My IP</a>
         	 <a href="/ping" class="btn-large waves-effect waves-light orange">Ping</a>
		     <a href="/trace" class="btn-large waves-effect waves-light blue">Traceroute</a>
		     <a href="/ports" class="btn-large waves-effect waves-light green">Port Check</a>
		     <a href="/whois" class="btn-large waves-effect waves-light red">Whois</a>
		     <a href="/reverse" class="btn-large waves-effect waves-light brown">Reverse</a>
         	 <a href="/dns" class="btn-large waves-effect waves-light cyan">DNS</a>
      </div>
    </div>
  </div>

<?
$page->getTemplate("footer");
?>