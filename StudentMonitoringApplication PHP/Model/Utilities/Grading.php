<?php
    function computeTotal($mark, $total){
        return $total += $mark;
    }

    function computeAverage($total, $index){
        return $total/$index;
    }

    function assignGrade($mark){
        if($mark >= 80 && $mark <= 100){
            return 1;
        }
        if($mark >= 75 && $mark <= 79){
            return 2;
        }
        if($mark >= 70 && $mark <= 74){
            return 3;
        }
        if($mark >= 65 && $mark <= 69){
            return 4;
        }
        if($mark >= 60 && $mark <= 64){
            return 5;
        }
        if($mark >= 55 && $mark <= 59){
            return 6;
        }
        if($mark >= 50 && $mark <= 54){
            return 7;
        }
        if($mark >= 45 && $mark <= 49){
            return 8;
        }
        if($mark >= 0 && $mark <= 44){
            return 9;
        }
    }
?>
