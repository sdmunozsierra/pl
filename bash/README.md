# Bash script for searching decoding messages in SKU.
The file fishlist.txt contains the coded message.
The file codebook.txt contains the mapping for the coded message.

## Using Bash (mostly awk) commands:
Each command is piped from each other to avoid writting to a file.

```bash
awk -F: 'BEGIN {FS=" "} {if(length($1) == 4) print $2}' fishlist.txt |
sort -n |
awk -F '-' '{if($0%2) printf ("%c\n", $2+3)}' |
awk 'FNR==NR { a[$1] = $2; next } $1 in a {print a[$1]}' codebook.txt -
```

## Using a bash script
run as `./decode.sh fishlist.txt codebook.txt`

```bash
#!/usr/bin/bash
awk -F: 'BEGIN {FS=" "} {if(length($1) == 4) print $2}' fishlist.txt |
sort -n |
awk -F '-' '{if($0%2) printf ("%c\n", $2+3)}' |
awk 'FNR==NR { a[$1] = $2; next } $1 in a {print a[$1]}' codebook.txt - |
tr '\n' ' '  > solution.txt
cat solution.txt
```

## Report
1. *they.mgiht.be.giants* is the secret code.
2. Bash script is in the previous section.
3. All the commands can be done by awk which in my opinion is a programming language of its own. grep was very painful to use because it was matching without order the solutions giving incomprehensive results. I tried parsing line by line and then using grep but did not achieve the expected results.
This can be optimized by removing the sort and using an .awk script.
