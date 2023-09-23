<?php


class StepBar
{
    /*
     * Показывает верхнюю строку шагов
     */
    static public function showBar ($num) {

        $bb = '<div class="wrap step"><p align="center">';

        for ($i=1; $i<=5; $i++) {
            $pp = '_b';
            $class="not_active";
            if ($i == $num) {
                $pp = '';
                $class="active";
            }
            $bb .= '<img src="'.Y::bu().'images/front/order/'.$i.$pp.'.png" class="step '.$class.'"> ';
        }

        $bb .= '</p></div>';

        return $bb;

    }

}


?>
