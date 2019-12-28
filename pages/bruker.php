<?php $core->pageHead("Kursside"); ?>
<?php $core->getHeader(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=kurskatalog">Kurskatalog</a></li>

			<li><a href="/?side=om-oss">forfatter</a></li>

			<li><?php $core->requestSpecificData("medlemmer", "id", $_GET ['id'], "navn"); ?></li>
		</ul>
	</div>
</div>

<div class="wrapper">
    <div class="kurs_info">
		<h1>Innhold skrevet av <?php $core->requestSpecificData("medlemmer", "id", $_GET ['id'], "navn"); ?></h1>
		<?php $core->listAuthorStats(); ?>
    </div>

    <div class="course_jump_break">
		<div class="course_read_section">
			
			<?php $core->listAuthorPosts(); ?>

		</div>
	</div>
</div>

<?php $core->getFooter(); ?>
