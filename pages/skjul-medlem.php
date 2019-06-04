
<?php $core->pageHead("Skjul medlemskap"); ?>

	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="medlem-form">
			<h1>Skjul medlemskap</h1><hr/>
			<div class="wrapper">
				<?php if(isset($_POST['submit'])){ $core->hideMembership(); } ?>
			</div>
			
			<strong>Info:</strong> Hvis du allerede har skjult navnet ditt fra medlemslisten tidligere, og ønsker å være på listen allikevel så kan du skrive e-post adressen din over for å aktivere synligheten. Da vil du vises på medlemslisten!<br/>
			
			<form action='' method='POST' style='margin-top: 20px;'>
				<label for="epost"><b>E-post</b></label>
				<input type="text" placeholder="Oppgi e-post adresse" name="epost" required>

				<label for="begrunnelse"><b>Begrunnelse</b></label>
				<textarea type="text" class="medlemskap-textarea" placeholder="Hvorfor ønsker du å skjule medlemskapet ditt? Vi vil gjerne høre hvorfor!" name="begrunnelse"></textarea>
				
				<hr/><button type="submit" name="submit" class="medlem-button add_course_select">Skjul medlemskap</button>
			</form>
		</div>

		<div class="sidebar-image">
			<img src="/assets/img/raw_svg/guy_with_moustache_no_hat.svg"/>
		</div>
	</div>
	
	<?php $core->getFooter(); ?>
	
