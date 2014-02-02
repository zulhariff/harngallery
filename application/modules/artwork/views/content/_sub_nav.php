<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/artwork') ?>" id="list"><?php echo lang('artwork_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Artwork.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/artwork/create') ?>" id="create_new"><?php echo lang('artwork_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>