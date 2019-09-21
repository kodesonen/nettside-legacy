<?php $core->pageHead("Admin kontrollpanel"); ?>
<?php if(!$core->isLoggedIn()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=admin">Kontrollpanel</a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="text-info">
        <h1>Admin kontrollpanel</h1><br/>
        <p>Denne siden er kun for Kodesonens admins og forfattere. Alt som foregår på denne siden blir loggført.</p>            
    </div>

	<div class="box-wrapper">
        <?php 
            if($core->isAdmin()){
                echo "
        		<a href='/?side=generelle-innstillinger' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-cogs'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Generelle innstillinger</h2>
                        <h4>Diverse innstillinger for sideoppsett</h4>
                    </div>
                </a>

        		<a href='/?side=endre-medlemmer' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-users'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Endre medlemmer</h2>
                        <h4>Se oversikt og behandle medlemmer</h4>
                    </div>
                </a>

                <a href='/?side=kursbehandler' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-list-ol'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Kursbehandler</h2>
                        <h4>Endre kurskatalogen og opprett nye kurs</h4>
                    </div>
                </a>

                <a href='/?side=endre-utfordringer' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-code'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Endre utfordringer</h2>
                        <h4>Se oversikt og behandle utfordringer</h4>
                    </div>
                </a>

                <a href='/?side=send-epost' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-envelope'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Send e-post</h2>
                        <h4>Send e-post til alle medlemmer</h4>
                    </div>
                </a>

                <a href='#' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-file-alt'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Logg-panel</h2>
                        <h4>Alle handlinger på nettsiden loggføres</h4>
                    </div>
                </a>
		
        		<a href='/?side=sokemotoroptimalisering' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-chart-line'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Søkemotoroptimalisering</h2>
                        <h4>Endre On-Page SEO for alle undersider</h4>
                    </div>
                </a>";
            }
            else{
                echo "
                <a href='/?side=kursbehandler' class='box_thread admin-black'>
                    <div class='box_symbol'>
                        <h1><i class='fas fa-list-ol'></i></h1>
                    </div>

                    <div class='box_info'>
                        <h2>Kursbehandler</h2>
                        <h4>Endre kurskatalogen og opprett nye kurs</h4>
                    </div>
                </a>
              ";  
            }
        ?>
	</div>
	<div class="text-info"><br/>
		<h1>Statistikk over Kodesonen</h1><br/>
		<p>All statistikk blir hentet fra Google Analytics.</p><br/><br/>
		<section id="auth-button"></section>
		<section id="view-selector"></section>
		<section id="timeline"></section>
	</div>
</div>

<script>
	(function(w,d,s,g,js,fjs){
	  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
	  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
	  js.src='https://apis.google.com/js/platform.js';
	  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
	}(window,document,'script'));
</script>
<script>
	gapi.analytics.ready(function() {

	  var CLIENT_ID = '1085414759327-dc4hf0ri3i6djuujsbp2d783jpeklr6n.apps.googleusercontent.com';

	  gapi.analytics.auth.authorize({
		container: 'auth-button',
		clientid: CLIENT_ID,
	  });

	  var viewSelector = new gapi.analytics.ViewSelector({
		container: 'view-selector'
	  });

	  var timeline = new gapi.analytics.googleCharts.DataChart({
		reportType: 'ga',
		query: {
		  'dimensions': 'ga:date',
		  'metrics': 'ga:sessions',
		  'start-date': '30daysAgo',
		  'end-date': 'yesterday',
		},
		chart: {
		  type: 'LINE',
		  container: 'timeline'
		}
	  });

	  gapi.analytics.auth.on('success', function(response) {
		viewSelector.execute();
	  });

	  viewSelector.on('change', function(ids) {
		var newIds = {
		  query: {
			ids: ids
		  }
		}
		timeline.set(newIds).execute();
	  });
	});
</script>
<?php $core->getFooter(); ?>
