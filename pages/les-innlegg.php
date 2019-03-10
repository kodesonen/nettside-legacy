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
		</div>
	</div>
</div>

<?php $core->getFooter(); ?>
