<?php session_start();

function fix_tex($name) {
    // turns "\\alpha" to "\alpha", and "\\'" to "\'" 
    $phpstuff = array("\\\\","\'","\\\"");
    $texstuff = array("\\","'","\"");
    $name = str_replace($phpstuff, $texstuff,$name);
    return $name;
}

function tex_code($name) { // color codes latex in html using dogss_style.css
   $sl = preg_quote('\sl','/');
   $rm = preg_quote('\rm','/');
   $dol = preg_quote('$','/');
   $slash = preg_quote('\\','/');
   $squig_open = preg_quote('{','/');
   $squig_close = preg_quote('}','/');
   $name = preg_replace("/(".$sl.")/",'$1<font class="italic">', $name);
   $name = preg_replace("/(".$rm.")/",'</font>$1', $name);



   $name = preg_replace("/(".$squig_open.")/",'<font class="squiggle">$1', $name);
   $name = preg_replace("/(".$squig_close.")/",'$1</font>', $name);

   $name = preg_replace("/(".$dol."[^".$dol."]+".$dol.")/",'<font class="math">$1</font>', $name);
   $name = preg_replace("/(".$slash."[^\s|\[|\]|(|)|\^|\_|\{|<|\$]+)/",'<font class="object">$1</font>', $name);
   return $name;
}

?>
<html>
  <head>
  <link type="text/css" rel="stylesheet" href="../dogss_style.css">
</head> 
  <body>
   <table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(222,222,222);color:black">
<center><p class="titlehead">C-DOGS Abstract Submission 2/5</p></center>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
<strong> You are submitting:</strong>
  <center/><p class="title"><?php echo tex_code($_SESSION['title']);?></p/>
	<p class="author">presented by <u/><?php echo tex_code($_SESSION['speaker']);?></u/></p/></center/>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
  <div class="formfill">
  <?php
    $flag = 1; 
    $counter = 0;
    $maxc = count($_POST['coa']);
    $_SESSION['coauthors'] = fix_tex($_POST['coa']);
    while($counter < $maxc) {
      $counter1 = $counter + 1;
      if(empty($_SESSION['coauthors'][$counter])) {
        echo"You must enter a name for co-author {$counter1}.<br\>\n";
        $flag = 0;
      }
      $counter++;
    }
    if($flag){ 
      echo tex_code($_SESSION['speaker'])." has $maxc coauthors:";
      $counter = 0;
      while($counter < $maxc) {
        echo " ".tex_code($_SESSION['coauthors'][$counter]);
	$counter++;
        if ($counter < $maxc) {echo",";}
      }
      echo "<form action=\"submit3.php\" method = post>";
      echo "
  <input type=\"button\" value=\"Back\" onClick=\"history.go(-1)\">
 	  <input type=\"submit\" value=\"Continue\"/>
          </center/>";
    }
    else{echo"Please go <a href=javascript:history.back(1)>back</a> and make the necessary corrections.";}
  ?>
  </body>
</html>