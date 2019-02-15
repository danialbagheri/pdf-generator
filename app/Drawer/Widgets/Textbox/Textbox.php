<?php

namespace App\Drawer\Widgets\Textbox;

use App\Console\Commands\DrawCommand;
use App\Drawer\Widgets\Rectangle\Rectangle;

class Textbox extends Rectangle
{
	protected $fields = ["width" => 0, "height" => 0, "text" => ''];

	public function draw(): string
	{
		$output = parent::draw();
		$output = str_replace("Rectangle", "Textbox", $output);
		return $output." Text=\"{$this->fields['text']}\"";
	}
}