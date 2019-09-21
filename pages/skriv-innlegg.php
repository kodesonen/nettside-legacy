
<?php $core->pageHead("Skriv innlegg"); ?>

    <?php $core->getHeader(); ?>
	
	<div class="breadcrumbs">
		<div class="wrapper">
			<ul class="breadcrumb-nav" style="margin-bottom: 0px !important;">
				<li><a href="/?side=admin">Kontrollpanel</a></li>
				
				<li><a href="/?side=kursbehandler">Kursbehandler</a></li>
				
				<li><a href="/?side=kapittelbehandler&id=<?php echo $_GET['id']; ?>">
					<?php $core->requestSpecificData("kurskatalog", "id", $_GET['id'], "navn"); ?>
				</a></li>
				
				<li><a href="#">...</a></li>
				
			</ul>
		</div>
	</div>

    <div class="wrapper">
		<div class="kurs_info">
			<h1>Skriv et innlegg</h1>
		</div>
        <div class="write-course">
	
            <div class="wrapper">
                <?php if(isset($_POST['save'])){ $core->newPost('save'); } ?>
                <?php if(isset($_POST['publish'])){ $core->newPost('publish'); } ?>
            </div>

            <form action='' method='POST'><br/>
				<div class="wrapper">
					<div class="grid-12">
						<label for="navn">Kapittelnavn:</label><br/>
					</div>
					<div class="grid-4">
						<input type="text" class="kapittelnavn" value="<?php $core->getChapterName(); ?>" name="navn">
					</div>
					<div class="grid-8">
						<div class="write-course-buttons">
							<button type="submit" name="save" class="medlem-button add_course_select save-course"><i class="fas fa-save"></i> Lagre innlegg</button>
							<button type="submit" name="publish" class="medlem-button add_course_select"><i class="fas fa-upload"></i> Publiser innlegg</button>
						</div>
					</div>
					<div class="grid-12">
						<textarea class="summernote" name="tekst"><?php $core->loadAdminPost(); ?></textarea>
					</div>
				</div
            </form>
        </div>
    </div>
    
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.5/umd/popper.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js"></script>
    <script type="text/javascript" src="/assets/js/summernote.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
		var pasteCodeButton = function (context) {

        var button = $.summernote.ui.button({
            contents: '{ ... }',
            tooltip: 'Paste Code',
            click: function () {
                $('.summernote').summernote('editor.pasteHTML', '<pre><code>Legg til kode her...</code></pre>');
			}
		  });
		  return button.render(); 
		}
        $('.summernote').summernote({
            height: 400,
            tabsize: 2,
			toolbar: [
					['style', ['style']],
					['font', ['bold', 'italic', 'underline', 'clear']],
					['para', ['ul', 'ol']],
					['height', ['height']],
					['insert', ['link', 'picture']],
					['mybutton', ['pasteCode']],
					['view', ['fullscreen', 'codeview']],
					['help', ['help']]
					], 
            buttons: {
                pasteCode: pasteCodeButton
            }
        });
    });
    </script>
	
    <?php $core->getFooter(); ?>
