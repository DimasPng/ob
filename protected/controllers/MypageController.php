<?php

class MypageController extends Controller
{
    
    public function actionIndex ($id)
    {        
        //Проверяем ID
        if (!preg_match ('/[0-9a-z_]+/',$id)) die ('Page url error');
        
        //Если всё в порядке - ищем страничку
        $p = Page::model ()->find (array (
            'condition' => 'psevdo = :psevdo',
            'params' => array (
                ':psevdo' => $id,
            ),
        ));
        
        //{START}
        
        if (!$p) die ('Page not found');
        
        if (!$p->visible) die ('Извините, но эта страничка недоступна к просмотру в данное время');
        
        //{KG}
        
        $this->layout = '//layouts/mypage';
        
        if (strpos ($p->title,'||')!==false) {
            $title2 = explode ('||',$p->title);
            $p->title = trim ($title2[0]);
            $name = trim ($title2[1]);
            if (preg_match ('/^[a-z0-9A-Z]{1,100}$/',$name)) {
                $this->layout = '//layouts/'.$name;
            }
        }
        
        //Если нашли - выводим
        $this->pageTitle = $p->title;
        
        
        //{END}
        
        $this->render ('/main/mpage', array ('data' => $p->content));
        
    }
    
    
}