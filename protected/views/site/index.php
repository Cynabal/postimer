<?php $this->pageTitle=Yii::app()->name; ?>

<h1><?php echo Yii::app()->params['indexHeader']?> </h1>

<?php

    date_default_timezone_set('UTC');
    
    $model= new Pos; 
    
    if (!Yii::app()->user->isGuest or !Yii::app()->params['requireLogin']) 
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'index-grid',
        //'cssFile'=>Yii::app()->theme->skinPath,
        'dataProvider'=>$model->getAll(),
        'enableSorting'=>true,
        'selectableRows'=>0,
        'rowCssClassExpression' => '$data->friendly == "No" ? "removed" : "added"',
        'columns'=>array(
            array(
                'class'=>'CLinkColumn',
                'labelExpression'=>'"<b>".$data->location."</b>"',
                'urlExpression'=>'"http://evemaps.dotlan.net/system/".$data->location',
                'header'=>'Location',
                'linkHtmlOptions'=>array('style'=>'color: white;','target'=>'_blank'),
            ),
            'type',
            'cycle',
            'planet',
            'moon',
            'alliance',
            'friendly',
            'date',
            array('name'=>'Time Remaining',
                  'value'=>'$data->php5_2_date_diff("NOW", $data->date)',
                 ),
            ),
        'htmlOptions'=>array('style'=>'color: black;'),
        ));
    else
        echo 'You must log in to view the Timer information';        
?>
