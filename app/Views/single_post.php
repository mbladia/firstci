<?= $this->extend('layouts/main') ?>

    <?= $this->section('content') ?>
    <h1><?= $title ?></h1>
    <a href="/blog/delete/<?= (isset($post) ? $post['post_id'] : '1') ?>" class="btn btn-danger">Delete</a>
    <a href="/blog/edit/<?= (isset($post) ? $post['post_id'] : '1') ?>" class="btn btn-primary">Edit</a>
    
<?= $this->endSection() ?>