<?php

namespace App\Drawer\Widgets\Circle;

use App\Console\Commands\DrawCommand;
use App\Drawer\Widgets\AbstractWidget;

class Circle extends AbstractWidget
{
	protected $fields = ["size" => 0];

	public function draw(): string
	{
		return "Cirlce: ({$this->x},{$this->y}) size: {$this->fields['size']}";
	}
}