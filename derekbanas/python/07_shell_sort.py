
def shell_sort(inputs):

    increment = len(inputs) // 2
    while increment > 0 :
        for i in range(increment, len(inputs)) :

            tmp = inputs[i]

            # for loop version, more clear
            to_insert_index = i
            for j in range(i, increment - 1, - increment):
                if inputs[j - increment] > tmp:
                    print j
                    inputs[j] = inputs[j - increment]
                    to_insert_index = j - increment
                else :
                    break

            inputs[to_insert_index] = tmp

            # while loop version. shorter
            # j = i
            # while j >= increment and inputs[j - increment] > tmp:
            #     print j
            #     inputs[j] = inputs[j - increment]
            #     j -= increment
            # inputs[j] = tmp

        if increment == 2:
            increment = 1
        else :
            increment = int( increment * 5./11. )




if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    shell_sort(inputs)
    print inputs