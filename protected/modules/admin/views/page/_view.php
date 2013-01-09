<li>
  <a href="#" class="handle">&nbsp;</a>
  <h3 class="bar"><strong><?php echo strtoupper(CHtml::encode($data->page_title)); ?></strong></h3>
  <div class="content">
    <table class="items">
      <tbody>
        <tr class="even">
          <th width="100"><?php echo CHtml::encode($data->getAttributeLabel('page_title')); ?></th>
          <td><?php echo CHtml::encode($data->page_title); ?></td>
        </tr>
        <tr class="odd">
          <th><?php echo CHtml::encode($data->getAttributeLabel('page_content')); ?></th>
          <td><?php echo CHtml::encode($data->page_content); ?></td>
        </tr>
        <tr class="even">
          <th><?php echo CHtml::encode($data->getAttributeLabel('page_is_active')); ?></th>
          <td><?php echo CHtml::encode(($data->page_is_active == 1 ? 'Yes' : 'No')); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</li>