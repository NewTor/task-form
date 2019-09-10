<?php
/**
 * Класс для работы с БД
 */
class Connection
{
    /**
     * @var resource $link соединение с БД
     * @access public
     */
    public $link;
    /**
     * Конструктор класса
     * @param  array $conf
     * @access public
     * @return void
     */
    public function __construct($conf)
    {
        $this->link = mysqli_connect($conf['db']['dbhost'], $conf['db']['dbuser'], $conf['db']['dbpass'], $conf['db']['dbname']);
        if(!$this->link) die("Нет соединения с MySQL");
        mysqli_query($this->link, "SET NAMES `utf8`");
    }
    /**
     * Выполняет запрос
     * @param  string $sql Запрос к БД
     * @param  resource $link Идентификатор соединения с MySQL
     * @access public
     * @return resource | bool
     */
    public function execute($sql)
    {
        $result = mysqli_query($this->link, $sql);
        if(!$result) die();
        return $result;
    }
    /**
     * Возвращает ID последнего запроса INSERT
     * @access public
     * @return integer
     */
    public function InsertID()
    {
        return mysqli_insert_id($this->link);
    }
    /**
     * Выполняет запрос и преобразует его в массив из объектов полученного результирующего набора
     * @param  string $sql Запрос к БД
     * @access public
     * @return array
     */
    public function fetchAll($sql)
    {
        $result = array();
        $res = mysqli_query($this->link, $sql);
        while($row = mysqli_fetch_object($res)) {
            $result[] = $row;
        }
        return $result;
    }
    /**
     * Выполняет запрос и преобразует его в массив и возвращает первый элемент результирующего набора
     * @param  string $sql Запрос к БД
     * @access public
     * @return null | stdClass
     */
    public function fetchOne($sql)
    {
        $result = array();
        $res = mysqli_query($this->link, $sql);
        while($row = mysqli_fetch_object($res)){
            $result[] = $row;
            break;
        }

        if(isset($result[0]) && !empty($result[0])) {
            return $result[0];
        } else {
            return null;
        }
    }
}