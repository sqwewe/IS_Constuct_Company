-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 15 2023 г., 13:18
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yl2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blanks`
--

CREATE TABLE `blanks` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `date` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `blanks`
--

INSERT INTO `blanks` (`id`, `name`, `date`) VALUES
(5, '8952-612-55-45', '20.05.23 18:05');

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `degree` int(11) DEFAULT NULL,
  `img1` varchar(60) DEFAULT NULL,
  `img2` varchar(60) DEFAULT NULL,
  `img3` varchar(90) DEFAULT NULL,
  `img4` varchar(90) DEFAULT NULL,
  `file` varchar(90) DEFAULT NULL,
  `description_min` varchar(300) DEFAULT NULL,
  `description_full` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `name`, `degree`, `img1`, `img2`, `img3`, `img4`, `file`, `description_min`, `description_full`) VALUES
(1, 'Деревянные дома', 3000000, 'img/catalog/dom2_1.jpg', 'img/catalog/dom2_2.jpg', 'img/catalog/dom2_3.jpg', 'img/catalog/dom2_4.jpg', 'img/step_class/step_class1_smeta.docx', 'Жить в доме из натурального дерева комфортно и приятно, ведь дерево', 'Деревянное домостроение — вид строительства, основанный на использовании материалов из дерева. Изделия и конструкции из дерева надёжны, долговечны и доступны в обработке, а самое главное — экологичны.'),
(2, 'Дома из газобетона', 2500000, 'img/catalog/dom3_1.jpg', 'img/catalog/dom3_2.jpg', 'img/catalog/dom3_3.jpg', 'img/catalog/dom3_4.jpg', 'img/catalog/smeta_dom3.pdf', 'Газобетон – материал технологичный и является разновидностью ячеистого бетона. Этот вид искусственного камня изготавливается с применением газообразователей, а прочность он набирает в автоклаве под воздействием высокого давления и парообработки. Простым языком – газобетон – это вспененный затвердевш', 'Как и любой технологичный материал, газобетон требователен к эксплуатации. При использовании этого стройматериала нужно знать области его применения и факторы, приводящие к его разрушению.'),
(5, 'Каркасные дома', 2980000, 'img/catalog/dom4_1.jpg', 'img/catalog/dom4_2.jpg', 'img/catalog/dom4_3.jpg', 'img/catalog/dom4_4.jpg', 'img/step_class/smeta.docx', 'Каркасная технология строительства домов в России на пике популярности. Это неудивительно: по сравнению с традиционными кирпичными или даже газоблочными зданиями у каркасных домов много преимуществ.', 'Первая особенность в том, что каркасные дома бывают разными. Канадские, финские и даже европейский фахверк — все это разновидности каркасного здания. Причем разница в характеристиках домов, построенных по разным видам каркасной технологии, может быть впечатляющей. Ближайший аналог — деревянный дом. Это может быть сруб, брусовое здание или тот же каркасник, и свойства всех этих видов деревянных домов сильно отличаются.'),
(6, 'Дома из газосиликата', 3000000, 'img/catalog/dom5_1.jpg', 'img/catalog/dom5_2.jpg', 'img/catalog/dom5_3.jpg', 'img/catalog/dom5_4.jpg', 'img/step_class/smeta.docx', 'Блоки из газосиликата обладают преимуществами, если сравнивать их с традиционным кирпичом или брусом. Строительство домов из газоблоков выгодно по ряду причин', 'Благодаря производству в заводских условиях материал выгоден из-за:\r\nневысокой стоимости (на 25-30% ниже стоимости кирпича);\r\nконтроля качества блоков на протяжении всего технологического цикла;\r\nконтроля геометрии; незначительные отклонения размеров изделий позволяют уменьшить расход блоков и кладочной смеси;\r\nпростой доставки и хранения; изделия помещаются на палеты; при длительном хранении их защищают полиэтиленовой пленкой.\r\n'),
(16, 'Дома из керамических блоков', 2600000, 'img/catalog/dom1_1.jpg', 'img/catalog/dom1_2.jpg', 'img/catalog/dom1_3.jpg', 'img/catalog/dom1_4.jpg', 'img/step_class/smeta.docx', 'Проект \"Ульрика \" - идеальный двухэтажный дом для постоянного проживания из керамических блоков с террасой, с баней. Площадь строения 281.04 кв.м. с размерами 13*10.', 'Компания ДомГрад осуществляет качественное строительство дома \"Ульрика \". Обращаем ваше внимание, на то, что стоимость строительства напрямую зависит от комплектации и технологии строительства. Для предоставления подробной информации и консультирования, можно обратится по номеру: +7 (3952) 40-72-90.'),
(17, 'Панельные дома', 2000000, 'img/catalog/dom6_1.jpg', 'img/catalog/dom6_2.jpg', 'img/catalog/dom6_3.jpg', 'img/catalog/dom6_4.jpg', 'img/step_class/smeta.docx', 'Типовая застройка — отличительная черта большинства городов России. Разбираемся вместе с экспертом, каковы особенности панельного дома и о чем нужно знать, если планируете купить в нем квартиру', 'В отличие от кирпичного панельки собирают по огромным частям — складывают из железобетонных плит, как конструктор. С завода на стройку приезжают блоки — цельные стены, полы и потолки будущего дома, остается только их совместить. С лицевой стороны плита выглядит однородной, может быть рельефной или гладкой, но на самом деле состоит из нескольких слоев: наружного облицовочного слоя, железобетона и утеплителя из минеральной ваты и пенополистирола. В последний заложен каркас из арматуры, который соединяет все компоненты.');

-- --------------------------------------------------------

--
-- Структура таблицы `planing`
--

CREATE TABLE `planing` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `id_step` int(11) DEFAULT NULL,
  `id_client` int(11) UNSIGNED DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `planing`
--

INSERT INTO `planing` (`id`, `name`, `date_start`, `date_end`, `id_step`, `id_client`, `id_class`) VALUES
(1, 'Дом', '2023-02-01', '2023-06-14', 3, 14, 2),
(2, 'Юрта', '2023-01-05', '2024-02-20', 2, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `step_building`
--

CREATE TABLE `step_building` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `step_building`
--

INSERT INTO `step_building` (`id`, `name`) VALUES
(1, 'Подписание договора'),
(2, 'Проектирование постройки'),
(3, 'Согласовывание '),
(4, 'Закупка материалов'),
(5, 'Создание фундамента'),
(6, 'Создание кракаса'),
(7, 'Кровля'),
(8, 'Установка окон'),
(9, 'Установка дверей'),
(10, 'Окончательный вердикт');

-- --------------------------------------------------------

--
-- Структура таблицы `step_class`
--

CREATE TABLE `step_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_class` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `decription` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `step_class`
--

INSERT INTO `step_class` (`id`, `id_class`, `title`, `img`, `decription`) VALUES
(1, 1, 'Ленточный фундамент', 'img/catalog/step_class/step_class1_1.jpg', 'Песчаная подушка: 300 мм;\r\nЩебенистая подушка: 100 мм;\r\nРостверк (лента): ширина 300мм., высота 600мм.;\r\nРабочая арматура d12 мм класса АIII;\r\nБетон М-300 (B22,5) с сертификтом качества;\r\nГидроизоляция фундамента - верхняя поверхность основания промазывается битумной мастикой, затем на нее накладывается несколько слоев рубероида.'),
(2, 1, 'Наружные и внутренние несущие стены', 'img/catalog/step_class/step_class1_2.jpg', 'Сруб (наружные внутренние стены, фронтоны) собираются из бревна средним диаметром 240 мм (диапазон 220-260 мм.);\r\nТипы стыков бревен на выбор: «в обло» / «в чашу» /«в лапу»;\r\nМежду венцами бревен в 2 слоя прокладывается «джутовое волокно» или «льноватин» толщиной 10мм. Джут крепится строительным степлером;\r\nВенцы собираются с использованием деревянных нагелей.\r\nБольшие трещины в бревнах заполняются герметиком;\r\nПосле сборки сруб обрабатывается огнебиозащитным покрытием.\"'),
(3, 1, 'Кровля металлочерепицей', 'img/catalog/step_class/step_class1_3.jpg', 'Мауэрлат по всему периметру несущих конструкций;\r\nСтропильная система выполняется из доски 50х200 мм и обрабатывается огнебиозащитным покрытием;\r\nОбрешетка выполняется из доски 50х100мм;\r\nПароизоляция мембранного типа\r\nМеталлочерепица с типом покрытия \"Викинг или \"Монтеррей\" с возможностью выбрать цветовую палитру.'),
(4, 1, 'Оконные конструкции', 'img/catalog/step_class/step_class1_4.jpg', 'Оконные системы на выбор: Rehau Delight / Exprof Profecta (71) / Proplex\r\nПрофиль 5-ти камерный, толщиной 70 мм., белого цвета, с противомаскитными сетками.\r\nСтеклопакет 2-х камерный, толщиной 32мм.\r\nФурнитура ROTO NT'),
(5, 1, 'Двери', 'img/catalog/step_class/step_class1_5.jpg', 'Входная металлическая дверь произведена в России, имеет 4 класс устойчивости к взлому и установленный утеплитель зимнего типа. В межкомнатных проемах применяются ламинированные конструкции с необходимой фурнитурой.'),
(6, 2, 'Плитный и монолитный фундамент', 'img/catalog/step_class/step_class2_1.jpg', 'Песчаная подушка: 200 мм;\r\nЩебенистая подушка: 100 мм;\r\nРабочая арматура d12-16 мм класса АIII с шагом 200 мм;\r\nРабочая арматура d8 мм класса АIII с шагом 400х400 мм;\r\nЗащитный слой бетона 35 мм;\r\nБетон М-300 (B22,5) с сертификтом качества;'),
(7, 2, 'Наружные и внутренние несущие стены', 'img/catalog/step_class/step_class2_2.jpg', 'Наружные и внутренние несущие стены\r\nНаружные несущие стены в 1/2 блока, толщиной 300мм. с теплоизоляцией 30мм. (Размеры стандартного газобетонного блока 625х300х250);\r\nАрмирование кладки через каждые три ряда;\r\nВнутренние перегородки, толщиной 100мм.;\r\nУстройство дверных и оконных проемов.\r\nЦокольные и межэтажные перекрытия\r\nМонтируются усиленные лаги цокольного и межэтажного перекрытия.\r\nЛаги изготавливаются из доски 100х200 мм, с шагом не более 580 мм'),
(8, 2, 'Кровля металлочерепицей', 'img/catalog/step_class/step_class1_3.jpg', 'Мауэрлат по всему периметру несущих конструкций;\r\nСтропильная система выполняется из доски 50х200 мм и обрабатывается огнебиозащитным покрытием;\r\nОбрешетка выполняется из доски 50х100мм;\r\nПароизоляция мембранного типа\r\nМеталлочерепица с типом покрытия \"Викинг или \"Монтеррей\" с возможностью выбрать цветовую палитру.'),
(9, 2, 'Оконные конструкции', 'img/catalog/step_class/step_class1_4.jpg', 'Оконные системы на выбор: Rehau Delight / Exprof Profecta (71) / Proplex\r\nПрофиль 5-ти камерный, толщиной 70 мм., белого цвета, с противомаскитными сетками.\r\nСтеклопакет 2-х камерный, толщиной 32мм.\r\nФурнитура ROTO NT'),
(10, 2, 'Двери', 'img/catalog/step_class/step_class1_5.jpg', 'Входная металлическая дверь произведена в России, имеет 4 класс устойчивости к взлому и установленный утеплитель зимнего типа. В межкомнатных проемах применяются ламинированные конструкции с необходимой фурнитурой.'),
(11, 5, 'Фундамент на винтовых сваях', 'img/catalog/step_class/step_class3_1.jpg', 'Сваи Винтовые Конусные/Лопостные;\r\nТруба диаметр 89 мм (Электросварная);\r\nДлина 3 метра (Заглубление 2,5 метра);\r\nАнтикоррозийное покрытие: Грунт;'),
(12, 5, 'Наружные и внутренние несущие стены', 'img/catalog/step_class/step_class2_2.jpg', 'Наружные и внутренние несущие стены\r\nНаружные несущие стены в 1/2 блока, толщиной 300мм. с теплоизоляцией 30мм. (Размеры стандартного газобетонного блока 625х300х250);\r\nАрмирование кладки через каждые три ряда;\r\nВнутренние перегородки, толщиной 100мм.;\r\nУстройство дверных и оконных проемов.\r\nЦокольные и межэтажные перекрытия\r\nМонтируются усиленные лаги цокольного и межэтажного перекрытия.\r\nЛаги изготавливаются из доски 100х200 мм, с шагом не более 580 мм'),
(13, 5, 'Кровля металлочерепицей', 'img/catalog/step_class/step_class1_3.jpg', 'Мауэрлат по всему периметру несущих конструкций;\r\nСтропильная система выполняется из доски 50х200 мм и обрабатывается огнебиозащитным покрытием;\r\nОбрешетка выполняется из доски 50х100мм;\r\nПароизоляция мембранного типа\r\nМеталлочерепица с типом покрытия \"Викинг или \"Монтеррей\" с возможностью выбрать цветовую палитру.'),
(14, 5, 'Оконные конструкции', 'img/catalog/step_class/step_class1_4.jpg', 'Оконные системы на выбор: Rehau Delight / Exprof Profecta (71) / Proplex\r\nПрофиль 5-ти камерный, толщиной 70 мм., белого цвета, с противомаскитными сетками.\r\nСтеклопакет 2-х камерный, толщиной 32мм.\r\nФурнитура ROTO NT'),
(15, 5, 'Двери', 'img/catalog/step_class/step_class1_5.jpg', 'Входная металлическая дверь произведена в России, имеет 4 класс устойчивости к взлому и установленный утеплитель зимнего типа. В межкомнатных проемах применяются ламинированные конструкции с необходимой фурнитурой.'),
(16, 6, 'Фундамент на винтовых сваях', 'img/catalog/step_class/step_class3_1.jpg', 'Сваи Винтовые Конусные/Лопостные;\r\nТруба диаметр 89 мм (Электросварная);\r\nДлина 3 метра (Заглубление 2,5 метра);\r\nАнтикоррозийное покрытие: Грунт;'),
(18, 6, 'Кровля металлочерепицей', 'img/catalog/step_class/step_class1_3.jpg', 'Мауэрлат по всему периметру несущих конструкций;\r\nСтропильная система выполняется из доски 50х200 мм и обрабатывается огнебиозащитным покрытием;\r\nОбрешетка выполняется из доски 50х100мм;\r\nПароизоляция мембранного типа\r\nМеталлочерепица с типом покрытия \"Викинг или \"Монтеррей\" с возможностью выбрать цветовую палитру.'),
(19, 6, 'Оконные конструкции', 'img/catalog/step_class/step_class1_4.jpg', 'Оконные системы на выбор: Rehau Delight / Exprof Profecta (71) / Proplex\r\nПрофиль 5-ти камерный, толщиной 70 мм., белого цвета, с противомаскитными сетками.\r\nСтеклопакет 2-х камерный, толщиной 32мм.\r\nФурнитура ROTO NT'),
(20, 6, 'Двери', 'img/catalog/step_class/step_class1_5.jpg', 'Входная металлическая дверь произведена в России, имеет 4 класс устойчивости к взлому и установленный утеплитель зимнего типа. В межкомнатных проемах применяются ламинированные конструкции с необходимой фурнитурой.'),
(21, 16, 'Ленточный фундамент', 'img/catalog/step_class/step_class1_1.jpg', 'Песчаная подушка: 300 мм;\r\nЩебенистая подушка: 100 мм;\r\nРостверк (лента): ширина 300мм., высота 600мм.;\r\nРабочая арматура d12 мм класса АIII;\r\nБетон М-300 (B22,5) с сертификтом качества;\r\nГидроизоляция фундамента - верхняя поверхность основания промазывается битумной мастикой, затем на нее накладывается несколько слоев рубероида.'),
(22, 16, 'Наружные и внутренние несущие стены', 'img/catalog/step_class/step_class4_2.jpg', 'Наружные и внутренние несущие стены\r\nНаружные несущие стены в 1/2 блока, толщиной 300мм. с теплоизоляцией 30мм. (Размеры стандартного газобетонного блока 625х300х250);\r\nАрмирование кладки через каждые три ряда;\r\nВнутренние перегородки, толщиной 100мм.;\r\nУстройство дверных и оконных проемов.\r\nЦокольные и межэтажные перекрытия\r\nМонтируются усиленные лаги цокольного и межэтажного перекрытия.\r\nЛаги изготавливаются из доски 100х200 мм, с шагом не более 580 мм'),
(23, 16, 'Кровля металлочерепицей', 'img/catalog/step_class/step_class1_3.jpg', 'Мауэрлат по всему периметру несущих конструкций;\r\nСтропильная система выполняется из доски 50х200 мм и обрабатывается огнебиозащитным покрытием;\r\nОбрешетка выполняется из доски 50х100мм;\r\nПароизоляция мембранного типа\r\nМеталлочерепица с типом покрытия \"Викинг или \"Монтеррей\" с возможностью выбрать цветовую палитру.'),
(24, 16, 'Оконные конструкции', 'img/catalog/step_class/step_class1_4.jpg', 'Оконные системы на выбор: Rehau Delight / Exprof Profecta (71) / Proplex\r\nПрофиль 5-ти камерный, толщиной 70 мм., белого цвета, с противомаскитными сетками.\r\nСтеклопакет 2-х камерный, толщиной 32мм.\r\nФурнитура ROTO NT'),
(25, 16, 'Двери', 'img/catalog/step_class/step_class1_5.jpg', 'Входная металлическая дверь произведена в России, имеет 4 класс устойчивости к взлому и установленный утеплитель зимнего типа. В межкомнатных проемах применяются ламинированные конструкции с необходимой фурнитурой.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`) VALUES
(8, 'sqwewe3', '$2y$10$2Llf27AtMrJPWQwzcEzzP.1MJs2Tl0A66js/yecry/CVENU/hEmHC', 'Сотрудник', 'worker@ya.ru', 2),
(9, 'qweqwe123', '$2y$10$oqqRFokiP.IC94ogcogACulrIG/DM7y/5eK7eWB0m.BZX18Fzz30G', 'Кристофер Нолан', 'cris@ya.ru', 1),
(11, 'admin', '$2y$10$bxFvIngInBjRRLMuKQv9HupXuXtfVblqvEZwPfL0JmOBvsj8JIGMe', 'Администратор', 'admin@ya.ru', 3),
(12, 'tthhnet', '$2y$10$qCwBTaZxs4CZ5tbN81uSPOPrb8KCR7j6feQ2RDyN8xUkC/q1y4Na.', 'Наталья Нозина', 'natata@ya.ru', 1),
(13, '197255', '$2y$10$5Sp0WY1oZ.r/M1kR346nEeSI/2nzVwyFb9SYe4p2tbTsrJxnk1VO.', 'Эрик Труман', 'devops@ya.ru', 1),
(14, 'ylia', '$2y$10$uLd23R91r1CHg0NipTludukB5aMQ2rt/rYuoD/0G73Efm61ZUPcEi', 'Плюхина Ульяна Владимировна', '191919@irkat.ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `id_planing` int(11) DEFAULT NULL,
  `id_users` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `name`, `surname`, `role`, `img`, `passport`, `phone`, `id_planing`, `id_users`) VALUES
