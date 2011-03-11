<?php        session_start(); ?>

<?php // functions used on this page


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

function check_email_address($email) {
    // this function test if the input is a valid email address, and
    // returns either "True" or "False"
    return preg_match('/[^\s@]+@([\w]+\.)+([-a-z]{2,3})/i', $email);
}

function check_name($name) {
    // this function tests if the input is an acceptable name, and
    // returns either "True" or "False"
    return preg_match('/[^\!\@\#\&\*]+/', $name);
}

function fix_tex($name) {
    // turns "\\alpha" to "\alpha", and "\\'" to "\'" 
    $phpstuff = array("\\\\","\'","\\\"");
    $texstuff = array("\\","'","\"");
    $name = str_replace($phpstuff, $texstuff,$name);
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
<center><p class="titlehead">C-DOGS Abstract Submission 1/5</p></center>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
  <div class="formfill">
  <?php if(empty($_POST["title"])) { 
	  echo"You must enter a title for your talk, please go <a href=javascript:history.back(1)>back</a>";} 
	elseif(empty($_POST["speaker"])) {
	  echo"You must enter a name for the speaker, please go <a href=javascript:history.back(1)>back</a>";}
        elseif(empty($_POST["email"])) {
          echo "You must enter an email address, <a href=javascript:history.back(1)>back</a>"; }
        elseif(!check_email_address($_POST["email"])) {
          echo "You must enter a <strong><font color=red>valid</font></strong> email address. Please go <a href=javascript:history.back(1)>back</a> and make the necessary changes.";
        }
	else {
        if ($_POST['co'] == 0) {
          echo "<form action=\"submit3.php\" method = post>";
        }
        else {
	  echo"<form action=\"submit2.php\" method = post>";
        }

        $_SESSION['title'] = fix_tex($_POST['title']);
        $_SESSION['speaker'] = fix_tex($_POST['speaker']);
        $_SESSION['co'] = $_POST['co'];
        $_SESSION['email'] = $_POST['email'];
 	echo"  You are submitting a talk titled 
	  <strong/>".tex_code($_SESSION['title'])."</strong/> to
	  be presented by <u/>".tex_code($_SESSION['speaker'])."</u/>
	  with {$_SESSION['co']} co-authors. ".tex_code($_SESSION['speaker'])." can be reached 
          at {$_POST['email']}. <br>
	  <input type=\"button\" value=\"Back\" onClick=\"history.go(-1)\">
	  <input type=\"submit\" value=\"Continue\"/>";
	}
  ?>

  </body>
</html>
