<?php

include('model.php');

$model = new Model();

$rows = $model->fetch();



?>

<table class="table">
    <thead>
        <tr>

        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>ACTION</th>

        </tr>
    </thead>
<tbody>
    <?php

        $i = 1;
        if (!empty($rows)){
            foreach($rows as $row){  ?>

        <tr>

        <td><?php echo $i++; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>

        <td>    
            <button href="" id="read" class="bg bg-info" value="<?php echo $row['id'];?>"data-bs-toggle="modal" data-bs-target="#exampleModal"><b>READ</b></button>
            <button href="" id="del" class="bg bg-danger" value="<?php echo $row['id'];?>"><b>DELETE</b></button>
            <button href="" id="edit" class="bg bg-warning" value="<?php echo $row['id'];?>"data-bs-toggle="modal" data-bs-target="#exampleModall"><b>EDIT</b></button>
        </td>
        

        </tr>

         <?php   
         }
        }else{
            echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                          NO DATA
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
        }



 ?>
</tbody>
</table>