<?php
require __DIR__ . '/connection.php';
require __DIR__ . '/input.php';
/**
 * Основной класс приложения
 */
class Application
{
    /**
     * Объект БД
     * @var $db
     * @access private
     */
    private $db;
    /**
     * Объект для входящих данных
     * @var $input
     * @access private
     */
    private  $input;
    /**
     * Массив доп параметров
     * @var $params
     * @access private
     */
    private $params;
    /**
     * Конструктор класса
     * @param  array $conf
     * @access public
     * @return void
     */
    public function __construct($conf)
    {
        $this->db = new Connection($conf);
        $this->input = new Input();
        $this->params = $conf['params'];
    }
    /**
     * Запуск приложения
     * @return string
     */
    public function exec()
    {
        $data = $this->input->post('data', true);
        if($data) {


            // Не заполнено имя

            // Не заполнен email

            // Не корректный email

            // Неправильная кодовая строка

            // Не заполнено сообщение







        } else {
            return json_encode([
                'error' => true,
                'data' => [
                    'resultErrorCode' => $this->params['wrongPostData'],
                ],
            ]);
        }
    }
    /**
     * Генерация случайного хеша
     * @access public
     * @return string
     */
    public function generateKey()
    {
        $chars = 'abdefghijklmnopqrstuvwxyzABDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < 20; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        $rand = md5($string);
        $_SESSION['key_string'] = $rand;
        return $rand;
    }

}