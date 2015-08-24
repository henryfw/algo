
def threeSum(nums) :
    result = []
    if len(nums) < 3:
        return result

    nums.sort()

    for i in range(0, len(nums) - 2) :

        if i == 0 or nums[i] > nums[i - 1]:

            negate = - nums[i]

            start = i
            end = len(nums) - 1

            while start < end:

                if nums[start] + nums[end] == negate:
                    result.append([nums[i], nums[start], nums[end]])

                    start += 1
                    end -= 1

                    while nums[start] == nums[start - 1]:
                        start += 1

                    while nums[end] == nums[end + 1]:
                        end -= 1



                elif nums[start] + nums[end] > negate:
                    end -= 1
                else:
                    start += 1

    return result

print threeSum([-1, 0, 1, 2, -1, -4])