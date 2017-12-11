<?php
/**
 * Created by IntelliJ IDEA.
 * User: ali
 * Date: 12/11/17
 * Time: 12:07 PM
 */

function days_in_month ($month = 1, $year = 2017) {
    if($month <= 6) {
        return 31;
    }
    if($month <= 11) {
        return 30;
    }
    if($year % 4 == 0) {
        if($year % 100 != 0) {
            return 30;
        }
        if($year % 400 == 0) {
            return 30;
        }
        return 29;
    }
    return 29;
}

?>