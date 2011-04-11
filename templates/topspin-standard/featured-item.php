<?php
/*
 *	WARNING: DO NOT EDIT THIS FILE!
 *
 *	To edit the PHP, copy this file to your
 *	active theme's directory and edit from that
 *	new file.
 *
 *	Example: /wp-content/themes/<current-theme>/topspin-standard/featured-item.php
 *
 */
 ?>

<div class="topspin-featured-item">
    <div class="topspin-item-image"><img src="<?=$featureditem['default_image'];?>" /></div>
    <h2 class="topspin-item-title"><?=$featureditem['name'];?></h2>
    <div class="topspin-item-desc"><?=$featureditem['description'];?></div>
    <div class="topspin-item-price">Price: <?=$featureditem['symbol'];?><?=$featureditem['price'];?></div>
    <div class="topspin-item-buy"><a class="topspin-buy" href="<?=$featureditem['offer_url'];?>">Buy</a></div>
</div>