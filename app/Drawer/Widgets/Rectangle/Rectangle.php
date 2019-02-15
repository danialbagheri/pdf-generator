<?php

namespace App\Drawer\Widgets\Rectangle;

use App\Console\Commands\DrawCommand;
use App\Drawer\Widgets\AbstractWidget;

class Rectangle extends AbstractWidget
{
	protected $fields = ["width" => 0, "height" => 0];

	public function draw(): string
	{
		return "Rectangle: ({$this->x}, {$this->y}) width: {$this->fields['width']} height: {$this->fields['height']}";
	}
}