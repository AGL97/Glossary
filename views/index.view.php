<div class="container">
    <div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-3"><?=$view_bag['heading']?></h1>
    </div>
</div>


<div class="row">
    <form class="form-inline ml-auto" action="index.php" method="get">
        <div class="form-group">
            <input type="text" name="search" id="search">
            <button type="submit">
                <span>Search</span>
            </button>
        </div>
    </form>
</div>

<div class="row mt-4">
    <table class="table table-striped">
        <?php foreach ($model as $item) : ?>
            <tr>
                <td><a href="detail.php?term=<?=$item->id?>"><?=$item->term?></a></td>
                <td><?=$item->definition?></td>
            </tr>       
        <?php endforeach;?>
    </table>        
</div>
</div>


