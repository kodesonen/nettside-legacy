
<?php $core->pageHead("Bli medlem"); ?>

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
				<input type="text" value="Universitetet i Sørøst-Norge (campus Kongsberg)" class="disabled_input" name="sted" disabled>

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

				<hr/><p>Ved å opprette medlemskap godtår du våre <a href="/?side=vilkar-og-personvern">vilkår og personvern</a>.</p>
				<button type="submit" name="submit" class="medlem-button">Bli medlem</button>
			</form>
		</div>

		<div class="member-sidebar-image">
			<center>
				<img id="banner-animation" src="/assets/img/member/banner.svg"/>
				<img id="person-animation" class="animated slideInRight" src="/assets/img/member/person.svg"/>
			</center>
		</div>
	</div>
	
	</div>
	
	<?php $core->getFooter(); ?>
	
