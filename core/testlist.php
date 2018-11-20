<?php
foreach ($tests as $test){
    if ($test !=='..' and $test!=='.'){
      $testname=json_decode(file_get_contents('tests/'.urlencode($test)), true);
      $name=$testname['0']['testname'];
      ?>
      <tr>
      <td valign="top">
      <?php
      echo "<a href='test.php?test=$test'> $name </a>";
         if ($_SESSION['role'] == 'administrator') {
         $deltest[$i]='tests/'.$test;
         ?>
       </td>
       <td valign="top">
        <form action="del.php" method="post">
        <input type="hidden" name="path" value="<?php echo $deltest[$i];?>" >
        <input type="submit" name="delete" value="Удалить">
        </form>
        </td>
        </tr>
         <?php
       }    
   $i++;
}
}
?>