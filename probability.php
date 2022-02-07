<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function get_rand($proArr)
    {
        $result = '';
        //機率數組的總機率精度 
        $proSum = array_sum($proArr);
        //機率數組循環 
        foreach ($proArr as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset($proArr);
        return $result;
    }

    /*
    * 獎項數組
    * 是一個二維數組，記錄了所有本次抽獎的獎項信息，
    * 其中id表示中獎等級，prize表示獎品，v表示中獎機率。
    * 注意其中的v必須為整數，你可以將對應的 獎項的v設置成0，即意味著該獎項抽中的幾率是0，
    * 數組中v的總和（基數），基數越大越能體現機率的準確性。
    * 本例中v的總和為100，那麼平板電腦對應的 中獎機率就是1%，
    * 如果v的總和是10000，那中獎機率就是萬分之一了。
    * 
    */
    $prize_arr = array(
        '0' => array('id' => 1, 'prize' => '平板電腦', 'v' => 0),
        '1' => array('id' => 2, 'prize' => '數位相機', 'v' => 20),
        '2' => array('id' => 3, 'prize' => '音箱設備', 'v' => 20),
        '3' => array('id' => 4, 'prize' => '4G優盤', 'v' => 20),
        '4' => array('id' => 5, 'prize' => '10Q幣', 'v' => 20),
        '5' => array('id' => 6, 'prize' => '下次沒準就能中哦', 'v' => 100),
    );

    foreach ($prize_arr as $key => $val) { 
        $arr[$val['id']] = $val['v']; 
       } 
       $rid = get_rand($arr); //根據機率獲取獎項id
       if($rid != 0)
       {
            
       }
       $res['yes'] = $prize_arr[$rid-1]['prize']; //中獎項 
       $res['no'] =  '機率: '.$prize_arr[$rid-1]['v'] .' %';

       echo "禮物集合內有<br>";
       echo ' - 其中 id 表示中獎等級，<br> - prize 表示獎品，<br> - v 表示中獎機率。<br>';
       echo "<pre>";
       print_r($prize_arr);
       echo "</pre>";
       echo '<hr>';

       echo '本次抽到';
       print_r($res);
       
    ?>
</body>

</html>