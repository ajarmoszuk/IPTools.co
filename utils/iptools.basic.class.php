<?php
namespace IPTools;

class basicTools {
	public function getIP() {
		$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}

	public function getAgent() {
		$agent = $_SERVER['HTTP_USER_AGENT'];
		return $agent;
	}

	public function getISP($ip) {
		$org = geoip_org_by_name($ip);
		if (!$org) {
			return 'Unknown';
		} else {
			return $org;
		}
	}

	public function getHostnameCountry($hostname) {
		$country = geoip_country_name_by_name($hostname);
		if (!$country) {
			return 'Unknown';
		} else {
			return $country;
		}
	}

	public function getASN($hostname) {
		$asn = geoip_asnum_by_name($hostname);
		if (!$asn) {
			return 'Unknown';
		} else {
			return $asn;
		}
	}


	public function getHostnameCity($hostname) {
		$get = geoip_record_by_name($hostname);
		if (!$get) {
			return 'Unknown';
		} else {
			return $get;
		}
	}

	public function ping($times, $hostname) {
		if ($times > 10) { 
			return "The value of times to ping is too high, please lower the value and try again.";
		} else {
			$ping = shell_exec(sprintf('ping -c %s -W 5 %s', escapeshellarg($times), escapeshellarg($hostname)));
        	return $ping;
        }
	}

	public function checkOnline($ip) {
        exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($ip)), $res, $rval);
        return $rval === 0;
	}

	public function getHostnameIP($ip) {
		$get = gethostbyaddr($ip);
		return $get;
	}

	public function getIPHostname($hostname) {
		$get = gethostbyname($hostname);
		return $get;
	}

	public function traceroute($hops, $hostname) {
		$traceroute = shell_exec(sprintf('traceroute -w 3 -q 1 -N 32 -m %s %s', escapeshellarg($hops), escapeshellarg($hostname)));
        return $traceroute;
	}

	public function getDNS($hostname) {
		$dns = shell_exec(sprintf('dig +nocmd +multiline +noall +answer any %s', escapeshellarg($hostname)));
        return $dns;
	}

	public function checkPort($hostname, $port) {
		$f = fsockopen($hostname, $port, $errno, $errstr, 5);
		if (!$f) {
    		return "[CLOSED]";
		} else {
    		return "[OPEN]";
    		fclose($f);
		}	
	}
}