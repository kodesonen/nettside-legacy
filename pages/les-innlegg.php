<?php $core->pageHead("Kursside"); ?>
<?php $core->getHeader(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=kurskatalog">Kurskatalog</a></li>

			<li><a href="/?side=kapitler&id=<?php echo $_GET['kurs']; ?>">
				<?php $core->requestSpecificData("kurskatalog", "id", $_GET['kurs'], "navn"); ?>
			</a></li>

			<li><a href="/?side=les-innlegg&id=<?php echo $_GET['id']; ?>&kurs=<?php echo $_GET['kurs']; ?>">
				<?php $core->getChapterName(); ?>
			</a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
    <div class="kurs_info">
        <h1><?php $core->getChapterName(); ?></h1><br/>
        <p>Dato: <?php $core->getPostDate(); ?> | Skrevet av: <?php $core->getAuthor(); ?></p>           
    </div>

    <div class="course_jump_break">
		<div class="course_read_section">
			<?php $core->loadPost(); ?>

			<div class="course-navigation-info-break"></div>
			<h1>Du leste nettopp om <?php $core->getChapterName(); ?></h1><br/>
			<p>Vil du fortsette til neste seksjon eller gå tilbake til forrige?</p>
			
			<div class="course-navigation">
				<a href="#"><div class="course-navigation-select select-left">
					<i class="fas fa-long-arrow-alt-left"></i><h3> x.x - forrige innlegg navn</h3>
				</div></a>
				<a href="#"><div class="course-navigation-select select-right">
					<i class="fas fa-long-arrow-alt-right"></i><h3>x.x - neste innlegg navn</h3>
				</div></a>
				<br/>
			</div>
		</div>
	</div>
</div>

<?php $core->getFooter(); ?>
