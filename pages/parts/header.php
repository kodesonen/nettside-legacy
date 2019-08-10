<?php if($this->isLoggedIn()){
    echo "
    <div class='admin-header'>
        <div class='wrapper'>
            <div class='admin-links'>
                <a href='/?side=logout'><i class='fas fa-cog'></i> Logg ut</a>
                <a href='/?side=admin'><i class='fas fa-users-cog'></i> Kontrollpanel</a>
            </div>
        </div>
    </div>
    ";
}
?>

<div class="header">
    <div class="wrapper">
        <div class="logo-section">
            <a href="/?side=hjem"><img src="/assets/img/original-vannrett.png" alt="Kodesonen logo"/></a>
        </div>

        <div id="navigation" class="navigation overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <ul class="nav overlay-content">
                <li><a href="/?side=hjem">Hjemsiden</a></li>
                <li><a href="/?side=kurskatalog">Kurskatalog</a></li>
                <li><a href="/?side=utfordringer">Utfordringer</a></li>
                <li><a href="/?side=medlemsliste">Medlemsliste</a></li>
                <li><a href="/?side=om-oss">Om oss</a></li>
                <a href="/?side=medlem"><li><i class="fas fa-users"></i> Bli medlem</li></a>
            </ul>
        </div>
		<span class="mobile_nav" onclick="openNav()">&#9776;</span>
    </div>
</div>
