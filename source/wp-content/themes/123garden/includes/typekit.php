<?php $typekit_id = ot_get_option('typekit_id');?>

<?php if($typekit_id){?>
<script type="text/javascript" src="//use.typekit.net/<?php echo esc_html($typekit_id);?>.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }?>