import sys

def threeSumClosest(nums, target) :
    nums.sort()
    minValue = sys.maxint
    result = 0


    for i in range(len(nums)):
        j = i + 1
        k = len(nums) - 1

        while j < k:

            total = nums[i] + nums[j] + nums[k]
            diff = abs(target - total)

            if diff == 0:
                return total

            if diff < minValue:
                minValue = diff
                result = total

            if total < target:
                j += 1
            else :
                k -= 1

    return result



print threeSumClosest([-1, 2, 1, -4], 1);