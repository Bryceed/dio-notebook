<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<?php
    function calendar() {
        $calendar = "";
        $day = 1;
        $week_start_on_monday = false;
        $month = date("m");
        $year = date("Y");
        $daysInMonth = date("t", mktime(0, 0, 0, $month, 1, $year));
        $firstDay = date("N", mktime(0, 0, 0, $month, 1, $year));
        $lastDay = date("N", mktime(0, 0, 0, $month, $daysInMonth, $year));
        $calendar .= "<table>";
        $calendar .= "<tr><td colspan='7'>" . date("F") . "</td></tr>";
        $calendar .= "<tr>";
        $calendar .= "<th>Dom</th>";
        $calendar .= "<th>Seg</th>";
        $calendar .= "<th>Ter</th>";
        $calendar .= "<th>Qua</th>";
        $calendar .= "<th>Qui</th>";
        $calendar .= "<th>Sex</th>";
        $calendar .= "<th>Sáb</th>";
        $calendar .= "</tr>";
        $calendar .= "<tr>";

        if ($week_start_on_monday) {
            $calendar .= "<td colspan='" . ($firstDay - 1) . "'>&nbsp;</td>";
        } else {
            $calendar .= "<td colspan='$firstDay'>&nbsp;</td>";
        }

        for ($i = 1; $i <= $daysInMonth; $i++) {
            if ($week_start_on_monday) {
                $calendar .= "<td>$day</td>";
                if (($day + $firstDay - 1) % 7 == 0) {
                    $calendar .= "</tr><tr>";
                }
                $day++;
            } else {
                $calendar .= "<td>$day</td>";
                if (($day + $firstDay) % 7 == 0) {
                    $calendar .= "</tr><tr>";
                }
                $day++;
            }
        }

        if ($week_start_on_monday) {
            if ($lastDay != 7) {
                $calendar .= "<td colspan='" . (6 - $lastDay) . "'>&nbsp;</td>";
            }
        } else {
            if ($lastDay != 7) {
                $calendar .= "<td colspan='" . (7 - $lastDay) . "'>&nbsp;</td>";
            }
        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

        return $calendar;
    }
?>

<body>
    <h2>Projeto 1</h2>
    <p>Calendário de <?= date("Y"); ?></p>

    <?= calendar(); ?>
</body>

</body>
<style>
    body h2:not(:first-child) {
        margin-top: 30px;
    }
</style>
</html>