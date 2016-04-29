<?php
namespace backend\components;
use Yii;
use yii\base\Component;
use DateTime;

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

public function calsunday($d1=NULL) {
//$d1=date("Y-m");    
$dt1 = $d1.'-'.'01';
//$a_date = "2009-11-";
$dt2=date("Y-m-t", strtotime($dt1));
//$dt2 = "2016-05-31";

$tm1 = strtotime($dt1);
$tm2 = strtotime($dt2);

$dt = Array ();
for($i=$tm1; $i<=$tm2;$i=$i+86400) {
	if(date("w",$i) == 0) {
		$dt[] = date("Y-m-d ", $i);
	}
}
return $dt;
//echo "Found ".count($dt). " Sundays...<br>";
//for($i=0;$i<count($dt);$i++) {
//	echo $dt[$i]."<br>";
//}
}


public function getSunday($startdate,$enddate) {
    $out='';
    $out[]=$startdate;
    $startweek=date("W",strtotime($startdate));
    $endweek=date("W",strtotime($enddate));
    $year=date("Y",strtotime($startdate));
    for($i=$startweek;$i<=$endweek;$i++) {
        $result= MyComponent::getWeek($i,$year);
        if($result>$startdate&&$result<$enddate) {
            $out[]=$result;
        }
    }
    $out[]=$enddate;
    return $out;
}
public function getWeek($week, $year) {
  $dto = new DateTime();
  $result = $dto->setISODate($year, $week, 0)->format('Y-m-d');
  return $result;
}
    
} 
