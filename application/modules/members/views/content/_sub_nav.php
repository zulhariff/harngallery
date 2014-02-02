<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/members') ?>" id="list"><?php echo lang('members_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Members.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/members/create') ?>" id="create_new"><?php echo lang('members_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>