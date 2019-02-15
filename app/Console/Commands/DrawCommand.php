<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DrawCommand extends Command
{
	protected $signature = "draw";

	protected $description = "Draws shapes on an artificial page";

	public function handle()
	{
		$availableShapes = implode($this->availableShapes(), ", ");

		$output = '';
		do {
			$insertedShape = $this->ask("Insert the shape you need\n Available shapes: {$availableShapes}\n Insert \"n\" when you're done");

			if ($shape = $this->shapeExists($insertedShape)) {
				$shape->askFields($this);
				$positionX = $this->ask("Insert the X position of your $insertedShape");
				$positionY = $this->ask("Insert the Y position of your $insertedShape");
				$shape->setPosition($positionX, $positionY);
				$output .= $shape->draw()."\n";
			} else {
				if ($insertedShape !== "n"){
					$this->error("Please insert a valid shape");
				}
			}
		} while($insertedShape != 'n');
		
		$this->line("-----------------------------------------");
		$this->line("Current Drawing");
		$this->line("-----------------------------------------");
		$this->info($output);
		$this->line("-----------------------------------------");
	}

	private function availableShapes()
	{
		$dirs = [];
		$dir = new \DirectoryIterator(base_path()."/app/Drawer/Widgets");

		foreach ($dir as $fileInfo) {
			if ($fileInfo->isDir() && !$fileInfo->isDot()) {
		        $dirs[] = $fileInfo->getFilename();
		    }
		}

		return $dirs;
	}

	private function shapeExists($shapeName)
	{
		$shapeName = ucfirst($shapeName);
		$namespace = "App\Drawer\Widgets\\$shapeName\\$shapeName";
		if (class_exists($namespace)) {
			return new $namespace;
		}
		return false;
	}

}