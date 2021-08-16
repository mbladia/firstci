<?= $this->extend('layouts/main') ?>

    <?= $this->section('content') ?>
    <h1>Our Blog</h1>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <form method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="post_title" value="<?= $post['post_title'] ?>">
                </div>
                <div class="form-group">
                    <label for="">text</label>
                    <input type="text" class="form-control" name="post_content" value="<?= $post['post_content'] ?>">
                </div>
                <div class="form-group">
                   <input type="submit" value="Update" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
    
<?= $this->endSection() ?>