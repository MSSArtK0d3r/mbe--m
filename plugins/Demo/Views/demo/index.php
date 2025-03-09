<?php demo_load_css(array("assets/css/demo_styles.css")); ?>
<div class="demo-hello-world p15">
    Value from sedtting: <?php var_dump(get_demo_setting("setting_demo")); ?> <br />
    Language from library: <?php echo app_lang("demo_hello_world"); ?>
   
</div>