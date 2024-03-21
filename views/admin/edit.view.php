<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-3">Edit Term</h1>
        </div>
    </div>

    <div class="row mt-4">
        <form action="" method="post">
            <input type="hidden" name="original-term" value="<?= $model->id?>">
            <div class="form-group">
                <label for="term">Term:</label>
                <input type="text" class="form-control" name="term" id="term" value="<?= $model->term?>">
            </div>
            <div class="form-group ">
                <label for="definition">Definition:</label>
                <textarea class="form-control" name="definition" id="definition"><?= $model->definition?></textarea>
            </div>
            <div class="form-group mt-2">                
                <input type="submit" name="sendTerm" value="Edit">
            </div>
        </form>
            
    </div>
</div>

