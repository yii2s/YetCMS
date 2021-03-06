<?php

namespace app\modules\plugin;
use yii;
class Module extends \yii\base\Module
{
    public $controllerNamespace = '';

	public $pluginid = "";
	
	public $realRoute = "";
	
    public function init()
    {
        parent::init();
		$route = Yii::$app->requestedRoute;
		$array = explode("/",trim($route,"/"));
		$pluginid = isset($array[1]) ? explode(":", $array[1]) : $array[1];
		$namespace = join("\\",$pluginid);
	    $this->controllerNamespace = 'app\modules\plugin\src\\' . strtolower($namespace) ;
		$this->pluginid = $pluginid[0];
		if(count($pluginid)>1){
			unset($array[0]);
			unset($array[1]);
			$this->realRoute = join("/",$array);
		}
    }
	
	//重写module的controller加载方式
	public function createController($route)
	{
		return parent::createController($this->realRoute ? $this->realRoute : $route);
	}
	
	public function beforeAction($action)
	{
		$this->setPluginViewPath();
	    if (!parent::beforeAction($action)) {
	        return false;
	    }
	
	    return true; // or false to not run the action
	}
	
	public function setPluginViewPath()
	{
		$path = dirname(__FILE__).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.$this->pluginid.DIRECTORY_SEPARATOR.'views';
		if(is_dir($path)){
			$this->setViewPath($path);
			Yii::setAlias("@pluginView",$path);
		}
			
	}
}
