<?php $core->pageHead("Ny utfordring"); ?>
<?php if(!$core->isLoggedIn() || !$core->isAdmin()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="wrapper">
	<div class="medlem-form">
		<h1>Legg til ny utfordring</h1><hr/>
		
		<div class="wrapper">
			<?php if(isset($_POST['submit'])){ $core->newChallenge(); } ?>
		</div>

		<form action='' method='POST' enctype = 'multipart/form-data'>
			<label for="tittel"><b>Tittel</b></label>
			<input type="text" placeholder="Oppgi tittel" name="tittel" required>
			
			<label for="beskrivelse"><b>Beskrivelse</b></label>
			<input type="text" placeholder="Oppgi beskrivelse" name="beskrivelse" required>

			<label for="kildekode"><b>Kildekode</b></label>
			<input type="text" placeholder="Link til GitHub" name="kildekode" required>

			<label for="bilde"><b>Bilde</b></label>
			<input type="file" name="bilde" required>

			<label for="bilde"><b>Oppgave (pdf)</b></label>
			<input type="file" name="oppgave" required>
			
			<hr/><button type="submit" name="submit" class="medlem-button add_course_select">Legg til utfordring</button>
		</form>
	</div>

	<div class="sidebar-image">
		<img src="/assets/img/raw_svg/guy_with_moustache_no_hat.svg"/>
	</div>
</div>

<?php $core->getFooter(); ?>
	