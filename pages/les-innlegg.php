<?php $core->pageHead("Kursside"); ?>
<?php $core->getHeader(); ?>
<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=kurskatalog">Kurskatalog</a></li>
			<li><a href="#"><?php  ?></a></li>
			<li><a href="#">Innlegg Navn</a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
    <div class="kurs_info">
        <h1><?php $core->getChapterName(); ?></h1><br/>
        <p>Dato: 01.01.2019 | Skrevet av: Navn Navnesen</p>           
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
