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
  <head>  <link type="text/css" rel="stylesheet" href="../dogss_style.css">
</head> 
  <body>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(222,222,222);color:black">
<center><p class="titlehead">C-DOGS Abstract Submission 3/5</p></center>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
<strong> You are submitting:</strong>
<center><p class=title><?php echo tex_code($_SESSION['title']);?></p/>
	<p class=author><u/><?php echo tex_code($_SESSION['speaker']);?></u/>
  <?php // Add Co-authors to authors line at top of page
    if(!empty($_SESSION['coauthors'])) {
        $maxa = count($_SESSION['coauthors']); 
    }
    else {$maxa = 0;}
    $counter = 0;
    while($counter < $maxa) {
      echo ", ".tex_code($_SESSION['coauthors'][$counter]);
      $counter++;
    }
   ?>
  </p/></center/>
</td></tr></table>
<table border="0" cellpadding="5" cellspacing="10" width = 90%>
<tr><td style="background-color:rgb(244,255,255);color:black">
<div class="formfill">
  <?php // First Make Sure all Authors Have Affiliations

    $flag = 1;

    # Start with Speaker
    if(empty($_POST['speaker_affil'])) {
      $flag = 0;
      echo "Speaker must have affiliations, please go <a href=javascript:history.back(2)>back</a> and correct. (If the back link does not work, hit \"Reload\".)<br/>";
    }

    # Move onto Coauthors
    $maxc = count($_SESSION['coauthors']);
    $counterc = 0;  // the c stands for co-author
    while($counterc < $maxc) {
      if(empty($_POST['coauthor'.$counterc.'_affil'])) {
        $flag = 0;
        echo tex_code($_SESSION['coauthors'][$counterc])." must have affiliations, please go 
          <a href=javascript:history.back(1)>back</a> and correct<br/>";
      }
      $counterc++;
    }
    $add_affils = split('::',$_SESSION['extra_affils']);
    if($flag) { // All authors have affiliations, good!
      # Now try to order affiliations for superscripts...
      $m = 0;
      
      # This first loop gives superscript assignments starting with
      # speaker.
      foreach($_POST['speaker_affil'] as $key=>$value) {
        if (preg_match('([0-9]+)',$value)) {
          $value = $add_affils[$value];
        }
        $speaker_superscript[$m] = $m;
        $all_superscripts[$m] = $m+1;
        $affil_superscript[$m] = $value;
        ++$m;
      }

      # Look at following authors, assigning new superscripts as necessary
      # and reusing already existing ones.

      $counterc = 0; // One author at a time
      while($counterc < $maxc) { // Go through each co-author
        $k = 0;
	$m = count($affil_superscript);
        foreach($_POST['coauthor'.$counterc.'_affil'] as $key=>$value) {
          $n = 0;
          if (preg_match('([0-9]+)',$value)) {
            $value = $add_affils[$value];
          }
          while($n < $m) {
            $relationship = strcmp($value,$affil_superscript[$n]);
            if ($relationship == 0) {
               $coauth_superscript[$counterc][$k] = $all_superscripts[$n];
               $n = $m;
            }
            $n++;
          }
          if ($n == $m) { // The superscript has not yet been assigned
              $all_superscripts[$m] = $m+1;
              $affil_superscript[$m] = $value;
              $coauth_superscript[$counterc][$k] = $all_superscripts[$m];
          }
          $k++;
        }
      $counterc++;
      }
      $m = 0;
      while ($m < count($speaker_superscript)) {
        $superscript_point = $speaker_superscript[$m];
        ++$m;
      }
      $counterc = 0;
      while($counterc < $maxc) {
        $k = 0;
        while ($k < count($coauth_superscript[$counterc])) {
          $superscript_point = $coauth_superscript[$counterc][$k]-1;
	  ++$k;
        }
        $counterc++;
      }
      echo"<u/>{$_SESSION['speaker']}</u/>";

      # Get the superscripts for speaker affiliations
      $m = 0;
      $speaker_super = "";
      while ($m < count($speaker_superscript)) {
        $superscript_point = $speaker_superscript[$m];
        $speaker_super = $speaker_super.$all_superscripts[$superscript_point];
        ++$m;
        if($m < count($speaker_superscript)) {
          $speaker_super = $speaker_super.",";
        }
      }
      echo "<sup/>$speaker_super</sup/>";
      $counterc = 0;
      while($counterc < $maxc) {
	echo ",\n{$_SESSION['coauthors'][$counterc]}";

        # Get the superscripts for the coauthors
        $co_sup = "";
        $k = 0;
        while ($k < count($coauth_superscript[$counterc])) {
          $superscript_point = $coauth_superscript[$counterc][$k]-1;
          $co_sup = $co_sup.$all_superscripts[$superscript_point];
	  ++$k;
          if($k < count($coauth_superscript[$counterc])) {
            $co_sup = $co_sup.",";
          }
        }
	$coauthor_super[$counterc] = $co_sup;
        echo "<sup/>$co_sup</sup/>";
        $counterc++;
      }
      echo "<br/><br/>\n";
      $k = 0;
      while($k < count($all_superscripts)) {
        echo "<sup/>$all_superscripts[$k]</sup/>";
        echo "$affil_superscript[$k]<br/>\n";
	++$k;
      }

      # EXORT DATA TO NEXT PAGE THROUGH FORM
echo "<form action=\"submit4.php\" method=\"post\"/>\n";
      echo "<input type=\"button\" value=\"back\" onClick=\"history.go(-1)\"> ";
      echo "<input type=\"submit\" value=\"affiliations are correct\"/>\n";
      echo "</form/>\n";
    }
  ?>
  </body>
</html>
<?php $_SESSION["all_superscripts"] = $all_superscripts;
      $_SESSION["coauthor_super"] = $coauthor_super;
      $_SESSION["speaker_super"] = $speaker_super;
      $_SESSION["affil_superscript"] = $affil_superscript;
?>