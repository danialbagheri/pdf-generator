<?php

namespace App\Drawer\Widgets\Square;

use App\Console\Commands\DrawCommand;
use App\Drawer\Widgets\AbstractWidget;

class Square extends AbstractWidget
{
	protected $fields = ["size" => 0];

	public function draw(): string
	{
		return "Sqaure: ({$this->x}, {$this->y}) size: {$this->fields['size']}";
	}
}