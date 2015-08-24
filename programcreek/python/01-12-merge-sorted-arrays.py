def mergeArrays(A, B):

    aLen = len(A)
    bLen = len(B)

    for i in range(bLen):
        A.append(0)

    while aLen > 0 and bLen > 0:

        if A[aLen - 1] > B[bLen - 1]:
            A[aLen + bLen - 1] = A[aLen - 1]
            aLen -= 1
        else :
            A[aLen + bLen - 1] = B[bLen - 1]
            bLen -= 1

        print A, B

    while bLen > 0:
        A[aLen + bLen - 1] = B[bLen - 1]
        bLen -= 1

    return A





print mergeArrays([2,3,4], [4,5,6,7,8] )