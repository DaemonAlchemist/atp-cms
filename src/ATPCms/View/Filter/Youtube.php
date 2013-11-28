<?php

namespace ATPCms\View\Filter;

class Youtube extends \ATPCore\View\Filter\AbstractBlockFilter
{
	protected function _replace($videoId)
	{
		return "<iframe class=\"youtube-player\" type=\"text/html\" src=\"http://www.youtube.com/embed/{$videoId}?wmode=transparent\" allowfullscreen frameborder=\"0\"></iframe>";
	}
}
