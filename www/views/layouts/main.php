<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>

    <link href="<?php echo Yii::getAlias('@web').'/css/mountain-evo.css'; ?>" rel="stylesheet" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap2">
    <?php
    NavBar::begin([
        'brandLabel' => 'Mountain-<b>Evo</b>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-static-top navbar-green',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'encodeLabels' => false,
        'items' => [
            //['label' => '<img src="'.Yii::getAlias('@web').'/images/icons/Rainfall_grey.png" /> ' . Html::encode('Observatory'), 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-tent"></span> '.\Yii::t('menu', 'Observations'), 'url' => ['/site/observatory']],
            ['label' => '<span class="glyphicon glyphicon-dashboard"></span> '.\Yii::t('menu', 'Dashboard'), 'url' => ['/site/indicators']],
            ['label' => '<span class="glyphicon glyphicon-blackboard"></span> '.\Yii::t('menu', 'Learning Centre'), 'url' => ['/site/sensors']],

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        //'encodeLabels' => false,
        'items' => [
            Yii::$app->user->can("admin") ?
                [
                    'label' => \Yii::t('menu', 'Admin'),
                    'url' => ['/user/logout'],
                    'items' => [
                         ['label' => \Yii::t('menu', 'Users'), 'url' => ['/user/admin']],
                         '<li class="divider"></li>',
                         ['label' => \Yii::t('menu', 'Catchments'), 'url' => ['/catchment']],
                         ['label' => \Yii::t('menu', 'Sensors'), 'url' => ['/sensor']],
                         '<li class="divider"></li>',
                    ],
                ]:
                ['label' => ''],
            Yii::$app->user->isGuest ?
                ['label' => \Yii::t('menu', 'Login'), 'url' => ['/user/login']] :
                [
                    'label' => \Yii::t('menu', 'Logout').' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
            [
                'label' => \Yii::t('menu', 'Language'),
                'items' => [
                     ['label' => 'English', 'url' => Url::current(['language' => 'en'])],
                     '<li class="divider"></li>',
                     ['label' => 'Spanish', 'url' => Url::current(['language' => 'es'])],
                     '<li class="divider"></li>',
                     ['label' => 'Nepali', 'url' => Url::current(['language' => 'ne'])],
                ],
            ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <div class="row links">
<!--            <div class="col-lg-4 col-md-12">
                <?=\Yii::t('footer', 'Contact the Mountain-EVO team:'); ?>
                <br /><?=\Yii::t('footer', 'w.buytaert@imperial.ac.uk'); ?>
            </div> -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h4><?=\Yii::t('footer', 'OBSERVATIONS'); ?></h4>
                <?=\Yii::t('footer', 'VIEW RAW DATA'); ?><br />
                <?=\Yii::t('footer', 'UPLOAD DATA'); ?><br />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h4><?=\Yii::t('footer', 'STORIES'); ?></h4>
                <?=\Yii::t('footer', 'WATCH VIDEOS'); ?><br />
                <?=\Yii::t('footer', 'UPLOAD STORY'); ?><br />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h4><?=\Yii::t('footer', 'END USERS'); ?></h4>
                <?=\Yii::t('footer', 'FARMERS'); ?><br />
                <?=\Yii::t('footer', 'POLICY MAKERS'); ?><br />
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h4><?=\Yii::t('footer', 'ABOUT'); ?></h4>
                <?=\Yii::t('footer', "TEAM"); ?><br />
                <?=Html::a(\Yii::t('footer', "CONTACT"), 'http://www.imperial.ac.uk/people/w.buytaert'); ?>
                <br />
            </div>

        </div>
        <p class="text-center">&copy; Mountain-EVO team, <?= date('Y') ?> </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
