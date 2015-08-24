


def fourSum(nums, target) :

    nums.sort()

    hashSet = dict()
    result = list()

    for i in range(0, len(nums), 1):
        for j in range(i + 1, len(nums), 1):
            k = j + 1
            l = len(nums) - 1

            # print "%d %d %d %d" % (i, j, k, l)
            while k < l:
                total = nums[i] + nums[j] + nums[k] + nums[l]


                if total > target:
                    l -= 1
                elif total < target:
                    k += 1
                elif total == target:
                    temp = [nums[i], nums[j], nums[k], nums[l]]
                    tempKey = '|'.join([ str(x) for x in temp ])

                    if tempKey not in hashSet:
                        hashSet[tempKey] = 1
                        result.append(temp)
                    k += 1
                    l -= 1



    return result



print fourSum([1, 0, -1, 0, -2, 2], 0)