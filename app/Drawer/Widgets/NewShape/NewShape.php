<?php

namespace App\Drawer\Widgets\NewShape;

use App\Console\Commands\DrawCommand;
use App\Drawer\Widgets\AbstractWidget;

class NewShape extends AbstractWidget
{
	protected $fields = ["heihtg" => 0];

	public function draw(): string
	{
		return "New Shape: ({$this->x},{$this->y}) size: {$this->fields['size']}";
	}
}