<?php

use Source\Models\Model;

$model = new Model();

$rows = $model->fetch();

$i = 1;

if(!empty($rows)) {
    foreach($rows as $row) { 
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
<?php
    }
}

?>