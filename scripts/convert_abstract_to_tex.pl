#!/usr/bin/perl -w
use strict;
# This script lists all the submitted abstracts in ../.sumbissions/,
# creates individual pdf files of the abstracts.

# -- Future plans --
# write a complete abstract booklet
#
# write an abstract booklet that uses "schedule file"
# posted as ../schedule/schedule.php

#=====================================================================
# This First Function Makes the individual abstracts
#---------------------------------------------------------------------
sub ind_abs {

  my $sub_dir = '../.submissions/';
  my $abs_dir = '../abstracts/';
  my @parts;
  my $fname;

  #---------------------------------------------------------------------
  # Variables related to making the tex file
  #---------------------------------------------------------------------

  my $abs_file;
  my @abs_foo;
  my @abs_foobar;
  my $abs_out;
  my $abs_title;
  my $abs_speak;
  my $abs_speak_name;
  my $abs_speak_num;
  my $abs_email;
  my $abs_email_address;
  my $abs_email_post;

  my $abs_coauth;
  my @abs_coauth_name;
  my @abs_coauth_num;
  
  my $abs_affil;
  my @abs_affil_name;
  my @abs_affil_num;
  
  my $abs_text;
  
  my ($i, $j);
  my $coauth_flag;
  
  my $abs_tex;



  # Break up directory structure
  @parts = split('/',$_[0]);
  # Take file name out of @parts and remove the ".txt part"
  @parts = split('\.',$parts[scalar(@parts)-1]);
  $fname = $parts[0];
  
  # write in the whole abstract file as one string
  open(ABS, $_[0]);
  while(<ABS>) {
      $abs_file .= $_;
  }
  close(ABS);
  
  $abs_file =~ s/\n(.)/$1/g;
  $abs_file =~ s/(\n)/\n\n/;
  
  # Go through and parse the file to get the good bits
  # following the same methods as ../speakers.php

  #-----------------------------------------------------------------
  # TITLE OF TALK
  #-----------------------------------------------------------------
  @abs_foo = split('<title> ',$abs_file);
  @abs_foo = split(' </title>',$abs_foo[1]);
  $abs_title = $abs_foo[0];
  #-----------------------------------------------------------------
  # SPEAKER OF TALK, AND RELEVANT INFO
  #-----------------------------------------------------------------
  @abs_foo = split('<speaker>', $abs_file);
  @abs_foo = split('</speaker>', $abs_foo[1]);
  $abs_speak = $abs_foo[0];
  
  # get stuff out of class spaker like ...
  
  # ...name
  
  @abs_foo = split('<name> ', $abs_speak);
  @abs_foo = split(' </name>', $abs_foo[1]);
  $abs_speak_name = $abs_foo[0];
  # remove spaces from before and after names
  $abs_speak_name =~ s/[ \t]+$//;
  $abs_speak_name =~ s/^[ \t]+//;
  $abs_speak_name =~ s/[ ]/~/g;

  # ...affiliations
  
  @abs_foo = split('<affil_numbers> ', $abs_speak);
  @abs_foo = split(' </affil_numbers>', $abs_foo[1]);
  $abs_speak_num = $abs_foo[0];
  
  # ...email & email post locations
  
  @abs_foo = split('<email>', $abs_speak);
  @abs_foo = split('</email>', $abs_foo[1]);
  $abs_email = $abs_foo[0];
  
  @abs_foo = split('<address> ', $abs_email);
  @abs_foo = split(' </address>', $abs_foo[1]);
  $abs_email_address = $abs_foo[0];
  
  @abs_foo = split('<post_book> ', $abs_email);
  @abs_foo = split(' </post_book>', $abs_foo[1]);
  $abs_email_post = $abs_foo[0];
  
  #-----------------------------------------------------------------
  
  #-----------------------------------------------------------------
  # CO-AUTHORS AND RELEVANT INFO
  #-----------------------------------------------------------------
  @abs_foobar = split('<coauthor>', $abs_file);
  
  $j = 1;
  $coauth_flag = 0;
  
  while ($j < scalar(@abs_foobar)) {
      $i = $j - 1;
      @abs_foo = split('</coauthor>',$abs_foobar[$j]);
      $abs_coauth = $abs_foo[0];
      
      # get stuff out of class coauthor like ...
      
      # ...name
      
      @abs_foo = split('<name> ', $abs_coauth);
      @abs_foo = split(' </name>', $abs_foo[1]);
      $abs_coauth_name[$i] = $abs_foo[0];
      
      # ...affiliations
      
      @abs_foo = split('<affil_numbers> ', $abs_coauth);
      @abs_foo = split(' </affil_numbers>', $abs_foo[1]);
      $abs_coauth_num[$i] = $abs_foo[0];
      # remove spaces from before and after names
      $abs_coauth_name[$i] =~ s/[ \t]+$//;
      $abs_coauth_name[$i] =~ s/^[ \t]+//;
      
      $j++;
      $coauth_flag =1;
  }
  #-----------------------------------------------------------------
  
  #-----------------------------------------------------------------
  # AFFILIATIONS
  #-----------------------------------------------------------------
  
  @abs_foobar = split('<affiliation>', $abs_file);
  
  $j = 1;

  while ($j < scalar(@abs_foobar)) {
      $i = $j - 1;
      @abs_foo = split('</affiliation>',$abs_foobar[$j]);
      $abs_affil = $abs_foo[0];
      
      # get stuff out of class coauthor like ...
      
      # ...affiliation name
      
      @abs_foo = split('<name> ', $abs_affil);
      @abs_foo = split(' </name>', $abs_foo[1]);
      $abs_affil_name[$i] = $abs_foo[0];
      
      # ...affiliation number
      
      @abs_foo = split('<affil_number> ', $abs_affil);
      @abs_foo = split(' </affil_number>', $abs_foo[1]);
      $abs_affil_num[$i] = $abs_foo[0];
      
      $j++;
  }
  #-----------------------------------------------------------------
  
  #-----------------------------------------------------------------
  # TEXT OF ABSTRACT
  #-----------------------------------------------------------------

  @abs_foo = split('<text> ',$abs_file);
  @abs_foo = split(' </text>',$abs_foo[1]);
  $abs_text = $abs_foo[0];
  #-----------------------------------------------------------------

  #=================================================================
  # MAKE "tex"-looking string with all the info...
  #-----------------------------------------------------------------

  # This follows the template made by Michael Outhouse for CDOGS '04

  # First do title and speaker ...

  $abs_tex = '\begin{minipage}{\linewidth}\begin{center}' .
      '\begin{minipage}{\linewidth}' . "\n" . '  \abTitle{' .
	  $abs_title . '} \vspace{2 mm} \begin{center}' . "\n" .
	      '  \abSpeaker{'. $abs_speak_name .'}{'. $abs_speak_num . '}';

  # Now we need a loop for the coauthor ...

  $i = 0;
  while($i < scalar(@abs_coauth_name)) {
    $abs_tex .= '\abCoauthorO{'. $abs_coauth_name[$i] . '}{' .
	    $abs_coauth_num[$i] . '}';
    ++$i;
  }

  # And a loop for the affiliations
  $abs_tex .= '  \vspace{2 mm}\begin{center}'."\n";
  $i = 0;
  while($i < scalar(@abs_affil_name)) {
      $abs_tex .= '  ' . "\n" . 
	  '  $\abAffilO{' . $abs_affil_name[$i] . '}{' .
	      $abs_affil_num[$i] . '}$' . "\n\n";
	++$i;
  }
  $abs_tex .= '  \end{center}'."\n";

  # Email
  if ($abs_email_post =~ /yes/) {
      $abs_tex .= '  \vspace{2 mm}\abEmail{'. $abs_email_address .'}' .
          "\n  " . '\end{center}\end{minipage}\end{center}' . "\n";
  }

  # Do the abstract
  
  $abs_text =~ s/\n+/\n\n\\vspace\{2 mm\}\\noindent /g;
    
  $abs_tex .= '  \begin{center}\rule{0.70\linewidth}' .
      '{0.5 pt}\end{center}' . "\n" . '  \begin{minipage}{\linewidth}' .
      "\n" . '\noindent ' . $abs_text . "\n" .
      '\end{minipage}\end{minipage}' . "\n";

  # Print the tex stuff out

  open(FOUT, "> " . $sub_dir . $fname . "_abs_part.tex");
  print FOUT $abs_tex;
  close(FOUT);

  system "cat cdogs_abstract_tex_template_top " . $sub_dir .
      $fname ."_abs_part.tex " . "cdogs_abstract_tex_template_bottom" .
      '> ' . $sub_dir . $fname . ".tex";
  system "pdflatex -interaction batchmode " . $sub_dir . $fname;
  system 'rm '. $fname .'.aux';
  system 'rm '. $fname .'.log';
  system 'chgrp dosa-web '. $sub_dir . $fname.'.tex';
  system 'chgrp dosa-web '. $sub_dir . $fname .'_abs_part.tex';
  system 'chgrp dosa-web '. $fname.'.pdf';
  system 'mv '. $fname .'.pdf ' . $abs_dir;
}

