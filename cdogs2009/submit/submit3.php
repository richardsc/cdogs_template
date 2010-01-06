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
      <center><p class="titlehead">C-DOGS Abstract Submission 3/5</p></center>
    </td></tr>
  </table>

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
      <center><p class=title><?php echo tex_code($_SESSION['title']);?></p/>
      <p class=author><u/><?php echo tex_code($_SESSION['speaker']);?></u/>
      <?php // Add Co-authors to authors line at top of page
        if(!empty($_SESSION['coauthors'])) {
          $maxa = count($_SESSION['coauthors']); 
        }
        else { $maxa = 0; }
        $counter = 0;
        while($counter < $maxa) {
          echo ", ".tex_code($_SESSION['coauthors'][$counter]);
          $counter++;
        }
      ?></p/></center/>
    </td></tr>
  </table>
  <table border="0" cellpadding="5" cellspacing="10" width = 90%>
    <tr><td style="background-color:rgb(244,255,255);color:black">
      <div class="formfill">

      This page assigns affilliations to each author. The Department of 
      Oceanography and the Bedford Institute of Oceanography (BIO)
      have been added for your convenience. If you need other
      affiliations, please add them one at a time by entering it into
      the (Need another affiliation?) box below.<br><br>

  <!This form adds extra affiliations to form lists below>
  <form action="<?php $PHP_SELF; ?>" method="post">
    <?php 
      if(!empty($_POST['next_affil'])) {
        if($_POST['next_affil']===$_SESSION['next_affil']) {
        }
        else{
          $_SESSION{'extra_affils'} = $_SESSION['extra_affils']."::".fix_tex($_POST['next_affil']);
          $_SESSION['next_affil'] = $_POST['next_affil'];
        }
      }
      $add_affils = split('::',$_SESSION['extra_affils']);
    ?>
    (Need another affiliation?)
     <input type="text" name="next_affil"> <input type="submit" value="Add">
  </form>
  <!***** END OF "ADD AFFILIATION" FORM *****>

<hr>
  <form action="submit3_test.php" method="post">
    <?php echo $_SESSION['speaker'];?>'s Affiliations: <br>

    <?php // add extra affiliations
      if(count($add_affils) > 0) {
        $maxc = count($add_affils);
        $counterm = 0;
        while($counterm < $maxc) {
          echo "<input type=\"checkbox\" name=\"speaker_affil[]\" value=\"$counterm\">
            ".tex_code($add_affils[$counterm])."<br/>";
          $counterm++;
        }
      }
     ?>
  <br><br>
  <?php // coauthor's affiliations
    $counter = 0;
    while($counter < $maxa) {
      echo "{$_SESSION['coauthors'][$counter]}'s Affiliations<br/>";
      if(count($add_affils) > 0) {
        $maxc = count($add_affils);
        $counterm = 0;
        while($counterm < $maxc) {
          echo "<input type=\"checkbox\" 
            name=\"coauthor".$counter."_affil[]\" value=\"$counterm\">
            ".tex_code($add_affils[$counterm])."<br/>";
          $counterm++;
        }
      }
      $counter++;
      echo "<br/><br/>";
    }
  ?>
  <input type="submit" value="Continue">
  </form>
  </body/>
</html/>