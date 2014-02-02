<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/members') ?>" id="list"><?php echo lang('members_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Members.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/members/create') ?>" id="create_new"><?php echo lang('members_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>