#=====================================================================
#=====================================================================
#=====================================================================

#=====================================================================
# This function makes the template for the booklet in a tex file
# but it does not include the schedule (YOU GOTSTA TO DAT YERSELF) 
#---------------------------------------------------------------------

sub booklet{
  my $sub_dir = '../.submissions/';
  my $abs_dir = '../abstracts/';
  my @parts;
  my $fname;
  my $fabs;
  my $abs_file;
  my $abs_title;
  my $abs_speak;
  my @abs_foo;

  # These next few lines of code automatically takes
  # the "Lastname_Firstname_timestamp" part of the
  # file names in '../.submissions/*.txt' and
  # puts them into an array @speakers

  # list *.txt and pipe into
  # perl to strip the directory and .txt 
  # and pipe into perl to remove empty lines (not sure why 
  #           they are there but they are)
  my $cmd = 'ls ' . $sub_dir . '*.txt | ' .
      'perl -pi -e ' . "\'" . 's/(.+\/.+\/)(.+)\..+/$2/'. "\'" .
	  ' | perl -pi -e ' . "\'" . 's/^\s*\n//' . "\'";
  #print $cmd;
  my @speakers = split(/\n/,`$cmd`);

  

  open(BOOKOUT, "> booklet_abs_part.tex");  
  open(SCHEDOUT, "> booklet_sched_part.tex");  

  my $i = 0;
  while ($i < scalar(@speakers)) {
      open(BOOKIN, $sub_dir . $speakers[$i] . "_abs_part.tex");
      $abs_file = "";
      while($fname = <BOOKIN>) {
	  $abs_file .= $fname;
      }
      close(BOOKIN);
      $abs_file =~ s/(\\begin\{minipage\})//g;
      $abs_file =~ s/(\\end\{minipage\})//g;
      $abs_file =~ s/(\{\\linewidth\})(\\begin\{center\})(\{\\linewidth\})/$2/g;
      $abs_file =~ s/(  \{\\linewidth\})//g;
      print BOOKOUT $abs_file;

      open(SCHEDIN, $sub_dir . $speakers[$i]. ".txt");
      $abs_file = "";
      while($fname = <SCHEDIN>) {
	  $abs_file .= $fname;
      }

      @abs_foo = split('<speaker>', $abs_file);
      @abs_foo = split('</speaker>', $abs_foo[1]);
      $abs_speak = $abs_foo[0];
      @abs_foo = split('<name> ', $abs_speak);
      @abs_foo = split(' </name>', $abs_foo[1]);
      $abs_speak = $abs_foo[0];

      @abs_foo = split('<title> ',$abs_file);
      @abs_foo = split(' </title>',$abs_foo[1]);
      $abs_title = $abs_foo[0];

      print SCHEDOUT '\sched{' . $abs_speak . '}{' . $abs_title .'}{00:00}{page}'."\n";

      ++$i;

  }
  print SCHEDOUT '\newpage';
  close(BOOKOUT);
  close(SCHEDOUT);
  
#  system "cat cdogs_abstract_tex_template_book_top booklet_abs_part.tex cdogs_abstract_tex_template_book_bottom > ../abstracts/booklet/cdogs2008_abstracts.tex";

#  system "rm booklet_abs_part.tex";
}

#=====================================================================
# Declare Variables
#---------------------------------------------------------------------

my $sub_dir = '../.submissions/';
my $junk_file = 'scrap.txt';
my $parline; #line of file

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
# open $junk_file
#---------------------------------------------------------------------
open(FIN, $junk_file);
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# Go through $junk_file, and parse the files, creating tex files,
# pdflatex them, then remove the .aux -etc. files.
#---------------------------------------------------------------------
while ($parline = <FIN>) {
    chop($parline);
    ind_abs($parline);
}
#---------------------------------------------------------------------

#---------------------------------------------------------------------
# close $junk_file, $abs_file;
#---------------------------------------------------------------------
close(FIN);
system "rm $junk_file";
#---------------------------------------------------------------------

booklet

