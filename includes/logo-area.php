<?php
global $post;
$eticaret = get_field('e-ticaret',$post->ID);
$hepsiburada = get_field('hepsiburada',$post->ID);
$trendyol = get_field('trendyol',$post->ID);
$n11 = get_field('n11',$post->ID);
?>
<div class="logos">
  <span class="uyari">Ürünümüzü aşağıdaki satış kanalları üzerinden satın alabilirsiniz.</span>
  <ul class="logoContainer">
    <?php if (!empty($eticaret)): ?>
      <li>
        <a target="_blank" href="<?= $eticaret  ?>">
          <img src="<?= bloginfo('url') ?>/wp-content/plugins/hide-cart-add-logos/includes/images/eticaret.png" alt="eticaret">
        </a>
      </li>
    <?php endif; ?>
    <?php if (!empty($hepsiburada)): ?>
      <li>
        <a target="_blank" href="<?= $hepsiburada  ?>">
          <img src="<?= bloginfo('url') ?>/wp-content/plugins/hide-cart-add-logos/includes/images/hepsiburada.png" alt="hepsiburada">
        </a>
      </li>
    <?php endif; ?>
    <?php if (!empty($trendyol)): ?>
      <li>
        <a target="_blank" href="<?= $trendyol  ?>">
          <img src="<?= bloginfo('url') ?>/wp-content/plugins/hide-cart-add-logos/includes/images/trendyol.png" alt="trendyol">
        </a>
      </li>
    <?php endif; ?>
    <?php if (!empty($n11)): ?>
      <li>
        <a target="_blank" href="<?= $n11  ?>">
          <img src="<?= bloginfo('url') ?>/wp-content/plugins/hide-cart-add-logos/includes/images/n11.png" alt="n11">
        </a>
      </li>
    <?php endif; ?>
  </ul>
</div>
