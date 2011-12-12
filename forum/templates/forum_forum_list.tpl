<div class="<?php echo $this->class; ?>"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
	<?php if ($this->headline): ?>
		<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
	<?php endif; ?>
	<?php foreach($this->forumbreadcrumbs as $breadcrumb): ?>
		<a href="<?php echo($breadcrumb['link']); ?>"><?php echo($breadcrumb['title']); ?></a> <?php if($breadcrumb['class']!='last'): ?>><?php endif; ?>
	<?php endforeach; ?>
	<table class="forums">
		<tr class="header">
			<th><?php echo($GLOBALS['TL_LANG']['forum']['forum']); ?></th>
			<th><?php echo($GLOBALS['TL_LANG']['forum']['threads']); ?></th>
			<th><?php echo($GLOBALS['TL_LANG']['forum']['last_post']); ?></th>
		</tr>
		<?php if(count($this->forums)>0): ?>
			<?php foreach($this->forums as $forum): ?>
				<tr class="forum">
					<td class="name"><a href="<?php echo($forum['redirect']); ?>"><?php echo($forum['title']); ?></a></td>
					<td class="threads"><?php echo($forum['num_threads']); ?></td>
					<td class="last_post">
						<?php if($forum['num_threads']!=0): ?>
							<span class="last_post_date"><?php echo($forum['last_post_date']); ?></span>&nbsp;
							<span class="last_post_time"><?php echo($forum['last_post_time']); ?></span><br />
							<span class="creator"><?php echo($GLOBALS['TL_LANG']['forum']['creator']); ?> <?php echo($forum['last_post_creator']); ?></span><br />
							<span class="title"><a href="<?php echo($forum['last_post_link']); ?>"><?php echo($GLOBALS['TL_LANG']['forum']['title']); ?> <?php echo($forum['last_post_title']); ?></a></span>
						<?php endif; ?>
					</td>
				</td>
			<?php endforeach; ?>
		<?php else: ?>
			<tr class="noforum"><td><?php echo($GLOBALS['TL_LANG']['forum']['no_forums']); ?><td></tr>
		<?php endif; ?>
	</table>
	<hr />
	<a href="<?php echo($this->threadcreator); ?>"><?php echo($GLOBALS['TL_LANG']['forum']['add_thread']); ?></a><br />
	<?php if($this->num_threads!=0): ?>
		<table class="threads">
			<tr class="header">
				<td><?php echo($GLOBALS['TL_LANG']['forum']['thread']); ?></td>
				<td><?php echo($GLOBALS['TL_LANG']['forum']['created_by']); ?></td>
				<td><?php echo($GLOBALS['TL_LANG']['forum']['posts']); ?></td>
				<td><?php echo($GLOBALS['TL_LANG']['forum']['last_post']); ?></td>
			</tr>
				<?php foreach($this->threads as $thread): ?>
					<tr class="thread">
						<td class="name"><a href="<?php echo($thread['redirect']); ?>"><?php echo($thread['title']); ?></a></td>
						<td class="created_by"><?php echo($thread['created_by']); ?></td>
						<td class="posts"><?php echo($thread['post_count']); ?></td>
						<td class="last_post">
							<?php echo($thread['last_post_user']); ?><br />
							<a href="<?php echo($thread['last_post_link']); ?>"><?php if($thread['last_post_title']!=''): ?><?php echo($thread['last_post_title']); ?><br /><?php endif; ?>
							<?php echo($thread['last_post_date']); ?>&nbsp;
							<?php echo($thread['last_post_time']); ?></a>
						</td>
					</tr>
				<?php endforeach; ?>
		</table>
	<?php else: ?>
		<div class="nothread"><?php echo($GLOBALS['TL_LANG']['forum']['no_threads']); ?></div>
	<?php endif; ?>
	<a href="<?php echo($this->threadcreator); ?>"><?php echo($GLOBALS['TL_LANG']['forum']['add_thread']); ?></a>
</div>