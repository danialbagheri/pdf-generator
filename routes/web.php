<?php

use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	$name = $_GET['name'];
	$number = $_GET['number'];
    $content = "<!DOCTYPE html>
<html> <head><title></title><style>
		.wrapper {
			width: 595px;
			height: 842px;
	    	background-image: url(./bg-a4.png);
		    background-position: center;
		    background-repeat: no-repeat;
		    position: relative;
		}
		#name {
		    position: absolute;
		    top: 354px;
		    font-size: 2em;
		    left: 38px;
		    width: 511px;
		    height: 89px;
		    text-align: center;
		    vertical-align: middle;
		}
		#number {
			position: absolute;
		    top: 537px;
		    font-size: 2em;
		    left: 38px;
		    width: 511px;
		    height: 89px;
		    text-align: center;
		    vertical-align: middle;
		}
	</style></head> <body> <div class=wrapper></div> <span id=name>$name</span> <span id=number>$number</span> </body> </html>";
	$html2pdf = new Dompdf();
	$html2pdf->loadHtml($content);
	$html2pdf->setPaper('A4');
	$html2pdf->render();
	$html2pdf->stream('a.pdf');
});
