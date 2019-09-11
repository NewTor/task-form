'use strict';

var spApplication = spApplication || {};
/**
 * Обработка событий
 */
spApplication.Actions = {
    /**
     * Сохранение данных
     */
    saveData: function (options, callback) {
        $.post('/action.php', {
            email: options.email,
            name: options.name,
            message: options.message,
            _csrf: options._csrf
        }, function(result) {
            callback(result);
        });
    },
    /**
     * Вывод результата ответа сервера
     */
    alertResult: function (message, alertClass) {
        $("div.alert-message").html(message)
            .removeClass('alert-danger').removeClass('alert-success')
            .addClass(alertClass).show();
    }
};
/**
 * Действия при загрузке
 */
$(function () {
    /**
     * Заглушка при отправке формы
     */
    $('form.form-signin').on('submit', function () {
        // Параметры
        var options = {
            email:   $('#inputEmail').val(),
            name:    $('#inputName').val(),
            message: $('#inputMessage').val(),
            _csrf:   $('#_csrf').val()
        };
        // Вызов сохранения данных
        spApplication.Actions.saveData(options, function (result) {
            var res = JSON.parse(result);
            var resultClass;
            if(res.error) {
                resultClass = 'alert-danger'; // Ошибочный результат
            } else {
                resultClass = 'alert-success'; // Успешная обработка параметров
                $('div.form-container').remove();
            }
            // Вывод результата
            spApplication.Actions.alertResult(spApplication.Error.serverErrorCodes[res.data.resultErrorCode], resultClass);
        });
        return false;
    });

});





