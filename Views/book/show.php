<!--title and photo-->
<p class="poemTitle"><?= $bookName ?></p>
<div class="d-flex justify-content-center">
    <?php if ($bookName != null || $bookName != ''): ?>
        <img src="<?= image_root . $bookName . ".jpg" ?>" class="rounded mb-2" style="width: 25%;" alt="Poza carte">
    <?php endif; ?>
</div>
<!--end title and photo-->

<!--poems list-->
<div class="card-columns align-items-center mb-5">
    <?php while ($poem = $poems->fetch_object()): ?>
        <!--poem card-->
        <div class="card mb-3 poemCardBorderStyle" style="max-width: 540px; height: 284px;">
            <a href="<?= base_url ?>poem/show&id=<?= $poem->id ?>">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-muted"><?= $poem->titlu ?></h5>
                            <p class="card-text text-muted">
                                <?= substr($poem->continut, 0, 120) . '...' ?>
                            </p>
                            <p class="card-text text-muted small">
                                <?= $poem->dataAdaugare ?> | <?= $gbd::getBookName($poem) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!--end poem card-->
    <?php endwhile; ?>
</div>
<!--end poems list-->