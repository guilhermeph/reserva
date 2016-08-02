<?php

function autoload($nomeDaClasse){
		require_once("classes/".$nomeDaClasse.".php");
}

spl_autoload_register('autoload');

