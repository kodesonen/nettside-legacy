
<?php $core->pageHead("Bli medlem"); ?>

	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="text-info">
			<h1>Medlemsliste</h1><br/>
			<p>Her finner du medlemmene i Kodesonen. Dersom du ønsker å skjule ditt navn fra denne listen så kan du <a href="/?side=skjul-medlem" class="hyperlink">klikke her</a>. Hvis du ikke lenger ønsker å være medlem og ønsker å avslutte medlemskapet i Kodesonen så kan du <a href="#" class="hyperlink">klikke her</a>.</p>
		</div>

		<div class="member-list">
			<table class="member">
				<tr class="member-leading">
					<td>Navn</th>
					<td>Studieretning</th>
					<td>Medlem siden</th>
				</tr>
				<?php $core->getMembers(); ?>
			</table>
		</div>
	</div>
	
	<?php $core->getFooter(); ?>
	