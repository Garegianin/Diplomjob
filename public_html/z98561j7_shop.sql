-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 03 2022 г., 20:35
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `z98561j7_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--
-- Создание: Июн 05 2022 г., 15:37
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `product_idproduct` int(11) NOT NULL,
  `users_idusers` int(11) NOT NULL,
  `basketcol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`product_idproduct`, `users_idusers`, `basketcol`) VALUES
(1, 18, 3),
(1, 19, 10),
(2, 18, 2),
(2, 19, 4),
(6, 19, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--
-- Создание: Июн 05 2022 г., 15:37
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `idorders` int(11) NOT NULL,
  `users_idusers` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `idproductzak` varchar(100) NOT NULL,
  `fullprice` int(11) NOT NULL,
  `vidopl` varchar(50) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `allprod` varchar(600) NOT NULL,
  `data` varchar(45) NOT NULL,
  `done` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idorders`, `users_idusers`, `address`, `idproductzak`, `fullprice`, `vidopl`, `tel`, `allprod`, `data`, `done`) VALUES
(29, 22, 'Город: ; Улица: Скобелевская; Дом/корп: 19; квартира: 90;', '1', 1990, 'Курьеру наличными', '+79856141098', ' Амазония; в количестве: 1 шт.; ', '18.06.2022', 'доставлен'),
(30, 26, 'Город: ; Улица: Бауманская; Дом/корп: 90; квартира: 90;', '2', 1990, 'Курьеру по карте', '89997776655', ' Амазония; в количестве: 1 шт.; ', '18.06.2022', 'не доставлен'),
(31, 22, 'Город: ; Улица: ujjj; Дом/корп: u78; квартира: 87;', '3', 5860, 'Курьеру наличными', '89998887766', ' Амазония; в количестве: 1 шт.;  Манчкин; в количестве: 3 шт.; ', '18.06.2022', 'не доставлен'),
(33, 22, 'Город: ; Улица: Скоб; Дом/корп: 1; квартира: 2;', '4', 13710, 'Курьеру наличными', '+79998887766', ' Амазония; в количестве: 8 шт.;  Манчкин; в количестве: 1 шт.; ', '20.06.2022', 'не доставлен'),
(34, 22, 'Город: ; Улица: ы; Дом/корп: 1; квартира: 1;', '5', 1990, 'Курьеру наличными', '+78гг', ' Амазония; в количестве: 1 шт.; ', '20.06.2022', 'не доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--
-- Создание: Июн 05 2022 г., 15:37
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `productcol` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(7000) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idproduct`, `productcol`, `name`, `description`, `price`, `image`, `type`) VALUES
(1, 14, 'Амазония', 'Настольная карточная игра \"Амазония\" погрузит вас в удивительный мир дикой природы тропиков. Вам предстоит вырастить пышный экзотический лес, привлекая к его созданию всю экосистему: от саженцев зелёных растений, до диких животных. Но просто взять и выложить желаемую карту не получится, нужно тщательно отбирать, что будет расти в вашем лесу, чтобы создать идеальный баланс флоры и фауны.\r\n\r\n В \"Амазонии\" партия длится три раунда, которые называются \"сезоны\". Каждый сезон игроки по очереди выбирают карты из трёх имеющихся колод роста, а затем либо забирают просмотренную стопку и выкладывают карты в свой лес, либо возвращают её обратно, добавляя в неё одну карту текущего сезона. Каждая стопка имеет свои карты растений и животных, одни из которых принесут больше пользы, а другие наоборот могут нанести ущерб. Поэтому выбирайте с умом.\r\n\r\nОсновные правила \"Амазонии\" рассчитаны на дуэльное противостояние, но включают вариант игры для 3 и 4 игроков, а также соло-режим.', 1490, '/images/amazonija_00.jpg', 'classic'),
(2, 2, 'Манчкин', 'Итак, настольная игра \"Манчкин\" – это ролевая игра по форме, пародия по содержанию. Манчкины игроков ходят по подземелью, вытаскивают на свет божий тамошних чудовищных обитателей и либо раскаиваются в этом, либо получают за победу новые уровни и сокровища. Исход каждого подобного приключения (боя, короче) зависит от того, кто с чем на бой вышел. У игрока это уровень и бонусы/штрафы от шмоток, класса, расы и проклятий. У монстра это уровень плюс карты-усилители и разовые шмотки. Откуда шмотки у монстра? В Вашем бою могут принять участие и завистливые соперники: они могут помогать монстру и ослаблять вас. Поэтому, хотя в \"Манчкин\" и можно играть вдвоём, наберите на матч побольше народу: на руках будет больше проклятий, усилителей и зелий, которыми так легко изменить баланс сил в бою в любую сторону, и бдительные завистники не дадут никому из Вас выйти в единоличные лидеры гонки к 10-му победному уровню.', 1290, '/images/munchkin00.jpg', 'card'),
(3, 0, 'Немезида', '\"Немезида\" – это полукооперативная игра, действие которой происходит в глубоком космосе на практически безжизненном корабле. В этом научно-фантастическом триллере 1–5 игроков стараются выжить, разобраться в происходящем, починить неисправность корабля и вернуться на Землю. Сделать это будет непросто – игрокам нужно выполнить личное задание, а также дожить до возвращения домой. На пути выживания вы встретите множество препятствий: опасные внеземные формы жизни проникли на корабль и становятся всё опаснее; нефункционирующие системы корабля подводят всё чаще, а другие игроки преследуют свои личные цели, которые могут быть противоположны вашим...\r\n\r\n', 13990, '/images/nemesis00.jpg', 'classic'),
(4, 14, 'Uno', 'Цель в игре UNO – избавиться от всех карт. Но когда у игрока остаётся только одна карта, он обязан выкрикнуть \"Уно!\", то есть \"Один\", иначе получит штраф.\r\n\r\nБазовые правила UNO очень просты для освоения:\r\n\r\nКаждый игрок получает на руку по 7 карт, а с кона открывается одна карта. В свой ход игроки должны положить карту того же цвета или того же номинала, что и верхняя карта на кону. Если не получается, то придётся добрать карты с верха колоды. Кроме того, существуют специальные карты. Они позволяют игнорировать или изменять правила и даже заставляют противника добирать карты, от которых он так старательно пытался избавиться.\r\n\r\nUNO прекрасно подойдет для игры всей семьёй, особенно с детьми.', 790, '/images/uno.jpg', 'card'),
(5, 10, 'Стройполис', 'Мэр, в город прибывает всё больше новых жителей, нужно построить новые жилые дома, парковые зоны, рабочие места и обеспечить грамотную инфраструктуру. Созывайте совет, чтобы спроектировать наилучший район!\r\nКарточная настольная игра \"Стройполис\" представляет собой минималистичный градостроительный симулятор. В коробке вы найдёте двухсторонние карты: на одной стороне представлены условия, придерживаясь которых можно заработать дополнительные победные очки. А другая сторона поделена на 4 части – это кварталы (коммерческий, парковый, жилой и индустриальный), каждый из которых обозначен своим цветом. В процессе игры вам предстоит обсуждать с другими игроками, как лучше разместить новый участок, при этом карты друг друга вы видеть не будете. Исходя из того, что на одной карте находится сразу 4 разных квартала, можно догадаться, что выкладывать карты лучше всего друг к другу одинаковыми сторонами, чтобы строились максимально возможные зоны одного типа...', 290, '/images/Stroypolis.jpg', 'card'),
(6, 18, 'Свинтус', 'Настольная игра \"Свинтус\" – быстрая и весёлая карточная игра для 2-10 человек практически любого возраста. Игра стала очень популярна за счёт простоты своих правил, динамичности и настоящего кутежа во время партий. Всё что Вам понадобится – собственно \"Свинтус\", хорошая реакция и внимательность, а также компания товарищей, готовых как следует поразвлечься!', 490, '/images/Svintus.jpg', 'card'),
(7, 9, 'Fluxx: В Стране чудес', 'Залётные обитатели и местные жители Страны чудес выдвигаются навстречу новым приключениям! О, и даже не думайте сомневаться в них. Они готовы сделать всё что угодно, лишь бы доказать, что история их приключений будет самая чудесатая из всех!\r\nБезумное чаепитие – это, конечно, здорово. Но у нас есть куда более действенное средство от скуки, и это – \"Fluxx: В Стране чудес\"! Делайте запасы зелий \"Выпей меня\" и не забывайте про пирожки \"Съешь меня\". Собирайте их все, которые только сможете отыскать. А вдруг потребуется изменить рост? Ну или просто проголодаетесь? В общем, если увидите, хватайте и не задумывайтесь!', 790, '/images/Fluxx_Wonderland.jpg', 'card'),
(8, 6, 'Взрывные котята', 'Вот вам загадка – вместе с нами на Земле проживает более пятисот миллионов этих милейших созданий, фото и видео с их участием набирают невероятную популярность в интернете, мы очень любим их гладить, чесать им пузико и щекотать подушечки ног… Речь, конечно же, про любимых котеек!\r\n\r\nА спрашивали ли вы себя, о чём они мурлычат по ночам? О чём они мечтают? А главное, что произойдёт, если милейшие котята доберутся своими пушистыми лапками до… взрывчатки?! Макака с гранатой, конечно, вызывает некоторые опасения, а насколько будет опасен милый пушистик, обвязанный тротиловыми шашками? Правильный ответ – СМЕРТЕЛЬНО опасен! К несчастью, котейки уже вооружены, и вам предстоит разобраться с этим взрывным милейшеством!', 990, '/images/Vzrivnie-kotyata.jpg', 'card'),
(9, 6, 'Неудержимые единорожки', '\"Неудержимые единорожки\" – это весёлая карточная игра, которая украсит собой любую вечеринку.  И ещё бы, ведь рецепт этой настолки невероятно прост и изыскан: милые единороги и поразительные разрушения! Игра начинается с малыша-пони, и даже не думайте привязываться к этому очаровательному созданию – вряд ли оно выживет. Этот мир магии и блёсток жесток...\r\nЗадача игрока – собрать армию из волшебных единорогов прежде, чем это сделают соперники. С ордой безумных волшебных единорогов вы точно завладеете вселенной! Во всяком случае, до следующего раунда.', 990, '/images/neuderzhimye_edinorozhki.jpg', 'card'),
(10, 14, 'Бэнг!', 'Это карточная игра, которая с лёгкостью перенесёт вас в классический спагетти-вестерн, с салунами, индейцами и обязательными перестрелками!', 990, '/images/bang_box.jpg', 'card'),
(11, 12, 'Рик и Морти: Всмортить всё', 'Вабба лабба даб даб! Что, соскучились? Ну ещё бы, ведь с вами огурчик Рииииик! Очешуительно, красавчики, наконец-то в вашей жизни случилось что-то интересное, а? Знаешь, нам нужно немного твоей помощи, так что давай, не будь как Джерри, бери пушку и пошли уже разберёмся с кучкой паразитов. Правда неясно, кто тут паразит, а кто нет, но ничего, начнём палить и дальше разберёмся в процессе!', 990, '/images/Vsmortit_Vsjo00.jpg', 'card'),
(12, 11, 'Fluxx', 'Настольная игра Fluxx – это карточная игра, в которой сыгранные карты сами определяют цель и задачи игры. Разыгрывая их различные свойства, вы можете изменить множество аспектов: как и сколько карт брать, как их разыгрывать и даже что, собственно, нужно сделать, чтобы победить?!', 790, '/images/Fluxx.jpg', 'card'),
(13, 9, 'Находка для шпиона / Spyfall', 'Вас всегда привлекала романтика фильмов про небезызвестного Джеймса Бонда или Штирлица? Удивлялись их отваге, находчивости и смелости? Фильмы про шпионаж занимают почётное место на полке дома и в вашем сердце? Тогда у нас хорошие новости – теперь у вас есть возможность не только оказаться на их месте и блеснуть смекалкой, но и попробовать быстренько их раскусить...', 1290, '/images/spyfall_new.jpg', 'card'),
(14, 7, 'Эпичные схватки боевых магов: Крутагидон', 'Близится ежегодное состязание Крутагидона! Каждый, хоть чего-то стоящий колдун, готов побороться за приз, прекрасно понимая, что жуткая смерть с расчленением ждёт всех и каждого, и даже победителя раз-другой да покромсают! И пускай вы начнёте бой с одной лишь хилой волшебной палочкой в руках, по ходу состязания вы будете добавлять в свою колоду всё больше новых и мощных карт, которые помогут вам одолеть как обычных врагов, так и легендарных магов (предыдущих победителей турнира). Это ведь эпичные схватки, вы не забыли!?', 1790, '/images/ESW_Deckbuilding.jpg', 'classic'),
(15, 6, 'Зона: Тайны Чернобыля', 'Чернобыль всегда привлекал внимание туристов и сталкеров своими тайнами и загадочной атмосферой. Будоражащие ум секреты и таинственный город-призрак ждут храбрых авантюристов и отчаянных исследователей. Но не каждый сможет вырваться из опасных сетей Зоны отчуждения и вернуться обратно целым и невредимым.\r\n\r\n\r\nФантастический мир настольной игры \"Зона: Тайны Чернобыля\" – страшное место. После катастрофы 1986 года в Чернобыле происходят странные события. Вся близлежащая местность от АЭС теперь кишит мутантами, а территория не только заражена радиацией, но и наполнена невероятно опасными аномалиями. Правительственные лаборатории внутри Зоны и границы района охраняются военными, но это не останавливает мародёров, которые готовы на риск ради трофеев, богатств и таинственного Источника.', 5490, '/images/Zona_Tayni_Chernobylya00.jpg', 'classic'),
(16, 4, 'Fallout', 'Поздравляем! Ведь вы – потомок тех счастливцев, которым чудом удалось выжить после Великой войны 2077 года и её страшных последствий. Война, длившаяся всего лишь несколько часов, смогла унести с собой 7,5 миллиардов жителей Земли. Своему спасению вы так или иначе обязаны \"Убежищу 84\" и компании \"Волт-тек\", построившей множество подобных полуподземных бункеров по всей Америке. Целями этих проектов являлись сохранение технологий и человечества как вида.\r\nПосле войны, в которой были использованы все мировые запасы ядерного оружия, поверхность Земли изменилась до неузнаваемости и стала непригодна для жизни. Впрочем, также, как и воздух с водой. Долгое время остаткам человечества оставалось лишь выживать в Убежищах в ожидании, когда радиация снаружи снизится до приемлемых показателей и гермодверь автоматически откроется.\r\nКогда этот день настал, и жители убежищ впервые вышли наружу, они очень сильно удивились увиденному...', 5490, '/images/Fallout.jpg', 'classic');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Июн 05 2022 г., 15:37
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idusers`, `name`, `password`, `email`) VALUES
(18, 'root', '796ea5ff34c2db8dcdd90a279ca8e981', 'se123@mail.ru'),
(19, 'qwerty', '346b2a810d9ece9845ce7d010ca6fe9a', 'a@dddddddddddddddddddddddd'),
(20, 'Simon Makhrov', '2701cad46ad1268a05e4712cdde221cc', 'se123ma1@gmail.com'),
(21, 'Simon1', 'db26dc02b4a7436cbd6997359773d405', 'saasas@fff.com'),
(22, 'SIMONM', '796ea5ff34c2db8dcdd90a279ca8e981', 'se123ma@gmail.com'),
(23, '111', '7de78e3894a98872201927f07fd7de2d', 'gr@mail.ru'),
(24, 'asd', '7de78e3894a98872201927f07fd7de2d', 'dudos@mail.ru'),
(25, 'ывфыв', 'a4c3228b867b11dc6ac94f997f15e1c2', 'dddd@ddd'),
(26, 'Kostya', '346b2a810d9ece9845ce7d010ca6fe9a', 'ko5tya75@yandex.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`product_idproduct`,`users_idusers`),
  ADD KEY `fk_product_has_users_users2_idx` (`users_idusers`),
  ADD KEY `fk_product_has_users_product1_idx` (`product_idproduct`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorders`,`users_idusers`),
  ADD KEY `fk_orderstrue_users1_idx` (`users_idusers`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idorders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fk_product_has_users_product1` FOREIGN KEY (`product_idproduct`) REFERENCES `product` (`idproduct`),
  ADD CONSTRAINT `fk_product_has_users_users2` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orderstrue_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
