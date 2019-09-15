<?php $core->pageHead("Endre bruker"); ?>
<?php if(!$core->isLoggedIn() || !$core->isAdmin()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<?php $core->checkAuth(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
			
			<li><a href="/?side=endre-medlemmer">Endre bruker</a></li>
			
			<li><a href="#">...</a></li>
			
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="grid-12 medlem-form endre-bruker">
		<h1>Endre på <?php echo $core->requestData("medlemmer", "navn"); ?></h1>
		<p>Her vil du kunne endre instillingene til <?php echo $core->requestData("medlemmer", "navn"); ?>. For å oppdatere detaljene for brukeren kan du redigere feltene nedenfor, for å så klikke på "Oppdater bruker".</p>
		<hr/>
		<div class="wrapper">
			<?php if(isset($_POST['submit'])){ $core->newCourse(); } ?>
		</div>

		<form action='' method='POST'>
			<div class="wrapper grid-gap-standard">
				<div class="grid-6">
					<label><b>Fullt navn</b></label>
					<input type="text" value="<?php $core->requestData("medlemmer", "navn"); ?>" name="navn" required>
				</div>
				
				<div class="grid-6">
					<label><b>E-post</b></label>
					<input type="text" value="<?php $core->requestData("medlemmer", "epost"); ?>" name="epost" required>
				</div>
				
				<div class="grid-6">
					<label><b>Medlem siden</b></label>
					<input type="text" value="<?php $core->requestData("medlemmer", "regdato"); ?>" class="disabled_input" name="regdato" disabled>
				</div>
				
				<div class="grid-6">
					<label><b>Utdanningssted</b></label>
					<input type="text" value="Universitetet i Sørøst-Norge (campus Kongsberg)" class="disabled_input" name="sted" disabled>
				</div>
				
				<div class="grid-4">
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
				</div>
				
				<div class="grid-4">
					<label><b>Studiegrad</b></label>
					<div class="retning">
						<select name="grad">
							<option disabled selected>Velg din studiegrad</option>
							<option value="bachelor">Bachelor</option>
							<option value="master">Master</option>
							<option value="annet">Annet</option>
						</select>
					</div><br>
				</div>
				
				<div class="grid-4">
					<label><b>Rolle</b></label>
					<div class="retning">
						<select name="rolle">
							<option disabled selected>Velg rolle</option>
							<option value="0">Ingen</option>
							<option value="1">Forfatter</option>
							<option value="2">Administrator</option>
						</select>
					</div><br>
				</div>
				
				<div class="grid-12">
					<label><b>API-nøkkel</b></label>
					<input type="text" value="<?php $core->requestData("medlemmer", "apikey"); ?>" name="apikey" required>
				</div>
				
				<div class="grid-12"><hr></div>
				
				<div class="wrapper grid-12 grid-gap-standard">
					<div class="grid-4">
						<button type="submit" id="kodesonen-button" name="edit-user" class="medlem-button add_course_select">Oppdater bruker</button>
					</div>
					
					<div class="grid-4">
						<button type="submit" id="neutral-button" name="new-password" class="medlem-button add_course_select">Opprett nytt passord</button>
					</div>
					
					<div class="grid-4">
						<button type="submit" id="warning-button" name="edit-user" class="medlem-button add_course_select">Slett bruker</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php $core->getFooter(); ?>
