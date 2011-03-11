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
<br><center><p class="titlehead">C-DOGS 2009 Schedule</p>
</center><br>
</td>
</tr>
</table>

</table>
<table border="0" cellpadding="3" cellspacing="5" width = "100%"> 
<?php
$times = array('8:30', '9:00', '9:30', '9:45', '10:00', '10:15', '10:30', '11:00', '11:15', 
	       '11:30', '11:45', '12:00', '12:15','12:30', '13:30', '13:45', '14:00', '14:15', '14:30', 
	       '14:45', '15:00', '15:20', '15:35', '15:50', '16:05', '16:20', '16:35', '16:50', '17:05');

$speakers = array('COFFEE',
		  'WELCOME AND KEYNOTE TALK BY DR. BOB FOURNIER',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Gilbert_Chad_1234828117"/>Chad Gilbert</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Ibarra_Diego_1236357567"/>Diego Ibarra</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Hastings_Katherine_12355988011"/>Katherine Hastings</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Mattern_Paul_1236360413"/>Paul Mattern</a/>'
		  'BREAK',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Filgueira_Ramon_1236373383"/>Ramon Filgueira</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Daigle_Remi_12363696181"/>Remi Daigle</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Bagniewski_Witold_1236154058"/>Witold Bagniewski</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Algar_Christopher_1236341110"/>Christopher Algar</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Alcinov_Trajce_1236349420"/>Trajce Alcinov</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Leong_Doris_1236541628"/>Doris Leong</a/>'
		  'LUNCH',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Higginson_Simon_1236282625"/>Simon Higginson</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Richards_Clark_1234749482"/>Clark Richards</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Oliver_Eric_12345504011"/>Eric Oliver</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Saunders_Megan_12361108471"/>Megan Saunders</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Lloyd_Michelle_12363610331"/>Michelle Lloyd</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Vanderlaan_Angelia_1236194131"/>Angelia Vanderlaan</a/>'
		  'BREAK',
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Urrego-Blanco_Jorge_1236363847"/>Jorge Urrego-Blanco</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Lin_Yuehua_1236193253"/>Yuehua Lin</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Shan_Shiliang_123636637211"/>Shiliang Shan</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Brillant_Sean_1236699220"/>Sean Brillant</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Comeau_Adam_1236393147"/>Adam Comeau</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Delaney_Lisa_1236476170"/>Lisa Delaney</a/>'
		  ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=Davies_Kimberley_1236270791"/>Kimberley Davies</a/>'
		  'CLOSING REMARKS AND RETIRE TO 5th FLOOR LOUNGE');

$title = array(' ',
	       ' ',
	       ' Sustainability of scallop populations on Georges Bank: implications of spawning seasonality',
	       ' A 3-D physical-biological model to assess the effect of mussel aquaculture on water-column dynamics in Ship Harbour, Nova Scotia',
	       ' Reconstructing precipitation variations 0-30 kyrs BP in the western equatorial Pacific using organic biomarkers ',
	       ' Comparing satellite data and model output using image distance measures ',
	       ' ',
	       ' A box model of carrying-capacity for mussel aquaculture in a Norwegian fjord ',
	       ' Physiological and Ecological Interactions of Native Cancer spp. and Carcinus Maenas in British Columbia, Canada ',
	       ' Application of variational data assimilation to coupled physical-biological models of the North Atlantic Bloom ',
	       ' A model for bubble rise in soft sediments ',
	       ' Long Wavelength Ripples in the Nearshore ',
	       ' Does turbulence sound the same from over here, under there, everywhere? ',
	       ' ',
	       ' Sea level rise: A better understanding from new satellite measurements ',
	       ' Internal wave generation in the St. Lawrence Estuary ',
	       ' The Madden-Julian Oscillation and Local and Remote Forcing of the Ocean ',
	       ' Temperature, timing and growth: implications for outbreaks of an introduced species ',
	       ' Influence of density-dependent food consumption, foraging and stacking behaviour on the growth rate of the Northern abalone, Haliotis kamtschatkana',
	       ' Ships voluntarily alter course to protect endangered whales ',
               ' ',
	       ' Development of a nested-grid shelf circulation model using OPA for the eastern Canadian shelf ',
	       ' Numerical and observational study of circulation in the Intra-Americas Sea: connection between Gulf of Mexico Loop Current intrusion and throughflow transport variability',
	       ' Numerical Study of Tidal Circulation in Jiaozhou Bay and Adjacent Coastal Waters Using a High-resolution, Three-dimensional Circulation Model',
	       ' Groundline profiles on the Bay of Fundy lobster gear as a threat to North Atlantic right whales ',
	       ' Methods: describing phytoplankton physiological variability',
	       ' A Phytoplankton Pigment Extraction Protocol for Marine Sediments',
	       ' Physical forcing of space-time variation in the copepod prey field of North Atlantic right whales',
	       ' ');

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
