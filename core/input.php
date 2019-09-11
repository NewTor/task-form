<?php
/**
 * Вспомогательный класс для работы с входящими данными
 */
class Input {
/**
 * Обрабатывает данные массива $_POST
 * @param  string $name  Ключ элемента массива $_POST
 * @param  boolean $mode Режим обработки данных
 * @return string | null
 */
	public function post($name, $mode = false)
	{
		$result = null;
		if(isset($_POST[$name]) && !empty($_POST[$name])) {
			if($mode) {
				$result = stripslashes(htmlspecialchars(strip_tags($_POST[$name])));
			} else {
				$result = $_POST[$name];
			}
		}
		return $result;
	}
/**
 * Обрабатывает данные массива $_GET
 * @param  string $name  Ключ элемента массива $_GET
 * @param  boolean $mode Режим обработки данных
 * @return string | null
 */
	public function get($name, $mode = false)
	{
		$result = null;
		if(isset($_GET[$name]) && !empty($_GET[$name])) {
			if($mode) {
				$result = stripslashes(htmlspecialchars(strip_tags($_GET[$name])));
			} else {
				$result = $_GET[$name];
			}
		}
		return $result;
	}
/**
 * Обрабатывает данные массива $_REQUEST
 * @param  string $name  Ключ элемента массива $_REQUEST
 * @param  boolean $mode Режим обработки данных
 * @return string | null
 */
	public function request($name, $mode = false)
	{
		$result = null;
		if(isset($_REQUEST[$name]) && !empty($_REQUEST[$name])) {
			if($mode) {
				$result = stripslashes(htmlspecialchars(strip_tags($_REQUEST[$name])));
			} else {
				$result = $_REQUEST[$name];
			}
		}
		return $result;
	}



	
	
	
	
	
	
}