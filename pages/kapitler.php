
<?php $core->pageHead("Kurs kapitler"); ?>

    <?php $core->getHeader(); ?>
	<div class="breadcrumbs">
		<div class="wrapper">
			<ul class="breadcrumb-nav">
				<li><a href="#">Kurskatalog</a></li>
				<li><a href="#">Kapittel Navn</a></li>
			</ul>
		</div>
	</div>
    <div class="wrapper">
        <div class="kurs_info">
            <h1>Kurs kapitler</h1><br/>
            <p>Disse kapitlene er tilgjengelig innenfor dette emnet. Skriv noe mer tekst her!</p>           
        </div>

        <div class="course_jump_break"></div>
        <?php $core->getChapters(); ?>
    </div>

    <?php $core->getFooter(); ?>
