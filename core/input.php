<?php
/**
 * Вспомогательный класс для работы с входящими данными
 */
class Input{
/**
 * Обрабатывает данные массива $_POST
 * @param  string $name  Имя элемента массива POST
 * @param  boolean $mode Режим обработки данных
 * @access public
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
 * @param  string $name  Имя элемента массива GET
 * @param  boolean $mode Режим обработки данных
 * @access public
 * @return string | null
 */
	public function get($name, $mode = false)
	{
		$result = null;
		if(isset($_GET[$name])) {
			if($mode) {
				$result = stripslashes(htmlspecialchars($_GET[$name]));
			} else {
				$result = $_GET[$name];
			}
		}
		return $result;
	}
/**
 * Обрабатывает данные массива $_REQUEST
 * @param  string $name  Имя элемента массива REQUEST
 * @param  boolean $mode Режим обработки данных
 * @access public
 * @return string | null
 */
	public function request($name, $mode = false)
	{
		$result = null;
		if(isset($_REQUEST[$name])) {
			if($mode) {
				$result = stripslashes(htmlspecialchars($_REQUEST[$name]));
			} else {
				$result = $_REQUEST[$name];
			}
		}
		return $result;
	}



	
	
	
	
	
	
}