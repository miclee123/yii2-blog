<?php

namespace miclee123\blog;

use yii\base\BootstrapInterface;

/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        /*$app->getUrlManager()->addRules(
            [
                'POST <_m:blogs>' => '<_m>/user/create',
                '<_m:blogs>' => '<_m>/default/index',
                '<_m:blogs>/<id:\d+>-<alias:[a-zA-Z0-9_-]{1,100}+>' => '<_m>/default/view',
            ]
        )*/;

        // Add module I18N category.
        if (!isset($app->i18n->translations['miclee123/blog']) && !isset($app->i18n->translations['miclee123/*'])) {
            $app->i18n->translations['miclee123/blog'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@miclee123/blog/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'miclee123/blog' => 'blog.php',
                ]
            ];
        }
    }
}
