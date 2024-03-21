<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-3">Delete Term</h1>
        </div>
    </div>

    <div class="row">
        Are you sure you want to  delete <?=$model->term ?>
    </div>

    <div class="row mt-4">
        <form action="" method="post">
            <input type="hidden" name="term" value="<?= $model->id?>">
            
            <div class="form-group">                
                <input type="submit" name="sendTerm" value="Delete">
            </div>
        </form>
            
    </div>
</div>

