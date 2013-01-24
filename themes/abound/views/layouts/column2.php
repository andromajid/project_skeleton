<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

  <div class="row-fluid">
	<div class="span3">
		<div class="sidebar-nav">
        
		  <?php $this->widget('zii.widgets.CMenu', array(
			/*'type'=>'list',*/
			'encodeLabel'=>false,
			'items'=>array(
//				array('label'=>'<i class="icon icon-home"></i>  Dashboard <span class="label label-info pull-right">BETA</span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'')),
//				array('label'=>'<i class="icon icon-search"></i> About this theme <span class="label label-important pull-right">HOT</span>', 'url'=>'http://www.webapplicationthemes.com/abound-yii-framework-theme/'),
//				array('label'=>'<i class="icon icon-envelope"></i> Messages <span class="badge badge-success pull-right">12</span>', 'url'=>'#'),
				// Include the operations menu
				array('label'=>'OPERATIONS','items'=>$this->menu),
			),
			));?>
		</div>
 
		<div class="well">
      </div>
		
    </div><!--/span-->
    <div class="span9">
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Dashboard'),
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    <?php
    if(Yii::app()->user->hasFlash('error')) {
       echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>'.Yii::app()->user->getFlash('error').'</div>';
    } elseif(Yii::app()->user->hasFlash('success')) {
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.Yii::app()->user->getFlash('success').'</div>';
    }
    ?>
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>
