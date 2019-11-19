m1 0 = 0
m1 radius = (4/3)*pi*(radius)^3

m2 number 0 = 1
m2 number power = number * m2 number (power-1)

m3 [] = error "empty list, no largest element"
m3 [e] = e
m3 (x:xs) = max x (m3 xs)

wsum [][] = []
wsum xs xy = zipWith (+) (map(*2) xs) xy

m5 :: [Int]->Int->Int->Int
m5 [] y z = z
m5 (x:xs) y z | x == y = m5 xs y (z+1) | otherwise = m5 xs y z
m52 :: [Int]->Int->Int
m52 xs x = m5 xs x 0

splitAt' = \xs-> \n -> (take n xs, drop n xs)

mult3 = [3*x | x<-[1..333]]
mult5 = [5*x | x<-[1..199]]
values = [x|x<-mult3, elem x mult5]
multiples = (mult3++mult5) ++ (map((-1)*)values)
sumvals = sum multiples

mystery0 [] = 0
mystery0 (a:x) = 1 + mystery0 x

mystery1 xs = [y|x <-xs,y<-[x,x]]

mystery2 f[] = []
mystery2 f(a:x) = f a : mystery2 f x

mystery3 item [] = []
mystery3 item (x:y) | item == x = mystery3 item y | otherwise = x : mystery3 item y

double = (*) 2
dottwice f x = f (f x)
mystery4 = dottwice double

mystery5 [][] = []
mystery5 list1 list2 = list1 ++ list2
