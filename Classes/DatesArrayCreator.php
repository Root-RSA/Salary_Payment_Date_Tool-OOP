<?php


class DatesArrayCreator
{
    public $current_year;
    public $current_month;

    public function find_current_mm_yy()
    {
        //Find current year
        $this->current_year =  date('Y');
        //Find current month
        $this->current_month = date('n');
        return $this;
    }

    public function create_dates_array(SalaryDateCalculator $salary_dates_calculator, BonusDateCalculator $bonus_dates_calculator)
    {
        //Create headers of the table for cvs
        $dates[0] = array("Months", "Salary payment date", "Bonus payment date");

        //Add to an array date for each month consecutively
        for ($month = $this->current_month; $month < 13; $month++) {
            //Correct the array numbering
            $i = ($month - $this->current_month + 1);
            //Add the first column = the months
            $dates[$i][] = date('F', strtotime($month."/01/".$this->current_year));
            //Add the second column = the salary payment dates
            $dates[$i][] = date("d F Y", $salary_dates_calculator->salary_dates_calc($month, $this->current_year));
            //Add the third column = the bonus payment dates
            $dates[$i][] = date("d F Y", $bonus_dates_calculator->bonus_dates_calc($month, $this->current_year));
        }

        return $dates;
    }
}