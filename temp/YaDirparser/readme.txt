	///////////////////////////////////////////////////////////////////
	// Парсер ключевых слов с Yandex.direct
	// 
	// Copyright (C) 2007-2008 by Kass (http://www.kass.ws)
	//
 	// This program is free software; you can redistribute it and/or
 	// modify it under the terms of the GNU General Public License
	// as published by the Free Software Foundation; either version 2
 	// of the License, or (at your option) any later version.
 	//
 	// This program is distributed in the hope that it will be useful,
 	// but WITHOUT ANY WARRANTY; without even the implied warranty of
 	// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 	// GNU General Public License for more details.
 	//
 	///////////////////////////////////////////////////////////////////
 	
 	1. О программе
 	--------
 	Yandex Direct parser - бесплатная программа предназначенная для сбора ключевых слов с 	сервис Яндекс директ.
	Есть поддержка списка прокси.
 	
 	
 	2. Инсталяция
	--------
	1) Скопируйте содержимое архива в папку на вашем сервере.
	2) Создайте My SQL базу на сервере
	3) Положите в нее дамп базы из корня каталога exempts.sql
	4) Откройте файл include/setting.php
		отредактируйте строки 
		define("DBHOST","localhost"); 
		define("DBUSER","username");---- логин к базе 
		define("DBPASS","password");---- пароль к базе
		define("DBNAME","basename");---- имя базы

		define("PROXY_LIST", "include/proxylist.txt");
		define("REQUEST_PER_PROXY", 2);---- кол-во запросов с одной прокси
	5) проставте chmod на папку result для записи на остальное чтение
	6) Положите список прокси в файл include/proxylist.txt

	3. Использование 
	--------
	Зайтите в папку куда был проинстален скрипт, заполните поля
	Фраза для запроса  ------------- основной запрос	
	Количество результатов ------------- ограничитель на кол-во результатов

	Перейдя по ссылке Слова-исключения, можно добавить те слова которые не будут включены в 	результаты.
	После отработки скрипта, вам будет выдан линк на скачивание получившегося файла с 	результатами в формате .csv

	Также вы можете найти сохраненные результаты в папке /result/

	4. Поддержка и обсуждение
	--------
	Скрипт полностью бесплатен, поддержки не предлагается, сам продукт предоставляется как 	есть.
	Обсуждение происходит на блоге создателя в комментах к этому посту: http://www.kass.ws/2008/01/09/besplatnyiy-skript-po-podboru-klyuchevyih-slov/
	


	Искренне ваш,
	Kass (http://www.kass.ws)


