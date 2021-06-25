<?php


class SalaryDateCalculator
{
    //Returns the date of the salary payment
    public function salary_dates_calc($month, $year) {
        $days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $date = $month."/".$days_in_month."/".$year;
        $timestamp = strtotime($date);
        $weekday = date('l', $timestamp);

        //Add the second column = salary payment dates
        if ($weekday === "Saturday") {
            $mm = ($month == 12) ? ($month - 11) : ++$month;
            $yy = ($month == 12) ? ++$year : $year;
            return strtotime($mm."/02/".$yy);
        } elseif ($weekday === "Sunday") {
            $mm = ($month == 12) ? ($month - 11) : ++$month;
            $yy = ($month == 12) ? ++$year : $year;
            return strtotime($mm."/01/".$yy);
        } else {
            return strtotime($date);
        }
    }
}