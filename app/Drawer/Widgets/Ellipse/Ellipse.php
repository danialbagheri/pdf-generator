<?php

namespace App\Drawer\Widgets\Ellipse;

use App\Console\Commands\DrawCommand;
use App\Drawer\Widgets\AbstractWidget;

class Ellipse extends AbstractWidget
{
	protected $fields = ["horizontal diameter" => 0,"vertical diameter" => 0];

	public function draw(): string
	{
		return "Ellipse: ({$this->x},{$this->y}) horizontal diameter: {$this->fields['horizontal diameter']} vertical diameter: {$this->fields['vertical diameter']}";
	}
}