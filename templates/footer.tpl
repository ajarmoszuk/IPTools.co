  <footer class="page-footer indigo darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">IPTools.co</h5>
          <p class="grey-text text-lighten-4">IPTools.co is a service which will easily allow you to check different network functions of your home router or server.</p>
        </div>
		  <div class="col l3 s12">
			  <h5 class="white-text">Bookmarklets</h5>
			  <ul>
				  <li><i class="mdi-action-lock"></i> <a class="white-text" href="javascript:location.href='http://<?php $_SERVER['SERVER_NAME']; ?>/ping?ip='+encodeURIComponent(location.host)+'&t=4'">Ping this site</a></li>
				  <li><i class="mdi-action-lock"></i> <a class="white-text" href="javascript:location.href='http://<?php $_SERVER['SERVER_NAME']; ?>/trace?ip='+encodeURIComponent(location.host)+'&hops=30'">Traceroute this site</a></li>
				  <li><i class="mdi-action-lock"></i> <a class="white-text" href="javascript:location.href='http://<?php $_SERVER['SERVER_NAME']; ?>/ports?ip='+encodeURIComponent(location.host)+'&c=1'">Check common ports on this site</a></li>
			  </ul>
		  </div>
		  <div class="col l3 s12">
			  <h5 class="white-text">More...</i></h5>
			  <ul>
				  <li><i class="mdi-action-lock"></i> <a class="white-text" href="javascript:location.href='<?php $_SERVER['SERVER_NAME']; ?>/whois?domain='+encodeURIComponent(location.host)">Whois this site</a></li>
				  <li><i class="mdi-action-lock"></i> <a class="white-text" href="javascript:location.href='<?php $_SERVER['SERVER_NAME']; ?>/reverse?ip='+encodeURIComponent(location.host)">Reverse IP on this site</a></li>
				  <li><i class="mdi-action-lock"></i> <a class="white-text" href="javascript:location.href='http://<?php $_SERVER['SERVER_NAME']; ?>/dns?i='+encodeURIComponent(location.host)">DNS Resolve this site</a></li>
			  </ul>
		  </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Powered by <a class="indigo-text text-lighten-3" href="https://nanobit.pro">Nanobit.pro</a> | Built with <a class="indigo-text text-lighten-3" href="http://materializecss.com/">Materialize v0.96</a> | <a class="white-text" href="https://nanobit.pro">Get a cheap VPS or webhosting!</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="/assets/js/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.min.js"></script>
  <script src="/assets/js/init.js"></script>

  </body>
</html>
