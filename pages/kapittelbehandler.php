<?php $core->pageHead("Behandle kapitler"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="wrapper">
	<div class="kurs_info">
		<h1>Behandle kapitler</h1><br/>
		<p>Denne siden er kun for Kodesonens administratorer.</p>			
	</div>

	<div class="course_jump_break">
		<h3>Trykk på de enkelte kapitlene under for å behandle dem.</h3>
	</div>

	<a href="/?side=nytt-kapittel&id=<?php echo $_GET['id']; ?>" class="add_course_select">
		<div class="course_select_info">
			<h2><i class="fas fa-plus-circle" style="padding-right: 6px;"></i> Legg til nytt kapittel</h2>
		</div>
	</a>

	<a href="/?side=endre-kurs&id=<?php echo $_GET['id']; ?>" class="add_course_select">
		<div class="course_select_info">
			<h2><i class="fas fa-edit" style="padding-right: 6px;"></i> Endre kurs</h2>
		</div>
	</a>
		
	<div class="course_jump_break">
		<h3>Alle kurskapitler:</h3>
	</div>

	<?php $core->getAdminChapters(); ?>
		
</div>

<?php $core->getFooter(); ?>
