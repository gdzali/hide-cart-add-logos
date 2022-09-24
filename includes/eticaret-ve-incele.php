<?php
global $post;
$eticaret = get_field('e-ticaret',$post->ID);
$hepsiburada = get_field('hepsiburada',$post->ID);
$trendyol = get_field('trendyol',$post->ID);
$n11 = get_field('n11',$post->ID);
?>
<div class="logos-archive">
  <a href="<?= the_permalink(); ?>">İncele</a>
  <?php if (!empty($eticaret)): ?>
      <a target="_blank" href="<?= $eticaret ?>">Sipariş Ver</a>
  <?php endif; ?>
</div>
