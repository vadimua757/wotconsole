<?php
/**
 * Yii2 Shortcuts
 * @author Eugene Terentev <eugene@terentev.net>
 * -----
 * This file is just an example and a place where you can add your own shortcuts,
 * it doesn't pretend to be a full list of available possibilities
 * -----
 */

/**
 * @return int|string
 */
function getMyId()
{
    return Yii::$app->user->getId();
}

/**
 * @param string $view
 * @param array $params
 * @return string
 */
function render($view, $params = [])
{
    return Yii::$app->controller->render($view, $params);
}

/**
 * @param $url
 * @param int $statusCode
 * @return \yii\web\Response
 */
function redirect($url, $statusCode = 302)
{
    return Yii::$app->controller->redirect($url, $statusCode);
}

/**
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key, $default = null)
{

    $value = getenv($key) ?? $_ENV[$key] ?? $_SERVER[$key];

    if ($value === false) {
        return $default;
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;
    }

    return $value;
}

function CurlPOST($url, $params)
{
    // Инициализация сеанс cURL
    if ($ch = curl_init()) {
        // Устанавливает параметр для сеанса CURL
        curl_setopt($ch, CURLOPT_URL, $url);
        // TRUE для принудительного использования нового соединения вместо закэшированного
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        // TRUE для использования обычного HTTP POST. Данный метод POST использует обычный application/x-www-form-urlencoded, обычно используемый в HTML-формах.
        curl_setopt($ch, CURLOPT_POST, true);

        //Не получать HTTP заголовки
        curl_setopt($ch, CURLOPT_HEADER, false);

        // Все данные, передаваемые в HTTP POST-запросе.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        //TRUE для возврата результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Количество секунд ожидания при попытке соединения. Используйте 0 для бесконечного ожидания.
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        // Максимально позволенное количество секунд для выполнения cURL-функций.
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // Выполнение запроса - ответ на запрос записывается в переменную в виде строки
        $out_str = curl_exec($ch);
        //преобразование ответа в асс.массив ЕСЛИ: невозможно преобразовать, ТО: вывод стркоки
        $out = (!is_null($out_arr = json_decode($out_str, true))) ? ($out_arr) : ($out_str);

        // Возвращает строку с описанием последней ошибки текущего сеанса
        //$err = curl_error($ch);

        // функция - curl_close - Завершает сеанс cURL
        curl_close($ch);
    };

    return $out;
}

function getNationImage($nation){

    $img = '';

    switch ($nation){
        case 'usa';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/usa_r_color.png";
            break;
        case 'uk';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/uk_r_color.png";
            break;
        case 'ussr';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/ussr_r_color.png";
            break;
        case 'france';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/france_r_color.png";
            break;
        case 'japan';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/japan_r_color.png";
            break;
        case 'china';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/china_r_color.png";
            break;
        case 'czech';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/czech_r_color.png";
            break;
        case 'sweden';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/sweden_r_color.png";
            break;
        case 'poland';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/poland_r_color.png";
            break;
        case 'italy';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/italy_r_color.png";
            break;
        case 'merc';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/nation-flags/merc_r_color.png";
            break;
    }
    return $img;
}

function getTypeImage($type){

    $img = '';

    switch ($type){
        case 'lightTank';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/vehicle-types/lighttank.svg";
            break;
        case 'mediumTank';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/vehicle-types/mediumtank.svg";
            break;
        case 'heavyTank';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/vehicle-types/heavytank.svg";
            break;
        case 'AT-SPG';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/vehicle-types/at-spg.svg";
            break;
        case 'SPG';
            $img = "//wxpcdn.gcdn.co/static/89e7685/portal/img/svg-icons/vehicle-types/spg.svg";
            break;
    }
    return $img;
}