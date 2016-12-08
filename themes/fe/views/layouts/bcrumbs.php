  <div class="theme-slogan-left">
  <ul>
    <li><a href="<?php echo FRONT_SITE_URL; ?>" title="Home" <?php echo ((Yii::app()->controller->id == 'site') && (Yii::app()->controller->action->id == 'site')) ? 'class="current_page_item"' : ''; ?> ><?php echo t('Home'); ?></a></li>
    <li><span class="active"><?php echo $meta->breadcrumbs; ?></span></li>
    <div class="clr"></div>
  </ul>
  <div class="clr"></div>
</div>