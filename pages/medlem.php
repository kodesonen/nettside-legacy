<!doctype html><html>
<?php $core->pageHead("Bli medlem"); ?>

<body>
	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="medlem-form">
			<h1>Registrer deg som medlem</h1><hr/>
			<div class="wrapper">
				<?php if(isset($_POST['submit'])){ $core->newMember(); } ?>
			</div>

			<form action='' method='POST'>
				<label for="navn"><b>Fullt navn</b></label>
				<input type="text" placeholder="Oppgi fullt navn" name="navn" required>
				
				<label for="epost"><b>E-post</b></label>
				<input type="text" placeholder="Oppgi e-post adresse" name="epost" required>

				<label for="sted"><b>Utdanningssted</b></label>
				<input type="text" value="Universitetet i Sørøst-Norge (campus Kongsberg)" name="sted" disabled>

				<label for="retning"><b>Studieretning</b></label>
				<div class="retning">
					<select name="retning">
						<option value="0" disabled selected>Velg din studieretning</option>
						<option value="data">Dataingeniør</option>
						<option value="elektro">Elektroingeniør</option>
						<option value="maskin">Maskiningeniør</option>
						<option value="lektor">Lektor</option>
						<option value="annet">Annet</option>
					</select>
				</div><br>

				<label for="grad"><b>Studiegrad</b></label>
				<div class="retning">
					<select name="grad">
						<option disabled selected>Velg din studiegrad</option>
						<option value="bachelor">Bachelor</option>
						<option value="master">Master</option>
						<option value="annet">Annet</option>
					</select>
				</div>

				<hr/><p>Ved å opprette en konto godtår du våre <a href="#">vilkår og personvern</a>.</p>
				<button type="submit" name="submit" class="medlem-button">Bli medlem</button>
			</form>
		</div>

		<div class="medlem-info">
			<h1>Hva innebærer det?</h1><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p><br/>
			<p>But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
	</div>
	
	<?php $core->getFooter(); ?>
	
</body>
</html>
