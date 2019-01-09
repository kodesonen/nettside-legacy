<!doctype html><html>
<?php $core->pageHead("Nytt kapittel"); ?>

<body>
	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="medlem-form">
			<h1>Legg til nytt kapittel</h1><hr/>
			<div class="wrapper">
				<?php if(isset($_POST['submit'])){ $core->newChapter(); } ?>
			</div>

			<form action='' method='POST'>
				<label for="navn"><b>Kapittelnavn</b></label>
				<input type="text" placeholder="Oppgi kapittel navnet" name="navn" required>
				
				<label for="delnr"><b>Delnummer</b></label>
				<input type="text" placeholder="Oppgi delnummer (for eksempel 1.0)" name="delnr" required>
				
				<hr/><button type="submit" name="submit" class="medlem-button">Legg til kapittel</button>
			</form>
		</div>

		<div class="medlem-info">
			<img src="/assets/img/homepage/test.png" height="90%" width="90%">
		</div>

		<?php $core->getFooter(); ?>
	</div>
</body>
</html>
