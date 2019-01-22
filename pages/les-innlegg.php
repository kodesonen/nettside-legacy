
<?php $core->pageHead("Kursside"); ?>

    <?php $core->getHeader(); ?>
    <div class="wrapper">
        <div class="kurs_info">
            <h1><?php $core->getChapterName(); ?></h1><br/>
            <p>Dato: 01.01.2019 | Skrevet av: Navn Navnesen</p>           
        </div>

        <div class="course_jump_break">
        <?php $core->loadPost(); ?></div>
    </div>

    <?php $core->getFooter(); ?>
