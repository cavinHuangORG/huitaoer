<script charset="utf-8" src="../static/kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(function(){
	if($("#content").length>0){
		KindEditor.options.filterMode = false;

    	editor = KindEditor.create('#content',{
    			uploadJson : '<?php echo u('ajax','operat',array('op'=>'editorUpload')); ?>',
                allowFileManager : false
        });
	}
})
</script>