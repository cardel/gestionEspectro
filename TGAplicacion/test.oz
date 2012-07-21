declare

%A = rec(1 2 3 4)

%B = {FoldL {Record.toList A} fun{$ X Y} X+Y end 0}

A = rec(2 3 4 23 1 4 23 2 312 3 3 534 534 523 4523 42)
D= {Record.toListInd A}

H ={List.sort D fun{$ X Y} if X.2<Y.2 then false else true end end}

{Browse H}