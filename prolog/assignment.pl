/* Male and Female rules */
male(mason).  %parent
male(ealair).
male(madhav).
female(ayame). %parent
female(regina).
female(vera).

/* Parent structures */
parent(mason,ealair).
parent(mason,madhav).
parent(mason,regina).
parent(mason,vera).
parent(ayame,ealair).
parent(ayame,madhav).
parent(ayame,regina).
parent(ayame,vera).

/* Mother structure */
mother(X,Y) :- parent(X,Y),female(X).

/* Sister structure */
sibling(X,Y) :- parent(W,X),parent(W,Y),not(X=Y).
sister(X,Y) :- sibling(X,Y),female(X).

/* Second element of list */
second(X,[_|[X|_]]).

/* Twice */
twice([],[]).
twice([X|Y],[X,X|Z]) :- twice(Y,Z).

/* Interleave */
interleave([],[],[]).
interleave([],[H2|T2],[H2|T2]).
interleave([H1|T1],[],[H1|T1]).
interleave([H1|T1],[H2|T2],[H1,H2|TT]) :- interleave(T1,T2,TT).