<!doctype HTML public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang=en>
<head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>C-DOGS</title>
<link type="text/css" rel="stylesheet" href="../dogss_style.css">
</head>
<body>
<table border="0" cellpadding="3" cellspacing="5" width = "100%">
<tr>
<td style="background-color:rgb(222,222,222);color:black">
<br><center><p class="titlehead">C-DOGS 2007 Schedule</p>
</center><br>
</td>
</tr>
</table>

</table>
<table border="0" cellpadding="3" cellspacing="5" width = 100%>
<tr style="background-color:rgb(244,255,255);color:0066ff">
<td colspan = 3>
</td></tr></table>


<table border="0" cellpadding="3" cellspacing="5" width = "100%"> 
<?php
$times = array('8:30', '9:00', '9:15', '9:30', '9:45', '10:00', '10:15', '10:30', '10:45', '11:00', '11:15', 
	       '11:30', '11:45', '12:00', '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:25', 
	       '14:40', '14:55', '15:10', '15:25', '15:40', '15:50', '16:05', '16:20', '16:35', '16:50', '5:05');

$speakers = array('COFFEE',
		  'WELCOME',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Brownell_Darlene_12042274471"/>Darlene Brownell</a/>',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Alcinov_Trajce_12049188772"/>Trajce Alcinov</a/>',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Mattern_Paul_1205146974"/>Paul Mattern</a/>',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Lin_Yuehua_1203354507"/>Yuehua Lin</a/>',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Oliver_Eric_1204656658"/>Eric Oliver</a/>',
		  'BREAK',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Titus_Lee_1204902018"/>Lee Titus</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Vanderlaan_Angelia_1204813882"/>Angelia Vanderlaan</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Ji_Xiaomei_12035283312"/>Xiaomei Ji</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Barry_Mark_12046424562"/>Mark Barry</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Corkum_Matthew_1204309600"/>Matthew Corkum</a/>',
		  'LUNCH',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Yang_Bo_1204657964"/>Bo Yang</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Watanabe_Shana_12048202512"/>Shana Watanabe</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Higginson_Simon_1204909590"/>Simon Higginson</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=LEsperance_Chris_12049936782"/>Chris LEsperance</a/>',
' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Moore_Stephanie_12047691182"/>Stephanie Moore</a/>',
		  'BREAK',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Mecking_Jennifer_1203629109"/>Jennifer Mecking</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Davies_Kimberley_12045759962"/>Kimberley Davies</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Leong_Doris_1204991655"/>Doris Leong</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Comeau_Adam_1204571540"/>Adam Comeau</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Maier_Irene_1204911779"/>Irene Maier</a/>',
		  'BREAK',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Kelly_Jennifer_12049134472"/>Jennifer Kelly</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Matthews_Marie-Noel_12046541052"/>Marie-Noel Matthews</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Saunders_Megan_12053454772"/>Megan Saunders</a/>',
   ' <a class="plain" target="Main" href="../abstracts/submitted.php?abs=Breen_Erin_12053457392"/>Erin Breen</a/>',
   ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Richards_Clark_1205164353"/>Clark Richards</a/>',
		  'CLOSING REMARKS AND RETIRE TO 5th FLOOR LOUNGE');

$title = array(' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ',
   ' ');


<!--$title = array(' ',
	       ' ',
	       ' <i> Prochlorococcus marinus </i> as a source of Marine Methyl Iodide (CH<em><sub>3</sub></em>I)',
	       ' Long Wavelength Ripples in the Nearshore',
	       ' Application of two Statistical Data Assimilation Procedures to a 1D Biological Model of the BATS Site',
	       ' Transport variability through the Yucatan Channel: the influence of the Florida Current and flow compensation around Cuba',
	       ' Extratropical Expressions of the Madden-Julian Oscillation',
	       ' ',
	       ' Improving statistical downscaling of general circulation models',
	       ' Reducing the risk of lethal encounters: vessels and right whales in the Bay of Fundy and on the Scotian Shelf',
	       ' Potential Artificial Beach Design for Baipai Artificial Island, Sanya Bay, Hainan',
	       ' Bubbling from below: a look at pockmark formation',
	       ' High Resolution Wind Forecasting along the Coast of Nova Scotia',
	       ' ',
	       ' Development of a Five-Level Nested-Grid Coastal Circulation Prediction System for the Inner Scotian Shelf',
	       ' Patterns in abundance and size of two deep-water gorgonian coral species, in relation to depth and substrate features, along the continental slope at Northeast Channel, Nova Scotia',
	       ' "De-eddying" ocean data',
	       ' Non-isovolumetric Measurement of Young's Modulus and Poissons Ratio of Marine Sediments',
	       ' On the Angular Dependence of Acoustic Scattering from Sand in Suspension',
               ' ',
	       ' The barotropic ocean response to fast moving tropical cyclones affecting Atlantic Canada',
	       ' Feeding ecology of North Atlantic Right Whales: the role of zooplankton in controlling the spatiotemporal distribution of a predator across four orders of magnitude in size',
	       ' Sounds like turbulence',
	       ' New method to estimate a parameter of phytoplankton physiology related to primary productivity models',
	       ' Linear Transition Ripples: Crest Alignment and Ripple Migration',
	       ' ',
               ' Isolated Population Dynamics as a Potential Consequence of Low Abundances for Atlantic Cod',
	       ' Estimating Geoacoustic Parameters of Gassy Sediment using Low-Frequency Sound in St. Margarets Bay, Nova Scotia',
	       ' Kelp bed defoliation by an introduced bryozoan in St Margarets Bay',
	       ' Population biology of the invasive European green crab, <i>Carcinus maenas</i>, and two native decapods in a brackish micro-tidal system in Nova Scotia, Canada.',
	       ' Some questions about nonlinear internal wave groups',
	       ' ');
-->

$i = 0;
while ($i < count($times)) {
  print "<tr style=\"background-color:rgb(244,255,255);color:0066ff\">\n";
  print "<td align = right>$times[$i]</td>\n";
  print "<td> $speakers[$i]</td>\n<td>$title[$i]</td>\n";
  print "</tr>\n";
  ++$i;
}

?>

</table>


</body>
</html>
