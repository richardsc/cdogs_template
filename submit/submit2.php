<?php session_start(); 


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
    <div class=pre> Note that the submission format for accents, symbols,
       italics, etc., is LaTeX. If you need examples, 
       <a href="../latex_guide.html" target="new window">click here</a>.
    </div>
  </td></tr>
</table>

<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
<strong> You are submitting:</strong>
  <center/><p class="title"><?php echo tex_code($_SESSION["title"]); ?></p/>
	<p class="author">presented by <u/><?php echo tex_code($_SESSION["speaker"]); ?></u/></p/></center/>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
  <div class="formfill">
  <form action="submit2_test.php" method="post">
  <?php
     $counter = 1; 
     $maxc = $_SESSION["co"];
     if ($maxc > 0) {echo "Please provide co-author names:<br/>";}
     while($counter <= $maxc) {
	echo "
	co-author $counter: <input type=\"text\" name=\"coa[]\"\> <br\>";
	$counter ++;
     } ?>
  <br>
  <input type="button" value="Back" onClick="history.go(-2)">
  <input type="submit" value="Continue"/>
  </form>

  </body>
</html>
