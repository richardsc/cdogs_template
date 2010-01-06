#!/usr/bin/perl -w
use strict;
# This script lists all the submitted abstracts in ../.sumbissions/,
# determines the first and last names of the speakers from within the file,
# and writes out the html code that needs to be inserted into the file
# ../abstracts/submitted.php

# Also writes a similar file for the schedule ../schedule/schedule.php

#=====================================================================
# Declare Variables
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# Directories
#---------------------------------------------------------------------
my $sub_dir = '../.submissions/';
my $abs_dir = '../abstracts/';
my $sch_dir = '../schedule/';
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# Files
#---------------------------------------------------------------------
my $junk_file = 'scrap.txt';
my $abs_file = $abs_dir.'speaker_list.html';
my $sched_file = $sch_dir.'speakers.txt';
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# Variables related to reading $junk_file
#---------------------------------------------------------------------
my $parline; #line of file
my @parts;
my $fname;
my $firstname;
my $lastname;
my $html_tag1 = ' <a class="plain" target="main" href="?abs=';
my $html_tag12 = ' <a class="plain" target="main" href="../abstracts/submitted.php?abs=';
my $html_tag2 = '"/>';
my $html_tag3 = '</a/>';

#=====================================================================
# Generate a list of abstracts produced by CDOGS online submission
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# put the list of files into $junk_file
#---------------------------------------------------------------------
system "ls $sub_dir"."*.txt > $junk_file";
# note that the list command alphabetizes by last name based on the
# file naming system!
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# open $junk_file and $abs_file
#---------------------------------------------------------------------
open(FIN, $junk_file);
open(FOUT, "> $abs_file");
open(FOUT2, "> $sched_file");
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# Go through $junk_file, and parse the filenames
#---------------------------------------------------------------------
while ($parline = <FIN>) {
    chop($parline);
    # Break up directory structure
    @parts = split('/',$parline); 
    # Take file name out of @parts and remove the ".txt part"
    @parts = split('\.',$parts[scalar(@parts)-1]); 
    $fname = $parts[0];
    @parts = split('_',$fname);
    $lastname = $parts[0];
    $firstname = $parts[1];
    print FOUT "::".$html_tag1.$fname.$html_tag2.$firstname." ".$lastname.$html_tag3."<br>\n";
    print FOUT2 "\'".$html_tag12.$fname.$html_tag2.$firstname." ".$lastname.$html_tag3."\'\n";
}
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# close $junk_file, $abs_file;
#---------------------------------------------------------------------
close(FIN);
close(FOUT);
system "rm $junk_file";
#---------------------------------------------------------------------


