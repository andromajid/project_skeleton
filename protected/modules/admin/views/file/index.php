<?php
Yii::app()->clientScript->registerScript('frame',
 'var theFrame = $("#frame", parent.document.body);
theFrame.height($(document.body).height() + 30);
theFrame.width($(document.body).width())');
?>
<iframe id="frame" height="600px" src="<?php echo $this->createUrl('/admin/file/frame'); ?>" ></iframe>