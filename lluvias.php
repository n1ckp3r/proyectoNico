<?php
    function sumaPrecipitaciones(...$precip){
        $suma = 0;
        if (func_num_args()>0) {
            for ($i=0; $i > func_num_args(); $i++) { 
                $suma+=func_get_args($i);     
            } return $suma;   
        } else{
            return false;
        }
    }

    $lluvias = [];

    for ($i=0; $i < 31; $i++) {
        if (rand(1,2)==1) {
            $lluvias[]=0;
        } else {
            $lluvias[] = rand(1,100);
        }
    }
    // var_dump($lluvias);

    $suma = sumaPrecipitaciones(...$lluvias);
    echo "El total de lluvias es $suma<br>";
    echo "Y la media es ".($suma/count($lluvias));
?>