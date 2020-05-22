<?php
require_once 'includes/functions.php';
//authCheck();
//$part = getPart(); 
?>
<nav>
    <a href="./">Go Back To Parts</a>
</nav>
<form action="handlesub.php" method="post">

<fieldset>
    <legend>Part Info</legend>
    <div>
    <label for="name">Name of Part:</label>
        <input type="text" name="name" id="name" 
            value="">
    </div>
    <div>
    <label for="price">Price:</label>
        <input type="text" name="price" id="price" 
            value="">
    </div>
    <div>
    <label for="rrp">RRP:</label>
        <input type="text" name="rrp" id="rrp" 
            value="">
    </div>
    <div>
    <label for="desc">Description of Part:</label>
        <input type="text" name="desc" id="desc" 
            value="">
    </div>
    <div>
        <label for="img">
            <input type="file" name="img" id="img">
        </label>
    </div>

    <div>
        <button type="submit">Log Part</button>
    </div>

</fieldset>
</form>
<?php //require_once 'includes/footer.php' ?>
