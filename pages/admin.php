
<?php $core->pageHead("Admin kontrollpanel"); ?>

    <?php $core->getHeader(); ?>
	
	<div class="wrapper">
		<div class="text-info">
			<h1>Admin kontrollpanel</h1><br/>
			<p>Denne siden er kun for Kodesonens administratorer. Ved komplikasjoner eller feil autentisering, vennligst ta kontakt med <a href="mailto:kontakt@kodesonen" class="hyperlink">kontakt@kodesonen.no</a></p>			
		</div>

		<div class="box-wrapper">
			<a href='#' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-cogs"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Generelle innstillinger</h2>
                    <h4>Diverse innstillinger for sideoppsett</h4>
                </div>
            </a>

			<a href='/?side=endre-medlemmer' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-users"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Endre medlemmer</h2>
                    <h4>Se oversikt og behandle medlemmer</h4>
                </div>
            </a>

            <a href='/?side=kursbehandler' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-list-ol"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Kursbehandler</h2>
                    <h4>Endre kurskatalogen og opprett nye kurs</h4>
                </div>
            </a>

            <a href='/?side=endre-utfordringer' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-code"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Endre utfordringer</h2>
                    <h4>Se oversikt og behandle utfordringer</h4>
                </div>
            </a>

            <a href='#' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-envelope"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Send e-post</h2>
                    <h4>Send e-post til alle medlemmer</h4>
                </div>
            </a>

            <a href='#' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-file-alt"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Logg-panel</h2>
                    <h4>Alle handlinger på nettsiden loggføres</h4>
                </div>
            </a>
			
			<a href='#' class='box_thread admin-black'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-chart-line"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Søkemotoroptimalisering</h2>
                    <h4>Endre On-Page SEO for alle sider</h4>
                </div>
            </a>
		</div>
		
		
		<div class="text-info">
			<h1>Informasjon</h1><br/>
			<p>Her vil nyttig informasjon bli lagt til.</p>			
		</div>
		
	</div>

    <?php $core->getFooter(); ?>

