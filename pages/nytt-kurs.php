<!doctype html><html>
<?php $core->pageHead("Nytt kurs"); ?>

<body>
	<?php $core->getHeader(); ?>
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
			<center>
				<img src="/assets/img/raw_svg/hoodie_guy_jumping.svg"/>
			</center>
		</div>
	</div>
	
	<?php $core->getFooter(); ?>
	
</body>
</html>
