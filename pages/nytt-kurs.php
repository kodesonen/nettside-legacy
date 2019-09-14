
<?php $core->pageHead("Nytt kurs"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=kursbehandler">Kursbehandler</a></li>
			
			<li><a href="#">...</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="medlem-form">
		<h1>Legg til nytt kurs</h1><hr/>
		<div class="wrapper">
			<?php if(isset($_POST['submit'])){ $core->newCourse(); } ?>
		</div>

		<form action='' method='POST'>
			<label for="navn"><b>Kursnavn</b></label>
			<input type="text" placeholder="Oppgi kurs navnet" name="navn" required>
				
			<label for="beskrivelse"><b>Beskrivelse</b></label>
			<input type="text" placeholder="Oppgi kurs beskrivelse" name="beskrivelse" required>

			<label for="ikon"><b>Kursikon</b></label>
			<input type="text" placeholder='Oppgi kurs ikonet, f.eks. "fas ta-toolbox"' name="ikon" required>
			<strong>OBS!</strong> Hent ikoner fra <a href="https://fontawesome.com" target="_blank" class="hyperlink">Font Awesome</a> og skriv hele ikon navnet. For eksempel: <strong>fas fa-toolbox</strong>.
				
			<hr/><button type="submit" name="submit" class="medlem-button add_course_select">Legg til kurs</button>
		</form>
	</div>

	<div class="sidebar-image">
		<img src="/assets/img/raw_svg/guy_with_moustache_no_hat.svg"/>
	</div>
</div>
	
<?php $core->getFooter(); ?>
	
