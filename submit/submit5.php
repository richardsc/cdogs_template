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
  <head><link type="text/css" rel="stylesheet" href="../dogss_style.css">
</head> 
  <body>
   <table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(222,222,222);color:black">
<center><p class="titlehead">C-DOGS Abstract Submission 5/5</p></center>
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
  <center/><p class="title"/><?php echo tex_code($_SESSION['title']);?></p/>
	<p class="author"><u/><?php echo tex_code($_SESSION['speaker']);?></u/>
        <sup><?php echo $_SESSION['speaker_super']; ?></sup>
  <?php // Add Co-authors to authors line at top of page
    if(!empty($_SESSION['coauthors'])) {
        $maxa = count($_SESSION['coauthors']); }
    else { $maxa = 0; }
    $counter = 0;
    while($counter < $maxa) {
      echo ", ".tex_code($_SESSION['coauthors'][$counter]);
      echo "<sup>{$_SESSION['coauthor_super'][$counter]}</sup>";
      $counter++;
    }
    echo "<br/>";
    $k = 0;
    while ($k < count($_SESSION['all_superscripts'])) {
      $kplus = $k+1;
      echo"<sup>$kplus</sup>".tex_code($_SESSION['affil_superscript'][$k])."<br/></n>";
      ++$k;
    }
    echo"</p></center>";
    echo"<p div=abstract><strong>Abstract:</strong> ".nl2br(tex_code($_SESSION['abstract']));
   ?>
  </p>
  <p class=em>Speaker can be reached at <?php echo"{$_SESSION['email']}"; ?>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
<div class=formfill>
	<form action="submit6.php" method="post">
	Include email in abstract booklet?
	<input type="radio" name="em_book" value="yes" checked> yes
	<input type="radio" name="em_book" value="no"> no <br>
	Include email on webpage program?
	<input type="radio" name="em_web" value="yes" checked> yes
	<input type="radio" name="em_web" value="no"> no <br>
        <input type="submit" value="Submit Abstract">
</form>
</td></tr></table>

  </body>
</html>
