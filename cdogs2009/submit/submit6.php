<?php session_start(); ?>
<html>
  <head><link type="text/css" rel="stylesheet" href="../dogss_style.css">
</head> 
<body>
<div class=hidden>
<?php
    $xml_file = "<abstract>\n";
    $xml_file = $xml_file."  <title> {$_SESSION['title']} </title>\n";
    $xml_file = $xml_file."  <speaker>\n    <name> {$_SESSION['speaker']} </name>\n";
    $xml_file = $xml_file."    <affil_numbers> {$_SESSION['speaker_super']} </affil_numbers>\n";
    $xml_file = $xml_file."    <email>\n      <address> {$_SESSION['email']} </address>\n";
    $xml_file = $xml_file."      <post_web> {$_POST['em_web']} </post_web>\n";
    $xml_file = $xml_file."      <post_book> {$_POST['em_book']} </post_book>\n";
    $xml_file = $xml_file."    </email>\n  </speaker>\n";
    if(!empty($_SESSION['coauthors'])) {
      $maxa = count($_SESSION['coauthors']);
      $counter = 0;
      while($counter < $maxa) {
       $xml_file = $xml_file."  <coauthor>\n    <name> {$_SESSION['coauthors'][$counter]} </name>\n";
       $xml_file = $xml_file."    <affil_numbers> {$_SESSION['coauthor_super'][$counter]} </affil_numbers>\n";
       $xml_file = $xml_file."  </coauthor>\n";
       $counter++;
      }
    }
    $k = 0;
    while ($k < count($_SESSION['all_superscripts'])) {
      $kplus = $k+1;
      $xml_file = $xml_file."  <affiliation>\n    <name> {$_SESSION['affil_superscript'][$k]} </name>\n";
      $xml_file = $xml_file."    <affil_number> {$kplus} </affil_number>\n  </affiliation>\n";
      ++$k;
    }
    

    $xml_file = $xml_file."  <text> {$_SESSION['abstract']} </text>\n</abstract>\n";
    $string = $xml_file;
    echo $string;
    preg_match('/ (.+)$/', $_SESSION['speaker'], $speakname2);
    preg_match('/^(.+) /', $_SESSION['speaker'], $speakname1);
    $i = count($speakname2)-1;
# need to give write permission to ../.submission/
    $a = time();
    $fname = '../.submissions/'.$speakname2[$i]."_".$speakname1[1].'_'.$a.'.txt';
    $handle = fopen($fname, 'a');
    fputs($handle, $string);
    fclose($handle);

#send an email to inform about the submission.
$today = date("M d, Y - H:i:s");
mail("clark.richards@phys.ocean.dal.ca", "New CDOGS Submission!!", "There is a new submission on the CDOGS website, submitted: $today.");
  ?>
</div>
<p> Thanks, we'll get back to ya.</p>
  </body>
<html>
      




