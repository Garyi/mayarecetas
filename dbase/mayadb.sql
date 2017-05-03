-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-05-2017 a las 18:36:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mayadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baules`
--

CREATE TABLE `baules` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `receta_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `baules`
--

INSERT INTO `baules` (`id`, `user_id`, `receta_id`) VALUES
(6, 3, 1),
(7, 5, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`, `status`) VALUES
(16, 'Yucatán', 1),
(17, 'Jalisco', 1),
(18, 'Tlaxcala de Xicohténcatl', 1),
(19, 'Guanajuato', 1),
(20, 'Michoacan', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Creador de Contenido'),
(3, 'Usuario Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `lugar` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `aprobacion` tinyint(1) NOT NULL DEFAULT '0',
  `portada` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `titulo`, `lugar`, `descripcion`, `aprobacion`, `portada`) VALUES
(2, 'PANUCHOS', 16, '....\r\nIngredientes (para 8 personas)\r\n- 1 Kilo de masa para tortillas lo más fina posible\r\n- 3 tazas de frijol negro refrito.\r\n- 2 ramas de epazote\r\n- Sal al gusto.\r\n- Manteca de cerdo o aceite de maíz para freír\r\nPara el pollo\r\n- 1 pollo mediano, bien limpio, partido en piezas\r\n- 60 gramos de recado colorado (se puede comprar una pastilla de achiote, de las que se venden en los comercios)\r\n- 3/4 de taza de jugo de naranja agria o en su defecto mitad jugo de naranja y mitad vinagre blanco\r\n- 3/4 de taza de agua\r\n- 1 cucharadita de caldo de pollo en polvo\r\nPara adornar\r\n- El pollo desmenuzado\r\n- 3 jitomates medianos pelados y picados\r\n- 2 aguacates pelados y picados\r\n- 1 lechuga francesa o una col blanca pequeña, rebanada finamente\r\n- Chile xalapeño en rajitas\r\n\r\nPreparación\r\nLos panuchos: Se hacen unas tortillitas y se cuecen en el comal, cuidando de no romperlas para poderles levantar el pellejito; se les levanta el pellejo, se rellenan con el frijol refrito, se cierran, se fríen en la manteca caliente, se escurren sobre papel absorbente y se les pone encima el pollo desmenuzado, el jitomate, el aguacate, la lechuga y el chile.\r\nEl pollo: Se disuelve el recado colorado en la naranja, se unta muy bien el pollo, de salpimenta, se tapa y se deja cocer a fuego lento durante 15 minutos, se destapa y se deja secar (asar) más o menos durante 25 minutos.', 1, 'files/1493323111panuchos.png'),
(3, 'SOPA DE LIMA', 16, '....\r\nIngredientes (para 6 personas)\r\n- 1 pollo cortado en piezas o dos pechugas enteras grandes\r\n- 10 tazas de agua\r\n- 2 ramitas de orégano\r\n- 2 dientes de ajo\r\n- 1 cebolla partida en cuatro\r\n- Sal y pimienta al gusto\r\n- 1 cebolla de regular tamaño picada medianamente\r\n- 2 cucharadas de aceite de maíz\r\n- 2 jitomates medianos pelados y picados toscamente\r\n- 1 pimiento morrón picado\r\n- 6 limas cortadas en rodajas\r\n- 6 tortillas cortadas en tiritas, fritas y escurridas en papel absorbente\r\nPreparación\r\nSe pone a cocer el pollo en el agua junto con el orégano, el ajo, la cebolla y sal al gusto; una vez cocido se aparta, se deja enfriar y se desmenuza, el caldo se cuela. La cebolla picada se acitrona en el aceite de maíz, se suman el jitomate y el pimiento morrón y se sazona bien, se agrega el caldo y la mitad de las rebanadas de lima, dejándose hervir durante 10 minutos. Se añade el pollo desmenuzado y el resto de la lima rebanada; se sirve inmediatamente acompañada de las tiritas de tortilla fritas.\r\nPresentacíon\r\nEn sopera y se sirve en platos hondos soperos. Las tortillas fritas se ofrecen en un platito aparte para que estén crujientes al momento de servirlas en el plato.', 1, 'files/1493323265spalima.png'),
(4, 'COCHINITA PIBIL', 16, '.....\r\nIngredientes (para 10 o 12 personas)\r\n- 2 hojas de plátano pasadas por la flama (para ablandarlas)\r\n- 1½ kilo de pierna de puerco\r\n- ½ kilo de lomo de puerco con costilla\r\n- 200 gramos de recado de achiote (se puede usar el que se vende comercialmente)\r\n- 1 taza de jugo de naranja agria o mitad de vinagre y mitad de jugo de naranja dulce\r\n- ¼ de cucharadita de comino en polvo\r\n- 1 cucharadita de orégano seco\r\n- 1 cucharadita de pimienta blanca en polvo\r\n- ½ cucharadita de pimienta negra en polvo\r\n- ½ cucharadita de canela en polvo\r\n- 5 pimientas gordas toscamente molida\r\n- 3 dientes de ajo exprimido\r\n- ½ cucharadita de chile piquín\r\n- Sal al gusto\r\n- 125 gramos de manteca de cerdo\r\nSalsa para acompañarla:\r\n- 8 rabanitos muy bien lavados y finamente picados\r\n- 1 cebolla morada chica picada muy finamente\r\n- 4 chiles habaneros picados muy finamente\r\n- ½ taza de cilantro picado muy finamente\r\n- 1 taza de jugo de naranja agria o de vinagre\r\n- Sal al gusto\r\nPreparación\r\nSe forra una charola de horno con las hojas de plátano, dejando que éstas sobresalgan para poder envolver la cochinita. Se coloca la carne sobre las mismas. El achiote se disuelve en la naranja agria, se le añaden las especias y con esto se baña la carne. Se deja marinar cuando menos ocho horas o de un día para otro en el refrigerador. Se baña entonces con la manteca derretida, se envuelve muy bien en las hojas de plátano, se tapa con papel de aluminio y se hornea a horno precalentado a 175º C durante 1½ horas, o hasta que esté tan suave que casi se desbarate. Se desmenuza y se sirve.\r\nSalsa: se mezclan todos los ingredientes y se deja reposar tres horas.\r\nPresentación\r\nSe sirve envuelta en las mismas hojas de plátano, acompañada de la salsa y tortillas recién hechas.', 1, 'files/1493323480pibil.png'),
(5, 'SALBUTE', 16, '....\r\nIngredientes (30 piezas aproximadamente)\r\n- 1 kilo de masa fina para tortillas\r\n- 100 gramos de harina\r\n- Sal al gusto\r\n- Manteca de cerdo o aceite de maíz para freír\r\n- 3 tazas de carne de pavo o de pollo asado y deshebrado\r\n- 2 tazas de col o de lechuga rebanada finamente\r\n- Cebolla morada rebanada o picada en vinagre\r\n- Jitomate guaje rebanado\r\n- Chile habanero molido con vinagre\r\nPreparación\r\nSe revuelve muy bien la masa con la harina y la sal y se hacen a mano o en la prensa unas tortillas de tamaño mediano, no muy delgadas. Se van friendo en la manteca caliente. Los salbutes deben inflarse al momento de freírlas. Ya fritas se escurren sobre papel absorbente y se les pone encima la col, el pollo, la cebolla y unas rebanadas de jitomate. Se sirven acompañados por el chile habanero molido con vinagre o naranja agria para que cada comensal se sirva al gusto.\r\nPresentación\r\nSe sirven inmediatamente en un platón de barro. También pueden rellenarse con restos de cochinita pibil, de relleno negro o de pollo en escabeche.\r\n', 1, 'files/1493323519salbute.png'),
(6, 'DULCE DE PAPAYA VERDE', 16, '......\r\nIngredientes (para 8 personas)\r\n- ½ kilos de papaya verde\r\n- 3 cucharadas de cal\r\n- 2 tazas de azúcar\r\n- 1 litro de agua para la miel\r\n- 2 cucharadas de agua de azahar\r\nPreparación\r\nSe pela y se corta en trozos la papaya, se pone a remojar con agua a cubrir y la cal, se mezcla bien y se deja una hora. Se sacan los trozos de papaya del agua de cal, se cubren con agua fresca y se ponen a hervir, cuando estén cocidos, se retiran del fuego, se les escurre bien el agua y se dejan enfriar. En una cacerola se pone a hervir el azúcar con el litro de agua hasta que se suelte el hervor, se añaden los trozos de papaya y se deja hervir hasta que se forme un almibar ligero, se le añade el agua de azahar. \r\nPresentación\r\nSe coloca en una compotera de vidrio o de cristal. ', 1, 'files/1493323550dulce.png'),
(7, 'Carne en su jugo', 17, '.....\r\nIngredientes \r\nPorciones: 4 \r\n6 rebanadas de tocino\r\n1 kilo bistec de res para carne en su jugo (en trocitos de 1x1 cm)\r\n4 tomates verdes chicos\r\n1 diente de ajo\r\n2 chiles serranos\r\n1/2 cebolla picada\r\n4 cucharadas de cilantro picado\r\nSal y pimienta al gusto\r\n3 tazas de agua\r\n2 cubitos de caldo de pollo\r\n2 tazas de frijoles de la olla y su caldo\r\n\r\nModo de preparación\r\nPreparación: 10min  ›  Cocción: 30min  ›  Listo en:40min \r\n1. Dora bien el tocino en un sartén. Retira del fuego y reserva. En el mismo sartén sella la carne de res con un poco de la grasa del tocino, hasta que haya perdido su color rojo. Sazona con sal y pimienta al gusto.\r\n2. Cuece los tomates, los chiles y el ajo en las 3 tazas de agua. Licua tomates, chiles y ajo en el agua en que se cocieron, cuela y vierte sobre una olla de presión. Agrega la carne sellada y su jugo junto con los cubitos de caldo de pollo.\r\n3. Tapa la olla y cuece a fuego medio-alto hasta que suba la presión. Reduce inmediatamente el fuego a bajo y cocina durante 30 minutos.\r\n4. Sirve con frijoles de la olla, tocino, cebolla y cilantro. Acompaña con tortillas de maíz.', 1, 'files/1493323784canejugo.jpg'),
(8, 'Sopa de Tortilla ', 18, '.....\r\nIngredientes:\r\n3/4 de kilo de jitomates saladet\r\n2 ramitas de cilantro fresco\r\n1 rama de epazote morado\r\n1/2 cebolla mediana\r\n1 diente de ajo\r\n1 y 1/2 litro de caldo de pollo sin grasa.\r\n1 ramita de perejil\r\n1/4 cucharadita orégano seco\r\n1 chile pasilla despepitado y frito\r\n1/2 kilo de tortillas de maíz en tiras delgadas resecas\r\nAceite para freír\r\nPara adornar al momento de emplatar:\r\n1 pieza de Aguacate picado\r\n1/4 de queso Panela en cubitos o queso añejo desmoronado\r\n2 chiles pasilla despepitados, fritos cortados en tiritas\r\nCrema ácida de vaca\r\nSal y pimienta\r\n\r\nModo de elaboración:\r\n1. Calentamos suficiente aceite en un sartén grande a  fuego medio-alto\r\n2. Agregamos las tortillas en tiritas y freímos hasta que se hayan dorado\r\n3. Una vez listas, colocamos sobre un plato cubierto de papel absorbente, de esta forma absorberá el aceite sobrante y Reservamos\r\n4. Calentamos una cucharadita de aceite en una cacerola de 2 litros de capacidad a fuego medio.\r\n5. En una cacerola con suficiente agua cocemos los jitomates con cebolla, el diente de ajo y unas ramitas de cilantro\r\n6. Después los Licuamos muy bien y lo colamos\r\n7. Ahora lo vertimos dentro de la cacerola, freímos durante un par de minutos y salpimentamos\r\n8. Agregamos el caldo de pollo y dejamos que hierva\r\n9. Después agregamos un chile pasilla frito y una ramita de perejil\r\n10. Verificamos la sazón, volvemos a tapar y cocinamos a fuego lento durante otros 8 minutos\r\n11. Terminamos la cocción apagando el fuego, retiramos la ramita de perejil y dejamos el Chile.\r\n\r\nModo de emplatar:\r\n1. Para servir, coloca una cuarta parte de la altura del plato con las tortillas agrega la sopa a manera de casi cubrir las tortillas \r\n2. Decora con aguacate picado, el queso panela o queso añejo y las tiritas de chile pasilla frito\r\n3. Si lo deseas, agrega una cucharadita de crema ácida\r\n\r\nConsejos:\r\nCuando frías las tiras de tortilla cuida que no se quemen y que todas tomen el mismo tono de dorado para que no cambie su sabor, también que no queden sin freír por que quedarán blandas.\r\nTambién cuida el Chile al freírlo que no se queme por que cambiara su sabor. \r\nEl aguacate pícado al momento para que no se oxide.', 1, 'files/1493324850sopatortila.jpg'),
(9, 'Poc Chuc', 16, '....\r\n\r\nIngredientes\r\n4 raciones\r\nCarne de cerdo (en bisteces)\r\nIngredientes para marinar el cerdo\r\n1 taza naranja agria\r\npasta de achiote\r\n4 ctas sal\r\n2 ctas orégano\r\n2 ctas tomillo\r\n2 ctas pimienta molida\r\nIngredientes para la cebolla morada\r\n10 cebollas rojas medianas cortadas en cuadros\r\n8 tazas agua\r\nVinagre\r\n1 atado cilantro picadito\r\n1/2 chile habanero asado y picadito\r\nSal y pimienta\r\n\r\n\r\nPasos\r\n75 minutos\r\nCómo preparar la carne: \r\nPonemos a marinar la carne durante 3 horas en nuestra mezcla (Ingredientes que hemos elegido para marinar, ver en el apartado de ingredientes), previamente preparada .\r\nCasi a la hora de servir, es cunado asaremos a la parrilla los bistecs de carne.\r\nCómo preparar las cebollas: \r\nEchamos agua a calentar en una cacerola y añadimos las cebollas cortadas en cuadros durante 1 minuto.\r\nRetiramos las cebollas del fuego, las escurrimos y les agregamos el vinagre o naranja agria y el cilantro.\r\nAñadimos la sal y la pimienta al gusto.\r\nEmplatar: \r\nServimos la carne acompañada de la cebolla, 1/4 de naranja agria y una salsa de chiltomate.\r\nAcompañamos como guarnición un platito de frijoles colados y tortillas.\r\nSe puede preparar también una salsa picante tamulada.', 1, 'files/1493324930poc.jpg'),
(10, 'Papadzules', 16, '......\r\nIngredientes\r\n4 raciones\r\n1/2 kg pepita de calabaza para papadzul\r\n16 huevos cocidos y picados en cuadros\r\nEpazote\r\n1/4 kg tortilla\r\n8 tomates\r\n\r\n\r\nPasos\r\n30 minutos\r\nCocemos los huevos en agua hasta que veamos que la cáscara se raja. Los pelamos.\r\nEn una olla ponemos a hervir agua con el epazote. Una vez que el epazote haya soltado su punto, la partamos del fuego y aguardamos a que esté fría.\r\nLe echamos la pepita molida y movemos la mezcla poco a poco hasta que observemos que tiene una consistencia cremosa.\r\nPara elaborar la salsa de Papadzul\r\nHervimos en agua los tomates, se quita la cáscara y se licuan.\r\nEn una sartén echamos aceite, el tomate ya licuado, un poco de cebolla picada, sal y, si lo desea muy picante, chile habanero asado.\r\nLo freímos todo hasta que obtengamos una salsa espesita.\r\nEmplatado del Papdzul:\r\nColocar en cada plato 4 \"tacos\" de huevo con la tortilla. Se bañan con la pepita y se adornan con la salsa de tomate.\r\nEste antojito se come caliente y si se quiere resaltar el picante con un chile habanero asado adicional.', 1, 'files/1493324996papadzules.jpg'),
(11, 'Tikin Xic', 16, '....\r\nIngredientes\r\n6 raciones\r\n110 gr Axiote\r\n1/4 de Taza Cebolla picada\r\n3 Clavos\r\n4 Dientes Ajo limpios\r\n3 Pimientas Gordas\r\n1 Cda Pimineta Negra entera\r\n1/2 Taza Jugo de Naranja\r\n1/2 Taza Jugo de Limón\r\n1/4 Taza Aceite de Oliva\r\n6 Filetes de Pescado\r\nSal y Pimienta\r\n\r\n\r\nPasos\r\n30 minutos\r\nSalpimentar los filetes de Pescado y reservar.\r\nLicuar el resto de los ingredientes y marinar los pescados en la salsa por espacio de una hora.\r\nUna vez listos llevar a una sartén o a la parrilla.', 1, 'files/1493325048Tikin-Xic.jpg'),
(12, 'Longaniza de Valladolid', 16, '....\r\nIngredientes\r\n4 raciones\r\n1 1/2 longaniza fresca\r\nSal\r\npimienta\r\n1 taza leche evaporada\r\nCilantro\r\najo\r\naceite de oliva\r\nRúcula\r\n1 tomate\r\nvinagre balsámico\r\n\r\n\r\nPasos\r\n20 minutos\r\nHervir 10 minutos la longaniza, mientras preparar la rúcula y tomates con una pizca de sal, aceite de oliva y vinagre balsámico.\r\nSofreír en el aceite el cilantro, ajo con una pizca de sal, agregar la leche evaporada cuando hierva agregar la longaniza picadita.\r\nA disfrutar!!', 1, 'files/1493325094valla.jpg'),
(13, 'Albóndigas con chicharrón', 19, '....\r\ningredientes:\r\n3/4 kilo carne de res molida\r\n150 g chicharrón delgado\r\n3 tazas de agua\r\n4 cucharadas de cilantro finamente picado\r\n2 1/2 cucharadas de consomé de pollo en polvo\r\n2 cucharadas de aceite\r\n2 cucharadas de cebolla finamente picada\r\n4 chiles jalapeños, en rajas\r\n4 jitomates grandes, picados\r\n2 dientes de ajo, finamente picados\r\n2 huevos crudos\r\npimienta\r\nPara preparar albóndigas con chicharrón hay que triturar muy bien el chicharrón y mezclarlo con la carne, los huevos, el cilantro, ajo y cebolla, sazonando con la pimienta y la mitad del consomé en polvo. Formar las albóndigas con las manos húmedas y dejarlas reposar quince minutos. Freír juntos los jitomates y los chiles, en aceite caliente. Agregarles el agua y el resto del consomé. Al hervir, incorporar las albóndigas. Dejar cocer durante veinte minutos más, a fuego lento. La receta alcanza para 8 raciones.', 1, 'files/1493828839albondigas.jpg'),
(14, 'Asado en vino', 19, '1 kilo lomo de cerdo, en trozos\r\n1/4 kilo papas cocidas\r\n150 g ciruela\r\n1/2 taza de crema\r\n1 taza de leche\r\n1 taza de vinagre\r\n1/2 botella de vino blanco\r\n1 cucharada de azúcar\r\n1 cucharadita de mostaza\r\n1 cucharadita de tomillo\r\n6 soletas\r\n4 dientes de ajo\r\n3 betabeles cocidos\r\n3 jitomates asados (molidos con una cebolla y colados)\r\n2 hojas de laurel\r\nchiles jalapeños\r\npimienta\r\nsal\r\nPara preparar asado en vino blanco hay que freír el lomo. Agregarle un poco de agua, vinagre y vino blanco, las ciruelas deshuesadas, laurel, ajos, tomillo, azúcar, sal y dejarlo hervir a fuego suave. Ya que esté blanda la carne y se haya resecado un poco el agua, sacar los ajos y las hojas de laurel; agregar el jitomate colado, desmoronar las soletas e incorporarlas para formar una salsa, no muy espesa. Dejar hervir otro rato y retirar de la lumbre. Servir con la siguiente ensalada: papas y betabeles (cocidos y picados), sal, pimienta, chiles jalapeños (picados), un poco del vinagre de los chiles, crema, leche y una cucharadita de mostaza. La receta alcanza para 8 raciones.', 1, 'files/1493828888asadobino.jpg'),
(15, 'SOPA TARASCA', 20, '...\r\nINGREDIENTES\r\n6 cucharadas de aceite de maíz\r\n1 cebolla grande picada finamente\r\n2 dientes de ajo grandes picados finamente\r\n1 lata de 1 kilo de puré de jitomate\r\n2 litros de agua\r\n4 hojas de laurel\r\n2 ramitas de tomillo\r\n2 ramitas de mejorana\r\n4 cucharadas de caldo de pollo en polvo\r\n1 cucharadita de pimienta negra recién molida\r\n6 chiles anchos despepitados, cortados en tiras y fritos (en Michoacán se les\r\nlama \"Pasilla\")\r\n10 tortillas cortadas en tiritas y fritas\r\n350 gramos de queso fresco cortado en tiras\r\n¼ de litro de crema espesa\r\nEpazote picado al gusto\r\nPREPARACIÓN\r\nEn el aceite caliente se acitronan la cebolla y el ajo, se añade el puré de jitomate y se fríe hasta que esté \"chinito\", se agrega entonces el agua, el caldo, las hierbas de olor y la pimienta. Se deja hervir 10 minutos. Se toma un poco de caldillo y con él se licúan dos chiles fritos y una tortilla frita, se vierten en la sopa hirviendo y se deja hervir a fuego lento 5 minutos más.\r\nPRESENTACIÓN\r\nEn platos soperos individuales con la tortilla frita, las tiritas de chile frito, las tiritas de queso, una cucharada de crema y epazote picado al gusto. Sirve y disfruta de tu Sopa Tarasca, platillo de Michoacán.\r\n\r\n', 1, 'files/1493829130tarasca.jpg'),
(16, 'Morisqueta', 20, '....\r\nINGREDIENTES\r\n1 kilo carne de cerdo\r\n1/2 kilo jitomate\r\n2 tazas de agua con sal\r\n1 taza de arroz entero, limpio\r\n6 chiles serranos, verdes\r\n2 cebollas\r\n1 ajo\r\nPara preparar morisqueta hay que poner en un recipiente el agua con sal; cuando hierva, agregar el arroz y bajar la flama hasta que el grano se cueza. Poner la carne de cerdo en una sartén con agua suficiente para que la cubra y sal, hasta que se cueza y se consuma el agua. Se fríe. Aparte, moler los jitomates con las cebollas, ajo, chiles y agregar a la carne (con este guiso se acompaña la morisqueta). Se sirve muy caliente. La receta alcanza para 6 raciones.\r\n', 1, 'files/1493829159morisqueta.jpg'),
(17, 'Aporreadillo Michoacano', 20, 'INGREDIENTES\r\n1/2 kilo de cecina\r\n3 huevos\r\n100 gramos de chile pasilla\r\n1/2 kilo de tomate verde\r\n\r\nSe escoge la cecina poco grasosa, se dora a fuego lento hasta que quiebre, se machaca y se pone a freir, se le agrega el chile molido, junco con el tomate cocido y se deja hervir bastante. Cuando está bien seca se agregan huevos cortados y se revuelven rápidamente.\r\nY para acompañar este platillo un buen mezcal Los Danzantes Reposado que se distingue por su escencia al dulce de frutas cocidas y especias. Para el comienzo y final de del disfrute de este platillo', 1, 'files/1493829186aporreadillo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas_calificacion`
--

CREATE TABLE `recetas_calificacion` (
  `id` int(11) NOT NULL,
  `receta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas_calificacion`
--

INSERT INTO `recetas_calificacion` (`id`, `receta_id`, `usuario_id`, `calificacion`) VALUES
(18, 2, 5, 5),
(19, 6, 5, 2),
(20, 7, 5, 3),
(21, 9, 5, 4),
(22, 2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil_id` bigint(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `perfil_id`, `email`) VALUES
(3, 'sudogaryi', 'e178f759fe55c8c9596f2202060dc7dd', 1, 'hi.ed@hotmail.com'),
(5, 'webmaster', '50a9c7dbf0fa09e8969978317dca12e8', 2, 'xbox_live@live.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `baules`
--
ALTER TABLE `baules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas_calificacion`
--
ALTER TABLE `recetas_calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `baules`
--
ALTER TABLE `baules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `recetas_calificacion`
--
ALTER TABLE `recetas_calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
