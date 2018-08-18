<?php
namespace miclee123\blog\widgets;

use miclee123\blog\models\BlogPost;
use miclee123\blog\models\Status;
use yii\base\Widget;
use yii\helpers\Html;

class RecentPosts extends Widget
{
    public $title;
    public $maxPosts = 5;

    public function init()
    {
        parent::init();

        if ($this->title === null) {
            $this->title = 'title';
        }
    }

    public function run()
    {
        $posts = BlogPost::find()->where(['status' => Status::STATUS_ACTIVE])->orderBy(['created_at' => SORT_DESC])->limit($this->maxPosts)->all();

        return $this->render('recentPosts', [
            'title' => $this->title,
            'posts' => $posts,
        ]);
    }
}