<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/15
 * Time: 17:36
 */
require_once "db.php";

$type =$_GET['type'];

if(!in_array($type,range(1,3))){
    $type = 1;
}

$list = getList($type);

?>
<html>
<title>
    ocr效果
</title>
<body>
   <table>
       <?php foreach ($list as $key => $row):?>
           <tr>
               <td><img src="<?php echo $row['filename']?>"></td>
               <td><?php echo $row['text']?></td>
           </tr>
       <?php endforeach;?>
   </table>
</body>

</html>
