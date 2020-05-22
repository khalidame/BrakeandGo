<!DOCTYPE html>
<?php
require_once 'includes/functions.php';
$parts = getParts();
$parts_total = getPartsTotal() ;
$active = getParts();
$itemsInPage = getParts();
?>

<body>
  <?php require_once 'includes/header.php' ?>
        
<div class="container products content-wrapper">
             
    <h1>Parts</h1>
    <!-- <p><?=$parts_total?> Part(s)</p> -->
    <div class="products-wrapper">
        <?php foreach ($parts as $part): ?>
        <a href="part.php?page=product&id=<?=$part['id']?>" class="product">
            <img src="imgs/<?=$part['img']?>" width="200" height="200" alt="<?=$part['name']?>">
            <span class="name"><?=$part['name']?></span>
            <span class="price">
                &dollar;<?=$part['price']?>
                <?php if ($part['rrp'] > 0): ?>
                <span class="rrp discount_price">&dollar;<?=$part['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <?=template_footer()?>
    <div class="buttons">
        <?php if ($active > 1): ?>
        <a href="products.php?search=<?=$search?>&p=<?=$active-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($parts_total > ($active * $itemsInPage) - $itemsInPage + count($parts)): ?>
        <a href="products.php?search=<?=$search?>&p=<?=$active+1?>">Next</a>
        <?php endif; ?>
    </div>

</div>


</body>
</html>