(1, 'Егор', 'Некифоров', 'Инженер 1-ой группы', 'img/workers1.jpg', NULL, '+7952 647 10 23', 1, NULL),
(9, 'Владислав', 'Митрофанов', 'Инженер 2-ой группы', 'img/workers2.jpg', NULL, '+7 914 896 32 65', 2, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blanks`
--
ALTER TABLE `blanks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `planing`
--
ALTER TABLE `planing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_step` (`id_step`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_client` (`id_client`);

--
-- Индексы таблицы `step_building`
--
ALTER TABLE `step_building`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `step_class`
--
ALTER TABLE `step_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workers_ibfk_1` (`id_planing`),
  ADD KEY `id_users` (`id_users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blanks`
--
ALTER TABLE `blanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `planing`
--
ALTER TABLE `planing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `step_building`
--
ALTER TABLE `step_building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `step_class`
--
ALTER TABLE `step_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `planing`
--
ALTER TABLE `planing`
  ADD CONSTRAINT `planing_ibfk_1` FOREIGN KEY (`id_step`) REFERENCES `step_building` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planing_ibfk_3` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `planing_ibfk_4` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `step_class`
--
ALTER TABLE `step_class`
  ADD CONSTRAINT `step_class_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `step_class_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

--
-- Ограничения внешнего ключа таблицы `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`id_planing`) REFERENCES `planing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workers_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
