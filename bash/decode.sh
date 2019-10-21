#!/usr/bin/bash
fishlist=$1;  # First argument
codebook=$2;  # Second argument

awk -F: 'BEGIN {FS=" "} {if(length($1) == 4) print $2|"sort -n"}' $fishlist |
awk -F '-' '{if($0%2) printf ("%c\n", $2+3)}' |
awk 'FNR==NR { a[$1] = $2; next } $1 in a {print a[$1]}' $codebook - |
tr -d '\n' > solution.txt
cat solution.txt
