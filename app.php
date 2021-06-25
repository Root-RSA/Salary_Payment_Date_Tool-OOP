<?php

require_once "autoload.php";

$salary_date_calculator = new SalaryDateCalculator();
$bonus_date_calculator = new BonusDateCalculator();
$date_array_creator = new DatesArrayCreator();

$dates = $date_array_creator
            ->find_current_mm_yy()
            ->create_dates_array($salary_date_calculator, $bonus_date_calculator);

(new CsvWriter())->write_to_csv($dates);




