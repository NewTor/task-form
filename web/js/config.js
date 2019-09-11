'use strict';

var spApplication = spApplication || {};
/**
 * Сообщения о результатах ответа
 */
spApplication.Error = {};
spApplication.Error.errorCodes = {
    emptyName: 'Не заполнено поле имя.',
    wrongName: 'Не корректное поле имя.',
    emptyEmail: 'Не заполнено поле E-mail.',
    wrongEmail: 'Не корректный E-mail.',
    existsEmail: 'Данный E-mail уже существует.',
    dataSuccess: 'Спасибо, ',
    wrongPostData: 'Не корректный запрос.',
    emptyMessage: 'Не заполнено сообщение.',
    wrong_csrf: 'Не корректный код проверки.',
    serverError: 'Ошибка базы данных. Данные не добавлены.',
    wrongRef: 'Не правильный рефферер.',
    successInfo: '! Ваша информация успешно отправлена.'
};
/**
 * Коды сообщений
 */
spApplication.Error.serverErrorCodes = {
    0: spApplication.Error.errorCodes.dataSuccess,
    1: spApplication.Error.errorCodes.emptyName,
    2: spApplication.Error.errorCodes.wrongName,
    3: spApplication.Error.errorCodes.emptyEmail,
    4: spApplication.Error.errorCodes.wrongEmail,
    5: spApplication.Error.errorCodes.existsEmail,
    6: spApplication.Error.errorCodes.wrongPostData,
    7: spApplication.Error.errorCodes.emptyMessage,
    8: spApplication.Error.errorCodes.wrong_csrf,
    9: spApplication.Error.errorCodes.serverError,
    10: spApplication.Error.errorCodes.wrongRef,
    11: spApplication.Error.errorCodes.successInfo
};