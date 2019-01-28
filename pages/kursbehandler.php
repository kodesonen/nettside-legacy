
<?php $core->pageHead("Kursbehandler"); ?>

	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="kurs_info">
			<h1>Kursbehandler</h1><br/>
			<p>Denne siden er kun for Kodesonens administratorer.</p>
		</div>

		<div class="course_jump_break">
			<h3>Trykk på de enkelte kursene under for å behandle dem.</h3>
		</div>

		<a href="/?side=nytt-kurs" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-plus-circle" style="padding-right: 6px;"></i> Legg til nytt kurs</h2>
			</div>
		</a>
		
		<div class="course_jump_break">
			<h3>Alle tilgjengelige kurs:</h3>
		</div>
		
		<?php $core->getAdminCourses(); ?>
		
	</div>
	
	<?php $core->getFooter(); ?>

