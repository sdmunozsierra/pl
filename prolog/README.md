# Prolog Assignment

## Instructions
Do all 5 for an A:

* [ ] Using the structures parent(X,Y), male(X), and female(X), write a structure that defines mother(X,Y).

* [ ] Using the structures parent(X,Y), male(X), and female(X), write a structure that defines sister(X,Y).
* [ ] Write a predicate second(X,List) that checks wether X is the second element of List.
* [ ] Write a predicate twice(n,Out) whose left argument is a list, and whose right argument is a list consisting of every element in the list written twice.

```
twice([a,4,buggle], X).
X=([a,a,4,4,buggle,buggle]).

twice(W,[b,b,a,a]).
W=[b,a].
```

* [ ] Write 3-parameter predicate interleave which takes three lists as arguments and combines the elements of the first two into the third as follows:

```
?-interleave([a,b,c],[d,e,f],X).
X=[a,d,b,e,c,f]
```

## Results
For each, hand in a print-out showing your definition and results with enough test cases to demonstrate the correct behavior.
