<?php
/*
	Plugin Name: TinyMCE
	Plugin URI: http://osc-cms.com/extend/plugins
	Version: 1.1
	Description: Редактор TinyMCE
	Author: CartET
	Author URI: http://osc-cms.com
	Plugin Group: Editors
*/

add_action('head_admin', 'editor_tinymce_admin_head');

function editor_tinymce_admin_head()
{
	_e('<script type="text/javascript" src="'.plugurl().'tinymce/tinymce.min.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

		<link rel="stylesheet" type="text/css" media="screen" href="'.plugurl().'elfinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="'.plugurl().'elfinder/css/theme.css">
		<script type="text/javascript" src="'.plugurl().'elfinder/js/elfinder.min.js"></script>
		<script type="text/javascript" src="'.plugurl().'elfinder/js/i18n/elfinder.'.$_SESSION['language'].'.js"></script>');

	_e('<script type="text/javascript">
	tinymce.init({
		selector: ".textarea_big",
		language : "'.$_SESSION['language'].'", // change language here
		theme: "modern",
		file_browser_callback : elFinderBrowser,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",
	});

	function elFinderBrowser (field_name, url, type, win) {
	  tinymce.activeEditor.windowManager.open({
		file: \''.plugurl().'elfinder/elfinder.php\',// use an absolute path!
		title: \'elFinder 2.0\',
		width: 900,  
		height: 450,
		resizable: \'yes\'
	  }, {
		setUrl: function (url) {
		  win.document.getElementById(field_name).value = url;
		}
	  });
	  return false;
	}
	</script>');
}

function editor_tinymce_install()
{
}

?>