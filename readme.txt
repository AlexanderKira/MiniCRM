1 этап - создание папок 
2 этап - создание базовых файлов 
3 этап - создание и подключение класса БД и его методов
4 этап - на главной станице формируем репортинг ошибок 
5 этап - организация пользователей по MVC - model views controller
6 этап - создание таблицы в БД 
    CREATE TABLE IF NOT EXISTS `users` (
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `is_admin` tinyint(1) DEFAULT '0',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    )ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 