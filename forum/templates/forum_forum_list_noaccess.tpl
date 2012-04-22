<div class="<?php echo $this->class; ?>"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
	<?php if ($this->headline): ?>
		<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
	<?php endif; ?>
	<?php foreach($this->forumbreadcrumbs as $breadcrumb): ?>
		<a href="<?php echo($breadcrumb['link']); ?>"><?php echo($breadcrumb['title']); ?></a> <?php if($breadcrumb['class']!='last'): ?>><?php endif; ?>
	<?php endforeach; ?>
	<div id="noaccess"><?php echo($GLOBALS['TL_LANG']['forum']['err_forum_noaccess']); ?></div>
</div>