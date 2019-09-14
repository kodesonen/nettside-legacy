<?php $core->pageHead("Endre utfordringer"); ?>
<?php if(!$core->isLoggedIn() || !$core->isAdmin()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=endre-utfordringer">Endre utfordringer</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="kurs_info">
		<h1>Behandle utfordringer</h1><br/>
		<p>Her kan du opprette nye og endre utfordringer.</p>
	</div>

	<a href="/?side=ny-utfordring" class="add_course_select">
		<div class="course_select_info">
			<h2><i class="fas fa-plus-circle" style="padding-right: 6px;"></i> Legg til ny utfordring</h2>
		</div>
	</a>

	<div class="course_jump_break">
		<h3>Alle tilgjengelige utfordringer:</h3>
	</div>
	
	<?php $core->getAdminChallenges(); ?>
</div>

<?php $core->getFooter(); ?>
