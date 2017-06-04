IntArray = [1,3,5,7,9]

Result = 0
for i in range(len(IntArray)):
    Result+=IntArray[i]
print Result

Result = 0
for i in range(IntArray):
    Result+=i
print Result
