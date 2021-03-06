<?php 
  session_start();
  session_unset();
  session_destroy();

  session_start(); 
  session_register("title");
  session_register("speaker");
  session_register("co");
  session_register("email");
  session_register("coauthors");
  session_register("next_affils"); 
  session_register("extra_affils"); 
  session_register("affil_superscript");
  session_register("speaker_super");
  session_register("coauthor_super");
  session_register("coauth_superscript");
  session_register('abstract');

  register_globals;

  $dal = "Department of Oceanography, Dalhousie University, Halifax, NS, B3H 4J1, Canada";
  $bio = "Bedford Institute of Oceanography, Dartmouth, NS, B2Y 4A2, Canada";
  $_SESSION['extra_affils'] = $dal."::".$bio;
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
    <div class=pre> Note that the submission format for accents, symbols,
       italics, etc., is LaTeX. If you need examples, 
       <a href="../latex_guide.html" target="new window">click here</a>.
    </div>
  </td></tr>
</table>

<table border="0" cellpadding="5" cellspacing="10" width = 90%>
  <tr><td style="background-color:rgb(244,255,255);color:black">
    <div class="formfill">
      <form action="submit1_test.php" target="main" method="post">
	Title of Presentation: <input type="text" name="title" /> <br/>
      Speaker (firstname and lastname ONLY - no middle names or initials please): <input type="text" name="speaker"/> <br/>
        Speaker's Email Address <input type="text" name="email"/> <br/>
	Number of coauthors: 
	<input type="radio" name="co" value="0" checked> 0 
	<input type="radio" name="co" value="1"> 1 
	<input type="radio" name="co" value="2"> 2 
	<input type="radio" name="co" value="3"> 3 
	<input type="radio" name="co" value="4"> 4 
	<input type="radio" name="co" value="5"> 5 
	<input type="submit" value="Continue"/>
      </form>
    </div>
  </tr></td>
</table>
</body>
</html>