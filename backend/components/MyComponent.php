<?php
namespace backend\components;
use Yii;
use yii\base\Component;

Class MyComponent extends Component{
    
 private   function getSundays($y, $m)
{
    return new DatePeriod(
        new DateTime("first sunday of $y-$m"),
        DateInterval::createFromDateString('next sunday'),
        new DateTime("last day of $y-$m")
    );
}
public function sundays($y,$m) {
    foreach ($this->getSundays($y, $m) as $sunday) {
      $array[]=$sunday->format("l, Y-m-d\n");
    }
    return $array;
}
    
} 
