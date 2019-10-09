# Bash script for searching decoding messages in SKU.
The file fishlist.txt contains the coded message.
The file codebook.txt contains the mapping for the coded message.

## Using bash commands:
After each line there is a pipe command. Each part could be saved into a .txt file if needed.
```bash
awk -F: 'BEGIN {FS=" "} {if(length($1) == 4) print $2}' fishlist.txt |
sort -n |
awk -F '-' '{if($0%2) printf ("%c\n", $2+3)}' > decode.txt
awk 'FNR==NR { a[$1] = $2; next } $1 in a {print a[$1]}' codebook.txt decode.txt
```
