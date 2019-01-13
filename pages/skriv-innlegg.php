<!doctype html><html>
<?php $core->pageHead("Skriv innlegg"); ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css" />
<link rel="stylesheet" href="/assets/css/summernote.css">

<body>
    <?php $core->getHeader(); ?>
    <div class="wrapper">
        <div class="medlem-form">
            <h1>Skriv innlegg</h1><hr/>
            <div class="wrapper">
                <?php if(isset($_POST['submit'])){ $core->newPost(); } ?>
            </div>

            <form action='' method='POST'>
                <label for="navn"><b>Kapittelnavn</b></label>
                <input type="text" value="<?php $core->getChapterName(); ?>" name="navn">

                <textarea class="summernote" name="tekst"></textarea>

                <hr/>
                <button type="submit" name="submit" class="medlem-button add_course_select">Lagre innlegg</button>
                <button type="submit" name="submit" class="medlem-button add_course_select">Publiser innlegg</button>
            </form>
        </div>

        <div class="sidebar-image">
            <center><img src="/assets/img/raw_svg/hoodie_guy_jumping.svg"/></center>
        </div>
    </div>
    
    <?php $core->getFooter(); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.5/umd/popper.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js"></script>
    <script type="text/javascript" src="/assets/js/summernote.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 400,
            tabsize: 2
        });
    });
    </script>
</body>
</html>
