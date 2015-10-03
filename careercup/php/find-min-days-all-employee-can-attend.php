<?php

// http://www.careercup.com/question?id=7894677

/*
 * All employees have to attend atleast 2 times.
So I keep a count of 2 for every employee initially.

Then I initialize an array (days) of 30 days maintaining a count of number of employees who can attend on a particular day.

I take the maximum of the days array. For all the employees, who can attend on that day I reduced their counts in the first array.
When the count becomes zero for any employee, I delete him from the days array.

I keeping running this loop until all employees have count <=0.


 */


function findMinDayAllEmployeesCanAttend($employeeDaysAvailable, $days = 2) {

    $employeeDaysLeft = [];
    $days = array_fill(1, 31, []);
    for ($i = 0; $i < count($employeeDaysAvailable); $i ++) {
        $employeeDaysLeft = 2;

        foreach($employeeDaysAvailable[$i] AS $day) {
            $days[$day][] = $i;
        }
    }

    arsort($days);

    $ans = [];

    foreach ($days AS $day => $employees) {

        $flag = false;
        foreach ($employeeDaysLeft AS $employee => $count) {
            if (in_array($employee, $employees)) {
                $employeeDaysLeft[$employee] --;
                $flag = true;
            }
        }
        if ($flag) $ans[] = $day;

        if (array_sum($employeeDaysLeft) == 0) {
            return $ans;
        }
    }

    return null;
}