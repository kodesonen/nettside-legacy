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
				<input type="text" placeholder="Oppgi kurs ikonet" name="ikon" required>
				Hent ikoner fra <a href="https://fontawesome.com" target="_blank" style="color: #e9635e; text-decoration: none">Font Awesome</a> og skriv hele ikon navnet. For eksempel: <strong>fas fa-toolbox</strong>.
				
				<hr/><button type="submit" name="submit" class="medlem-button">Legg til kurs</button>
			</form>
		</div>

		<div class="medlem-info">
			<img src="/assets/img/homepage/test.png" height="90%" width="90%">
		</div>

		<?php $core->getFooter(); ?>
	</div>
</body>
</html>
