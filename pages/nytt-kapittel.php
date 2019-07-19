
<?php $core->pageHead("Nytt kapittel"); ?>

	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="medlem-form">
			<h1>Legg til nytt kapittel</h1><hr/>
			<p>Delnummeret vil sortere kapittelene. Det vil si at kapittel 1.0 vil være i en kategori enn 2.0.</p>
			<div class="wrapper">
				<?php if(isset($_POST['submit'])){ $core->newChapter(); } ?>
			</div>

			<form action='' method='POST'>
				<label for="navn"><b>Kapittelnavn</b></label>
				<input type="text" placeholder="Oppgi kapittel navnet" name="navn" required>
				
				<label for="delnr"><b>Delnummer</b></label>
				<input type="text" placeholder="Oppgi delnummer (for eksempel 1.0)" name="delnr" required>
				
				<hr/><button type="submit" name="submit" class="medlem-button add_course_select">Legg til kapittel</button>
			</form>
		</div>
		
		<div class="sidebar-image">
			<img src="/assets/img/raw_svg/woman_with_backpack_and_robot.svg"/>
		</div>
	</div>
	
	<?php $core->getFooter(); ?>
	
