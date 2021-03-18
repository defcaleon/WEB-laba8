    <?php

        require_once('connectVars.php');
        echo "<link rel='stylesheet' href='styleCalendar.css' />";

        $date=$_POST["text"];

        $temp = new DateTime($date);
        echo "<h2>".$temp->format('Y-F')."</h2>";
        echo draw_calendar($temp->format('m'),$temp->format('y'));

       //
        //



    function draw_calendar($month,$year){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("no connect with db");

        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

        $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

        $running_day = date('w',mktime(0,0,0,$month,1,$year));
        $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
        $days_in_this_week = 1;
        $day_counter = 0;

        $calendar.= '<tr class="calendar-row">';

        for($x = 0; $x < $running_day; $x++) {
            $calendar .= '<td class="calendar-day-np"> </td>';
            $days_in_this_week++;
        }

        for($list_day = 1; $list_day <= $days_in_month; $list_day++) {
            $calendar .= '<td class="calendar-day">';
            $calendar .= '<div class="day-number">' . $list_day . '</div>';

            $dateTime = new DateTime($year . '-' . $month . '-' . $list_day);
            $query = "SELECT news FROM " . LABA5_TABLE . " WHERE date = '" . $dateTime->format('Y-m-d') . "'";
            $data = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($data)) {
                $calendar .= '<p>' . $row['news'] . '</p>';
            }
            $calendar .= str_repeat('<p> </p>', 2);

            $calendar .= '</td>';
            if ($running_day == 6) {
                $calendar .= '</tr>';
                if (($day_counter + 1) != $days_in_month) {
                    $calendar .= '<tr class="calendar-row">';
                }
                $running_day = -1;
                $days_in_this_week = 0;
            }
            $days_in_this_week++;
            $running_day++;
            $day_counter++;
        }

        if($days_in_this_week < 8) {
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++) {
                $calendar .= '<td class="calendar-day-np"> </td>';
            }
        }

        $calendar.= '</tr>';
        $calendar.= '</table>';


        mysqli_close($dbc);
        return $calendar;
    }

