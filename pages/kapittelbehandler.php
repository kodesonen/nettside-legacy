<!doctype html><html>
<?php $core->pageHead("Behandle kapitler"); ?>

<body>
	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="kurs_info">
			<h1>Behandle kapitler</h1><br/>
			<p>Denne siden er kun for Kodesonens administratorer.</p>			
		</div>

		<div class="course_jump_break">
			<h3>Endre, slett eller legg til et kurskapittel:</h3>
		</div>

		<a href="/?side=nytt-kapittel&id=<?php echo $_GET['id']; ?>" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-plus-circle" style="padding-right: 6px;"></i> Legg til nytt kapittel</h2>
			</div>
		</a>

		<a href="#" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-arrows-alt" style="padding-right: 6px;"></i> Endre rekkefølge</h2>
			</div>
		</a>
		
		<div class="course_jump_break">
			<h3>Alle kurskapitler:</h3>
		</div>

		<?php $core->getAdminChapters(); ?>
	</div>

	<?php $core->getFooter(); ?>
</body>
</html>
