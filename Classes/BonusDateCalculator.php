<?php


class BonusDateCalculator
{
    //Returns the date of bonus payment
    function bonus_dates_calc($month, $year) {
        $date = $month."/15/".$year;
        $timestamp = strtotime($date);
        $weekday = date('l', $timestamp);

        if ($weekday === "Saturday") {
            return strtotime($month."/19/".$year);
        } elseif ($weekday === "Sunday") {
            return strtotime($month."/18/".$year);
        } else {
            return strtotime($date);
        }
    }
}