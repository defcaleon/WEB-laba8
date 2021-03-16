    <?php
        
        $age=getAgeByDate($_POST["text"]);
        days10000($_POST["text"]);

    	try{
    	
        echo $age->format('%y years %m month %d days')."<br/>";
        echo $age->format('total days: %a ')."<br/>";
        }
         catch (Exception $e) {
            echo $e->getMessage();
        }
        


    function getAgeByDate($date)
    {
        

        if($date==null){
            throw new Exception('empty text');
            return;
        }

        $currDate= new DateTime('now');
        $date= new DateTime($date);
        if($currDate<$date){
            throw new Exception('future date');
            return;
        }

        $age = date_diff($currDate,$date);
        return $age;

    }

    function days10000($date){

            $date= new DateTime($date);
            date_add($date, date_interval_create_from_date_string("10000 days"));
            echo $date->format('Y-m-d');
            echo "<br/>";
        

    }

