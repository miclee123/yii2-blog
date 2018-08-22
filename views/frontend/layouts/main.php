<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use miclee123\blog\assets\AppAsset;
use miclee123\blog\widgets\Alert;
use miclee123\blog\widgets\Search;
use miclee123\blog\widgets\TagCloud;
use miclee123\blog\widgets\Links;
use miclee123\blog\widgets\RecentComments;
use miclee123\blog\widgets\SiteStat;
use miclee123\blog\widgets\RecentPosts;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="Robots" Content="All">
    <meta name="googlebot" content="All">
    <meta name="keywords" content="<?//= Html::encode($this->seoKeywords) ?>" />
    <meta name="description" content="<?//= Html::encode($this->seoDescription) ?>" />
    <meta name="author" content="Babyblog" />
    <meta name="Copyright" content="Babyblog" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container" id="page">
    <div id="header">
        <div id="logo"><?= Html::a(Yii::$app->params['blogTitle'], Yii::$app->homeUrl) ?></div>
        <div id='search'><?= Search::widget() ?></div>
        <div class="clear"></div>
    </div><!-- header -->

    <div class="clear"></div>

    <div id="mainmenu">
        <?= Nav::widget(['items' => Yii::$app->params['mainMenu']]); ?>
    </div>

    <?= Breadcrumbs::widget([
        'links' => isset($this->breadcrumbs) ? $this->breadcrumbs : [],
    ]) ?>

    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">

            <?= TagCloud::widget([
                'title' => '<i class="icon-st"></i>Облако тэгов',
                'maxTags' => 5,
            ]) ?>

            <?= \miclee123\blog\widgets\RecentPosts::widget([
                'title' => '<i class="icon-st"></i>Последние посты',
                'maxPosts' => 5,
            ]) ?>

            <?= RecentComments::widget([
                'title' => '<i class="icon-st"></i>Последние комментарии',
                'maxComments' => 5,
            ]) ?>

            <?= Links::widget([
                'title' => '<i class="icon-st"></i>Ссылки',
                'links' => Yii::$app->params['blogLinks'],
            ]) ?>

            <?= SiteStat::widget([
                'title' => '<i class="icon-st"></i>Статистика сайта',
            ]) ?>
        </div>
    </div>

</div>

<div id="footer">
    <?= Yii::$app->params['blogFooter'] ?>
</div><!-- footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
