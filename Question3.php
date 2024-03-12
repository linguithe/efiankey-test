<?php

function parseDate($date) {
    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return false;
    }
    return new DateTime("@$timestamp");
}

function daysBetweenDates($date1, $date2) {
    $date1 = parseDate($date1);
    $date2 = parseDate($date2);

    if ($date1 === false || $date2 === false) {
        return "Invalid date format!";
    }

    $diff = $date1->diff($date2);
    $days = $diff->days;
    $oddOrEven = $days % 2 == 0 ? "Even" : "Odd";

    return "Days between: $days ($oddOrEven number).";
}

// Testing
echo daysBetweenDates("2022-03-01", "2022-03-10") . "\n";
echo daysBetweenDates("03/01/2022", "03/10/2022") . "\n";
echo daysBetweenDates("01-03-2022", "10-03-2022") . "\n";
echo daysBetweenDates("1st March 2022", "10th March 2022") . "\n";
echo daysBetweenDates("March 1, 2022", "March 10, 2022") . "\n";
echo daysBetweenDates("Invalid date", "2022-03-10") . "\n";

?>