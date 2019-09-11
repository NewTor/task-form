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
     */
    private $db;
    /**
     * Объект для входящих данных
     * @var $input
     */
    private  $input;
    /**
     * Массив доп параметров
     * @var $params
     */
    private $params;
    /**
     * Конструктор класса
     * @param  array $conf
     * @return void
     */
    public function __construct($conf)
    {
        session_start();
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
            return $this->saveData([
                'email' => $this->input->post('email', true),
                'name' => $this->input->post('name', true),
                'message' => $this->input->post('message', true),
                '_csrf' => $this->input->post('_csrf', true),
            ]);
    }
    /**
     * Проверка корректности данных
     * @param $json_obj stdClass
     * @return string
     */
    public function saveData(array $data)
    {
        if(!$data['email'] || $data['email'] == '') {
            // Не заполнен email
            return json_encode([
                'error' => true,
                'data' => [
                    'resultErrorCode' => $this->params['errorCodes']['emptyEmail'],
                ],
            ]);
        } elseif(!preg_match("/^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i", $data['email'])) {
            // Не корректный email
            return json_encode([
                'error' => true,
                'data' => [
                    'resultErrorCode' => $this->params['errorCodes']['wrongEmail'],
                ],
            ]);
        } else {
            // Не заполнено имя
            if(!$data['name'] || $data['name'] == '') {
                return json_encode([
                    'error' => true,
                    'data' => [
                        'resultErrorCode' => $this->params['errorCodes']['emptyName'],
                    ],
                ]);
            } else {
                // Не заполнено сообщение
                if(!$data['message'] || $data['message'] == '') {
                    return json_encode([
                        'error' => true,
                        'data' => [
                            'resultErrorCode' => $this->params['errorCodes']['emptyMessage'],
                        ],
                    ]);
                } else {
                    // Неправильная кодовая строка
                    if($data['_csrf'] != $_SESSION['_csrf']) {
                        return json_encode([
                            'error' => true,
                            'data' => [
                                'resultErrorCode' => $this->params['errorCodes']['wrong_csrf'],
                            ],
                        ]);
                    } else {
                        // Неправильный рефферер
                        if($_SERVER['HTTP_REFERER'] != 'http://' . $_SERVER['HTTP_HOST'] . '/') {
                            return json_encode([
                                'error' => true,
                                'data' => [
                                    'resultErrorCode' => $this->params['errorCodes']['wrongRef'],
                                ],
                            ]);
                        } else {
                            // Указанный email уже есть в базе
                            $result = $this->db->fetchOne("SELECT * FROM `users_email` WHERE `email` = '" . $data['email'] . "'");
                            if($result) {
                                return json_encode([
                                    'error' => true,
                                    'data' => [
                                        'resultErrorCode' => $this->params['errorCodes']['existsEmail'],
                                    ],
                                ]);
                            } else {
                                // Вызов процедуры вставки данных
                                $result = $this->db->execute("CALL sp_SaveData('". $data['email'] ."', '" . $data['name'] . "', '" . $data['message'] . "')");
                                if($result) {
                                    // Успешная вставка
                                    $this->generateKey(); // Генерим новый ключ
                                    return json_encode([
                                        'error' => false,
                                        'data' => [
                                            'resultErrorCode' => $this->params['errorCodes']['dataSuccess'],
                                        ],
                                    ]);
                                } else {
                                    // Ошибка базы данных
                                    return json_encode([
                                        'error' => true,
                                        'data' => [
                                            'resultErrorCode' => $this->params['errorCodes']['serverError'],
                                        ],
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    /**
     * Генерация случайного хеша
     * @return string md5
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
        $_SESSION['_csrf'] = $rand;
        return $rand;
    }

}