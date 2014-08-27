<script src="https://code.jquery.com/jquery-git1.min.js"></script>
<script src="<?php echo base_url() ?><?php echo JS_DIR ?>lightbox.min.js"></script>
<script src="<?php echo base_url() ?><?php echo JS_DIR ?>tinymce/tinymce.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?><?php echo CSS_DIR?>app-css.v1.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?><?php echo CSS_DIR?>lightbox.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
    <script src="<?php echo base_url() ?><?php echo JS_DIR ?>respond.min.js"></script>
    <script src="<?php echo base_url() ?><?php echo JS_DIR ?>html5.js"></script>
    <script src="<?php echo base_url() ?><?php echo JS_DIR ?>excanvas.js"></script>
<![endif]-->
<script>
tinymce.init({
    selector: "textarea#editor",
    menubar: false,
    language: 'pt',
    width: 800,
    height: 300,
    relative_urls: false,
    plugins: [
        "advlist autolink lists link image charmap anchor",
        "insertdatetime media contextmenu paste jbimages"
    ],
    contextmenu: "link jbimages",
    fontsize_formats: "8px 10px 12px 14px 16px 18px 24px 36px",
    toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages"    
});
</script>  