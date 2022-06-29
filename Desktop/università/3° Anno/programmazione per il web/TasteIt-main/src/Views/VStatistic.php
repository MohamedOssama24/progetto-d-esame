<?php

namespace App\Views;

class VStatistic{
    public function visualizeStatistics($revenues, $numorders, $data, $best, $worst)
    {
        return view("admin/statistics", [
            "revenues"=>$revenues,
            "numorders"=>$numorders,
            "data"=>$data,
            "best"=>$best,
            "worst"=>$worst
        ]);
    }


}