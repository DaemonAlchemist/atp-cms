<?php

namespace ATPCms\View\Filter;

class StaticBlocks implements \Zend\Filter\FilterInterface
{
	static $_blocks = array();

    public function filter($value)
    {
		while($this->_filter($value));
        return $value;
    }
	
	private function _filter(&$value)
	{
		$matches = null;
		$pattern = "/\{\{(.*)\}\}/";
		preg_match_all($pattern, $value, $matches);
		$blockNames = $matches[1];
		
		if(count($blockNames) == 0) return false;
		
		foreach($blockNames as $name)
		{
			if(!isset(self::$_blocks[$name]))
			{
				self::$_blocks[$name] = new \ATPCms\Model\StaticBlock($name);
			}
			$value = str_replace('{{' . $name . '}}', self::$_blocks[$name]->text, $value);
		}
		
		return true;
	}
}
