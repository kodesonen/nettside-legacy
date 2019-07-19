<?php $core->pageHead("Endre medlemmer"); ?>
<?php if(!$core->isLoggedIn() || !$core->isAdmin()) header("Location: /?side=hjem"); ?>
<?php $core->getHeader(); ?>

<div class="wrapper">
    <div class="text-info">
        <h1>Endre medlemmer</h1><br/>
        <p>Her kan du se og endre alle Kodesonens medlemmer.</p>
    </div>

    <div class="medlem-form">
        <h2>Søk etter medlem:</h2>
        <div class="wrapper"><?php if(isset($_POST['submit'])){ $core->findMember(); } ?></div>

        <form action='' method='POST'>
            <label for="epost"><b>E-post adresse</b></label>
            <input type="text" placeholder="Oppgi e-post adresse" name="epost" required>
            
            <button type="submit" name="submit" class="medlem-button add_course_select">Søk etter medlem</button>
        </form>
    </div>

    <div class="sidebar-image">
        <img src="/assets/img/raw_svg/woman_with_backpack_and_robot.svg"/>
    </div>

    <h2 style="margin-top: 20px;">Administratorer:</h2>
    <div class="member-list" style="margin-top: 10px; margin-bottom: 30px;">
        <table class="member">
            <tr class="member-leading">
                <td>Navn</th>
                <td>E-post adresse</th>
                <td>Rolle</th>
                <td>Studieretning</th>
                <td>Medlem siden</th>
                <td>API-nøkkel</th>
            </tr>
            <?php $core->listAdmins(); ?>
        </table>
    </div>

    <h2>Medlemmer:</h2><br></br>
    <div class="member-list">
        <table class="member">
            <tr class="member-leading">
                <td>Navn</th>
                <td>E-post adresse</th>
                <td>Studieretning</th>
                <td>Medlem siden</th>
                <td>Privat medlem</th>
                <td>API-nøkkel</th>
            </tr>
            <?php $core->listMembers(); ?>
        </table>
    </div>
</div>

<?php $core->getFooter(); ?>
