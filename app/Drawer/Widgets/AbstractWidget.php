<?php

namespace App\Drawer\Widgets;

use App\Console\Commands\DrawCommand;

abstract class AbstractWidget
{
	protected $x;
	protected $y;

	abstract public function draw(): string;

	public function setPosition(int $x, int $y): self
	{
		$this->x = $x;
		$this->y = $y;

		return $this;
	}

	public function setFields(array $fields): self
	{
		if (!property_exists($this, 'fields')) {
			$this->fieldsPropertyNotExist();
		}

		$this->fields = $fields;
		return $this;
	}

	public function askFields(DrawCommand $drawCommand)
	{
		if (!property_exists($this, 'fields')) {
			$this->fieldsPropertyNotExist();
		}

		foreach ($this->fields as $field => $value) {
			$this->fields[$field] = $drawCommand->ask("Please insert $field of this shape");
		}
	}

	protected function fieldsPropertyNotExist()
	{
		throw new \Exception("Please set a fields property for your widget class", 1);
	} 
}