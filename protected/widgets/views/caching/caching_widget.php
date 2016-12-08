<div class="workplace">
  <div class="form">
  <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-cancel"></div>
          <h1><?php echo t('Clear Cache'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
<?php $this->render('cmswidgets.views.notification'); ?>
<a class="btn btn-mini" href="<?php echo bu();?>/becaching/clear?cache_id=backend_assets"><?php echo t('Clear CMS Assets'); ?></a>
<a class="btn btn-mini" href="<?php echo bu();?>/becaching/clear?cache_id=backend_cache"><?php echo t('Clear CMS Cache'); ?></a>
<a class="btn btn-mini" href="<?php echo bu();?>/becaching/clear?cache_id=frontend_assets"><?php echo t('Clear WebSite Assets'); ?></a>
<a class="btn btn-mini" href="<?php echo bu();?>/becaching/clear?cache_id=frontend_cache"><?php echo t('Clear WebSite Cache'); ?></a>
</div> </div> </div> </div> </div>