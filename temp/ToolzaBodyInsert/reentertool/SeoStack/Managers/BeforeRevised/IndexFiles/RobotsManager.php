<?php

class RobotsManager {

    const RobotsName = 'robots.txt';
    /**
     * Отдаем Robots из конфигов
     * @return PageWrapper|null
     */
    public function GetRobotsResponse(){
        if(VarHelper::IsSetNotValue(ConfigsLazy::GetInstance()->robots)){
            return null;
        }
        $pageWrapper = new PageWrapper();
        $pageWrapper->Headers->AddHeader(HeaderConst::ContentType, 'text/plain; charset=UTF-8');
        $pageWrapper->Content = ConfigsLazy::GetInstance()->robots->robots;
        return $pageWrapper;
    }

    public function IsRobotsRequest($path){
        $path = trim($path,'/');
        $robotsName = 'robots.txt';
        return strtolower(substr($path,0,strlen($robotsName))) == $robotsName;
    }

}