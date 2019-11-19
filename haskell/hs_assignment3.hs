-- Compute the volume of a sphere, given its radius.
computeVolume :: Float -> Float
computeVolume x = (4/3) * pi * (x)^3


-- Recursive raise to power.
recursivePower:: Int -> Int -> Int
recursivePower x 0 = 1
recursivePower x p = x * recursivePower x (p-1)

-- Find the max number in a list (including negative).
mymax a b
  | a > b = a
  | b > a = b
  | otherwise = a
maxlist [] = 0
maxlist [x] = x
maxlist (head:tail) = mymax head (maxlist tail)

-- Weighted sum using zipWidth
wsum :: Num a => [a] -> [a] -> [a]
wsum [][] = []
wsum xs xy = zipWith (+) (map (*2) xs) xy

-- List of factors for an integer 1000 > m > 0
factors :: Int -> [Int]
factors m
  | m < 1 || m > 999 = error "Parameter should be 1000 > m > 0"
  | otherwise = [x | x <- [1..999], x `mod` m == 0]

-- Produce the sum of two factor lists
sumFactors:: Int -> Int -> Int
sumFactors x y = sum (factors x) + sum (factors y)

-- Substring Detect
prefix [] anything = True
prefix (x:xs) (y:ys) = x == y && prefix xs ys

exitstsAtFirst [] anything = True
exitstsAtFirst anything [] = False
exitstsAtFirst (x:xs) (y:ys)
  | x == y = prefix xs ys
  | otherwise = exitstsAtFirst (x:xs) ys

-- Interleaved Substring Detect
expandsTo [] anything = True
expandsTo anything [] = False


-- Extra stuff
m5 :: [Int]->Int->Int->Int
m5 [] y z = z
m5 (x:xs) y z | x == y = m5 xs y (z+1) | otherwise = m5 xs y z
m52 :: [Int]->Int->Int
m52 xs x = m5 xs x 0

splitAt' = \xs-> \n -> (take n xs, drop n xs)
