class Solution:
    # @param A : tuple of integers
    # @return a strings
    def largestNumber(self, A):
        ans = ""

        def cmpFunc(a,b):
            if str(a) + str(b) < str(b) + str(a):
                return 1
            return -1

        B = sorted(A, cmp=cmpFunc )

        while True:
            if B[0] != 0 or len(B) == 1:
                break
            if B[0] == 0:
                B.pop(0)

        return "".join([str(i) for i in B])


s = Solution()
print s.largestNumber([ 472, 663, 964, 722, 485, 852, 635, 4, 368, 676, 319, 412 ])
print 9648527226766636354854724412368319

print s.largestNumber([ 782, 240, 409, 678, 940, 502, 113, 686, 6, 825, 366, 686, 877, 357, 261, 772, 798, 29, 337, 646, 868, 974, 675, 271, 791, 124, 363, 298, 470, 991, 709, 533, 872, 780, 735, 19, 930, 895, 799, 395, 905 ]
)
print '99197494093090589587787286882579979879178278077273570968668667867566465335024704093953663633573372982927126124019124113'