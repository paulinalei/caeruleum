<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    	<?php $customFields = get_post_custom(); ?>
      <div id="post-top">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<h2 class="subhead"><?php $subhead = get_post_custom_values('db_subhead'); echo $subhead[0]; ?></h2>
		<?php the_post_thumbnail('db-rotator'); ?>
		<span class="photocredit photocredit-single"><?php the_media_credit_html(get_post_thumbnail_id($post->ID)); ?></span>
		<span class="photocaption"><?php echo get_post(get_post_thumbnail_id($post->ID))->post_excerpt; ?></span>
		
		<div class="infobar">
			<span class="infobar-day"><i class="ticon-calendar ticon-white"></i> <?php the_time('F n, Y'); ?></span>
			<span class="infobar-time"><i class="ticon-clock ticon-white"></i> <?php the_time('g:i a'); ?></span>
			<span class="infobar-categories">More stories in <?php the_category(", "); ?></span>
			<br style="clear:both" />
		</div>
       </div><!-- end div#post-top -->
		<div class="row entry-content">
			<div class="span2 post-extra">
				<ul id="post-extra-actions">
					<li><a href="#">Twitter <i class="ticon-twitter">	</a></i></li>
					<li><a href="#">Facebook <i class="ticon-facebook">	</a></i></li>
					<li class="list-space"></li>
					<li class="post-extra-unimportant"><a href="#">Print <i class="ticon-printer"></a></i></li>
					<li class="post-extra-unimportant"><a href="#">Email <i class="ticon-email"></a></i></li>
					<br style="clear:both" />
				</ul>
			</div><!-- end div.post-extra -->
			<div class="span6 post-content">
				<span class="byline">By <?php echo the_author_posts_link(); ?></span>
				<?php if(isset($customFields['db_infobox'])) : ?>
					<div class="db-infobox">
						<?php echo $customFields['db_infobox'][0]; ?>
					</div>
				<?php endif; ?>
				<?php the_content(); ?>
			</div><!-- end div.post-content -->
		</div><!-- end div.entry-content -->
      <div class="post-tags">
        <?php $tags = get_the_tags(); if ($tags) { ?><p><?php the_tags(); ?></p><?php } ?>
      </div><!-- end div.post-tags -->
      <?php comments_template(); ?>
    </article>
<?php endwhile; /* End loop */ ?>