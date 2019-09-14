<?php $core->pageHead("Endre bruker"); ?>
<?php if(!$core->isLoggedIn() || !$core->isAdmin()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=endre-medlemmer">Endre medlemmer</a></li>
			
			<li><a href="#">...</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="medlem-form">
		<h1>Endre bruker</h1><hr/>
		<div class="wrapper">
			<?php if(isset($_POST['submit'])){ $core->newCourse(); } ?>
		</div>

		<form action='' method='POST'>
			<label><b>Fullt navn</b></label>
			<input type="text" value="<?php $core->requestData("medlemmer", "navn"); ?>" name="navn" required>

			<label><b>E-post</b></label>
			<input type="text" value="<?php $core->requestData("medlemmer", "epost"); ?>" name="epost" required>

			<label><b>Medlem siden</b></label>
			<input type="text" value="<?php $core->requestData("medlemmer", "regdato"); ?>" class="disabled_input" name="regdato" disabled>

			<label><b>Utdanningssted</b></label>
			<input type="text" value="Universitetet i Sørøst-Norge (campus Kongsberg)" class="disabled_input" name="sted" disabled>

			<label><b>Studieretning</b></label>
			<div class="retning">
				<select name="retning">
					<option value="0" disabled selected>Velg din studieretning</option>
					<option value="DATAING" <?php $core->studyDropdown('DATAING'); ?>>Dataingeniør</option>
					<option value="ELEKING" <?php $core->studyDropdown('ELEKING'); ?>>Elektroingeniør</option>
					<option value="MASKING" <?php $core->studyDropdown('MASKING'); ?>>Maskiningeniør</option>
					<option value="LEKTOR" <?php $core->studyDropdown('LEKTOR'); ?>>Lektor</option>
					<option value="ANNET" <?php $core->studyDropdown('ANNET'); ?>>Annet</option>
				</select>
			</div><br>

			<label><b>Studiegrad</b></label>
			<div class="retning">
				<select name="grad">
					<option disabled selected>Velg din studiegrad</option>
					<option value="bachelor">Bachelor</option>
					<option value="master">Master</option>
					<option value="annet">Annet</option>
				</select>
			</div><br>

			<label><b>Rolle</b></label>
			<div class="retning">
				<select name="rolle">
					<option disabled selected>Velg rolle</option>
					<option value="0">Ingen</option>
					<option value="1">Forfatter</option>
					<option value="2">Administrator</option>
				</select>
			</div><br>

			<label><b>API-nøkkel</b></label>
			<input type="text" value="<?php $core->requestData("medlemmer", "apikey"); ?>" name="apikey" required>
			
			<hr>
			<button type="submit" name="edit-user" class="medlem-button add_course_select">Endre bruker</button>
			<button type="submit" name="new-password" class="medlem-button add_course_select">Opprett nytt passord</button>
			<button type="submit" name="edit-user" class="medlem-button add_course_select">Slett bruker</button>
		</form>
	</div>

	<div class="sidebar-image">
		<img src="/assets/img/raw_svg/guy_with_moustache_no_hat.svg"/>
	</div>
</div>

<?php $core->getFooter(); ?>
