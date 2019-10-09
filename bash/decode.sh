#!/usr/bin/bash
awk -F: 'BEGIN {FS=" "} {if(length($1) == 4) print $2}' fishlist.txt |
sort -n |
awk -F '-' '{if($0%2) printf ("%c\n", $2+3)}' |
awk 'FNR==NR { a[$1] = $2; next } $1 in a {print a[$1]}' codebook.txt - |
tr '\n' ' '  > solution.txt
cat solution.txt
