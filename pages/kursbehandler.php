<!doctype html><html>
<?php $core->pageHead("Kursbehandler"); ?>

<body>
	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="kurs_info">
			<h1>Kursbehandler</h1><br/>
			<p>Denne siden er kun for Kodesonens administratorer.</p>			
		</div>

		<div class="course_jump_break">
			<h3>Alle tilgjengelige kurser:</h3>
		</div>

		<a href="/?side=nytt-kurs" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-plus-circle" style="padding-right: 6px;"></i> Legg til nytt kurs</h2>
			</div>
		</a>

		<a href="/?side=kurskatalog" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-list-ul" style="padding-right: 6px;"></i> Endre kurskatalog</h2>
			</div>
		</a>

		<?php $core->getAdminCourses(); ?>
	</div>
	
	<?php $core->getFooter(); ?>
</body>
</html>
