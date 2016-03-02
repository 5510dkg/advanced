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

public function calsunday() {
$d1=date("Y-m");    
$dt1 = $d1.'-'.'01';
//$a_date = "2009-11-";
$dt2=date("Y-m-t", strtotime($dt1));
//$dt2 = "2016-05-31";

$tm1 = strtotime($dt1);
$tm2 = strtotime($dt2);

$dt = Array ();
for($i=$tm1; $i<=$tm2;$i=$i+86400) {
	if(date("w",$i) == 0) {
		$dt[] = date("l Y-m-d ", $i);
	}
}
return $dt;
//echo "Found ".count($dt). " Sundays...<br>";
//for($i=0;$i<count($dt);$i++) {
//	echo $dt[$i]."<br>";
//}
}
    
} 
