
<?php $core->pageHead("Skriv innlegg"); ?>

    <?php $core->getHeader(); ?>
    <div class="wrapper">
		<div class="kurs_info">
			<h1>Skriv et innlegg</h1>
			<p>Om man ønsker å legge inn kode i innlegget, anbefales det å bruke <a href="http://hilite.me/" class="hyperlink">kildekode til HTML</a>. Da kan HTMLen legges direkte inn i tekst området.</p>
		</div>
        <div class="write-course">
	
            <div class="wrapper">
                <?php if(isset($_POST['save'])){ $core->newPost('save'); } ?>
                <?php if(isset($_POST['publish'])){ $core->newPost('publish'); } ?>
            </div>

            <form action='' method='POST'>
                <label for="navn"><b>Kapittelnavn:</b></label>
                <input type="text" class="kapittelnavn" value="<?php $core->getChapterName(); ?>" name="navn">

                <textarea class="summernote" name="tekst"><?php $core->loadAdminPost(); ?></textarea>

                <hr/>
				<div class="write-course-buttons">
					<button type="submit" name="save" class="medlem-button add_course_select save-course"><i class="fas fa-save"></i> Lagre innlegg</button>
					<button type="submit" name="publish" class="medlem-button add_course_select"><i class="fas fa-upload"></i> Publiser innlegg</button>
				</div>
            </form>
        </div>
    </div>
    
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
	
    <?php $core->getFooter(); ?>
