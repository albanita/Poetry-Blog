<!--poems list-->
<div class="card-columns align-items-center">
    <?php while ($poem = $poems->fetch_object()): ?>
        <!--poem card-->
        <div class="card mb-3 poemCardBorderStyle" style="max-width: 540px; height: 284px;">
            <a href="<?=base_url?>poem/show&id=<?=$poem->id?>">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-muted"><?=$poem->titlu?></h5>
                            <p class="card-text text-muted">
                                <?= substr($poem->continut, 0,120).'...' ?>
                            </p>
                            <p class="card-text text-muted small">
                                <?php 
                                // date formating
                                $data = new DateTime($poem->dataAdaugare);
                                ?>
                                <?=$data -> format('d-m-Y')?> | <?= $gbd::getBookName($poem) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!--end poem card-->
    <?php endwhile; ?>
</div>

<!--pagination-->
<nav aria-label="Pagination" class="mb-5">
    <ul class="pagination pagination-sm justify-content-center">
        <!--<li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>-->
        <?php $pagination->render(); ?>
    </ul>
    
</nav>
<!--end pagination-->