<?php

use trk\uikit\Uikit;
use open20\design\assets\BootstrapItaliaDesignAsset;
use open20\design\utility\DesignIcon;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


$currentAsset = BootstrapItaliaDesignAsset::register($this);
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




/**
 * @var $this object
 * @var $data array
 */

$lang =  substr(Yii::$app->language, 0, 2);



$posts = $data['posts'];
$groupped_post = ArrayHelper::index($posts, null, 'social');

$template = $this->extraValue('template');


?>
<?php if ($canSeeBlock): ?>
    <div class="col-xs-12 section-form social-wall">
        <h2 class="subtitle-form"><?= Yii::t('backendobjects', 'Social Wall') ?></h2>
        <div class="row">     
            <?php foreach($template as $col): 
                
                $social_type = $col['social'];
                
            ?>
                <?php if(count($groupped_post[$social_type])>0): ?>
            
                    <div class="<?= $col['class']?>">
                        <p class="h5 font-weight-bold text-uppercase mt-3"><?= $social_type ?></h5>
                        <div class="social-container">
                                <?php foreach($groupped_post[$social_type] as $post): ?> 
                                    
                                    <?= $this->render('socialwall/post', compact('item', 'post')) ?>
                                    
                                <?php endforeach; ?>
                        </div>                
                    </div>
                <?php endif; ?>

            
            <?php endforeach; ?>
        </div>

        
    </div>
<?php endif; ?>