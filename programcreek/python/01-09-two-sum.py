def twoSum(nums, target):
    for i in range(len(nums) - 1):
        for j in range(i + 1, len(nums)):
            if nums[i] + nums[j] == target:
                return [i, j]
    return None




def twoSumWithHash(nums, target):
    table = {}
    for i in range(len(nums)):
        reminder = target - nums[i]
        if nums[i] in table:
            return [table[nums[i]], i]
        else:
            table[reminder] = i
    return None



def twoSumWithSortedInput(nums, target):
    start = 0
    end = len(nums) - 1
    while start < end:
        sum = nums[start] + nums[end]
        if sum == target:
            return [start, end]
        if sum > target:
            end -= 1
        else:
            start += 1
    return None





class TwoSumData :
    table = None

    def __init__(self):
        self.table = dict()

    def add(self, i):
        if i not in self.table:
            self.table[i] = 0
        self.table[i] += 1

    def find(self, target):
        for i in self.table:
            reminder = target - i
            if reminder in self.table:
                if i == reminder and self.table[i] < 2:
                    continue
                return True
        return False




print twoSum([2,7,11,15], 18)

print twoSumWithHash([2,7,11,15], 18)

print twoSumWithSortedInput([2,7,11,15,16,19,23,33], 30)


c = TwoSumData()
c.add(1);
c.add(3);
c.add(7);
print c.find(4)
print c.find(7)
print c.find(6)