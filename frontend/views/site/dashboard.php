<?php
/**
 * Created by PhpStorm.
 * User: napster
 * Date: 8/21/2015
 * Time: 1:30 PM
 */

echo "<p align='center'><b>Welcome to Dashboard </b></p>" ;

?>
<?php
use yii\bootstrap\Modal;

date_default_timezone_set('Asia/Calcutta');

$Hour = date('G');

if ( $Hour >= 5 && $Hour <= 11 ) {
    $msg="Good Morning";
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    $msg="Good Afternoon";
} else if ( $Hour >= 19 || $Hours <= 4 ) {
    $msg="Good Evening";
}
Modal::begin(['id' => 'modal',
    'header' => '<p align="center"><h2>Welcome to Aadhunick</h2></p>']);

$user= Yii::$app->user->identity->username ;
echo "<p align='center'>Hello $msg... $user</p>";

Modal::end();
?>