<div class="container">
    <div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-3"><?=$view_bag['heading']?></h1>
    </div>
</div>


<div class="row">
    <a class="mr-auto" href="create.php">Create New Term</a>
</div>


<div class="row mt-4">
    <table class="table table-striped">
        <?php foreach ($model as $item) : ?>
            <tr>
                <td><a href="edit.php?key=<?=$item->id?>">Edit</a></td>
                <td><?=$item->term?></td>
                <td><?=$item->definition?></td>
                <td><a href="delete.php?key=<?=$item->id?>">Delete</a></td>
            </tr>       
        <?php endforeach;?>
    </table>        
</div>
</div>


