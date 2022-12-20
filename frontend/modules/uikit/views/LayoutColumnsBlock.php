<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
 
use app\modules\uikit\BaseUikitBlock;

$canSeeBlock = true;
$visibility = $this->varValue('visibility');

switch($visibility){
    case 'guest':
        $canSeeBlock = Yii::$app->user->isGuest;          
    break;
    case 'logged':
        $canSeeBlock = !Yii::$app->user->isGuest; 
		$n_class = $this->varValue('addclass');
		if($canSeeBlock && !empty($n_class)){
			$canSeeBlock = BaseUikitBlock::visivility($n_class);
		}
    break;
}
$n_colonne = $this->varValue('n_colonne', 1);
$col_add_class = (array)$data['addClass'];

?>
<?php if ($canSeeBlock): ?>
    <?php if(!$data['not_embed_container']): ?>
        <div class="uk-section">
            <div class="uk-container">
    <?php endif; ?>
        <div class="row<?= $this->cfgValue('rowDivClass', null, ' {{rowDivClass}}');?>">
                <?php 
                    switch($n_colonne):
                        case 8: 
                            $id1 = array_search(1, array_column($col_add_class, 'n_col'));  
                            ?>
                            <div class="col-12<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                <?= $this->placeholderValue("col1"); ?>
                            </div>
                        
                        <?php break; ?>
                        <?php case 1: 
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col'));  
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col'));               
                                    ?>
                                    <div class="col-12 col-md-6<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md-6<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                        <?php break; ?>
                        <?php case 2: 
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col')); 
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col')); 
                                    $id3 = array_search(3, array_column($col_add_class, 'n_col'));           
                        ?>
                                    <div class="col-12 col-md-4<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md-4<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                                    <div class="col-12 col-md-4<?= $id3 !== false ? ' '.$col_add_class[$id3]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col3"); ?>
                                    </div>
                        <?php break; ?>
                        <?php case 3: 
                                    
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col')); 
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col')); 
                                    $id3 = array_search(3, array_column($col_add_class, 'n_col')); 
                                    $id4 = array_search(4, array_column($col_add_class, 'n_col')); 
                        ?>
                                    <div class="col-12 col-md-3<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md-3<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                                    <div class="col-12 col-md-3<?= $id3 !== false ? ' '.$col_add_class[$id3]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col3"); ?>
                                    </div>
                                    <div class="col-12 col-md-3<?= $id4 !== false ? ' '.$col_add_class[$id4]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col4"); ?>
                                    </div>
                        <?php break; ?>
                        <?php case 4:
                                    
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col')); 
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col')); 
                                    $id3 = array_search(3, array_column($col_add_class, 'n_col'));
                                    $id4 = array_search(4, array_column($col_add_class, 'n_col'));
                                    $id5 = array_search(5, array_column($col_add_class, 'n_col'));
                        ?>
                                    <div class="col-12 col-md<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                                    <div class="col-12 col-md<?= $id3 !== false ? ' '.$col_add_class[$id3]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col3"); ?>
                                    </div>
                                    <div class="col-12 col-md<?= $id4 !== false ? ' '.$col_add_class[$id4]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col4"); ?>
                                    </div>
                                    <div class="col-12 col-md<?= $id5 !== false ? ' '.$col_add_class[$id5]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col5"); ?>
                                    </div>
                        <?php break; ?>  
                        <?php case 5: 
                                    
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col')); 
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col')); 
                        ?>
                                    <div class="col-12 col-md-8<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md-4<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                        <?php break; ?>
                        <?php case 6: 
                                    
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col')); 
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col')); 
                        ?>
                                    <div class="col-12 col-md-4<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md-8<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                        <?php break; ?>
                            
                        <?php case 7: 
                                    
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col')); 
                                    $id2 = array_search(2, array_column($col_add_class, 'n_col')); 
                                    $id3 = array_search(3, array_column($col_add_class, 'n_col')); 
                        ?>
                                    <div class="col-12 col-md-2<?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                    <div class="col-12 col-md-8<?= $id2 !== false ? ' '.$col_add_class[$id2]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col2"); ?>
                                    </div>
                                    <div class="col-12 col-md-2<?= $id3 !== false ? ' '.$col_add_class[$id3]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col3"); ?>
                                    </div>
                        <?php break; ?>
                        <?php default: 
                                    $id1 = array_search(1, array_column($col_add_class, 'n_col'));  
                                    ?>
                                    <div class="col-12 <?= $id1 !== false ? ' '.$col_add_class[$id1]['css'] : '' ?>">
                                        <?= $this->placeholderValue("col1"); ?>
                                    </div>
                                
                        <?php break; ?>
                                
                    <?php endswitch; 
                ?>
                        
                    
                <?php $this->placeholderValue("col$i"); ?>
        </div>
                        
    <?php if(!$data['not_embed_container']): ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; 