<?php 

$_Stages = file_get_contents($jsonfilelocation);
// $json_file = json_encode($_Stages);
// echo '<pre>'.$json_file.'</pre><br><hr><br>';
$json2php = json_decode($_Stages,true);
// echo '<br><pre>'; print_r($json2php); echo '</pre><br>';
// $final = $json2php['Stages'];
// echo '<hr>';
// foreach ($json2php['Stages'] as  $x => $val) {
//   echo '<pre>'; print_r($x); echo '</pre><hr>';
//   echo '<pre>'; print_r($val); echo '</pre><hr>';
// }
// print_r($json2php['Stages']['establishment']);
// $array_values = array_values($json2php);
// print_r(array_keys($array_values[1]));
 // echo '<br>'.$final['duration_start'];
 ?>