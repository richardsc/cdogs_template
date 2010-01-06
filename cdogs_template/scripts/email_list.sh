grep '@' ../.submissions/*.txt | awk '{print $3", "}' > emails.txt
perl -pi -e 's/\n//' emails.txt
perl -pi -e 's/(.+),/$1/' emails.txt
