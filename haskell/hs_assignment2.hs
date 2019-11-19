-- Counts number of elements in a list of numeric values.
mystery0 :: [a] -> Int
mystery0 [] = 0
mystery0 (_:x) = 1 + mystery0 x

-- Duplicates each element in a list of numeric values.
mystery1 :: [a] -> [a]
mystery1 xs = [y|x <- xs, y <- [x,x]]

-- Takes a function and applies it to each element in the list.
mystery2 f [] = []
mystery2 f (a:x) = f a : mystery2 f x

-- Removes an item from a list if found.
mystery3 item [] = []
mystery3 item (x:y) | item==x = mystery3 item y
                    | otherwise = x : mystery3 item y

-- Multiplies x number by 2 two times.
mysteryd = (*) 2
mysteryr f x = f (f x)
mystery4 = mysteryr mysteryd

-- Appends two lists
append :: [a] -> [a] -> [a]
append [] ys = ys
append (x:xs) ys = x:append xs ys
