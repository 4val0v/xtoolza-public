	///////////////////////////////////////////////////////////////////
	// ������ �������� ���� � Yandex.direct
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
 	
 	1. � ���������
 	--------
 	Yandex Direct parser - ���������� ��������� ��������������� ��� ����� �������� ���� � 	������ ������ ������.
	���� ��������� ������ ������.
 	
 	
 	2. ����������
	--------
	1) ���������� ���������� ������ � ����� �� ����� �������.
	2) �������� My SQL ���� �� �������
	3) �������� � ��� ���� ���� �� ����� �������� exempts.sql
	4) �������� ���� include/setting.php
		�������������� ������ 
		define("DBHOST","localhost"); 
		define("DBUSER","username");---- ����� � ���� 
		define("DBPASS","password");---- ������ � ����
		define("DBNAME","basename");---- ��� ����

		define("PROXY_LIST", "include/proxylist.txt");
		define("REQUEST_PER_PROXY", 2);---- ���-�� �������� � ����� ������
	5) ��������� chmod �� ����� result ��� ������ �� ��������� ������
	6) �������� ������ ������ � ���� include/proxylist.txt

	3. ������������� 
	--------
	������� � ����� ���� ��� ����������� ������, ��������� ����
	����� ��� �������  ------------- �������� ������	
	���������� ����������� ------------- ������������ �� ���-�� �����������

	������� �� ������ �����-����������, ����� �������� �� ����� ������� �� ����� �������� � 	����������.
	����� ��������� �������, ��� ����� ����� ���� �� ���������� ������������� ����� � 	������������ � ������� .csv

	����� �� ������ ����� ����������� ���������� � ����� /result/

	4. ��������� � ����������
	--------
	������ ��������� ���������, ��������� �� ������������, ��� ������� ��������������� ��� 	����.
	���������� ���������� �� ����� ��������� � ��������� � ����� �����: http://www.kass.ws/2008/01/09/besplatnyiy-skript-po-podboru-klyuchevyih-slov/
	


	�������� ���,
	Kass (http://www.kass.ws)


