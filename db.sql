-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 04, 2020 at 07:04 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fulltechPwad`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `popup` text,
  `technology` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`id`, `title`, `userId`, `categoryId`, `description`, `popup`, `technology`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Archer-C8', 1, 0, '<ul><li>Soporta estándar 802.11ac - próxima generación de Wi-Fi</li><li>Conexiones simultáneas de 2,4 GHz a 450 Mbps y 5 GHz 1300Mbps para 1.75Gbps de banda ancha total disponible</li><li>3 antenas desmontables de doble banda proporcionan la máxima cobertura inalámbrica omnidireccional y fiabilidad</li><li>La tecnología Beamforming ofrece una conexión inalámbrica de alta eficiencia</li><li>USB 3.0 + puertos USB 2.0 - Permite compartir fácilmente una impresora local, los archivos y los medios de comunicación con los dispositivos en red o de forma remota a través de un servidor FTPs</li></ul>', 'poparchr', 'Archer C8', 'Archer-C8-01.jpg', 1, 1, '2019-08-25 19:26:22'),
(2, 'Extensor de Rango Inalámbrico N 300Mbps', 1, 0, '<ul><li>El modo de Extensor de Rango mejora la señal inalámbrica a áreas anteriormente inalcanzables o difíciles de cablear a la perfección</li><li>El Diseño en Miniatura y montado en la pared lo hace fácil de usar y de mover de una manera más flexible</li><li>Expande fácilmente la cobertura inalámbrica con sólo presionar el botón de Extensor de Rango</li><li>El puerto Ethernet permite que el Extensor funcione como un adaptador inalámbrico para conectar los dispositivos cableados</li></ul>', 'popext', 'TL-WA850RE3', 'TL-WA850RE3-fulltechnology.jpg', 1, 1, '2019-08-25 19:27:09'),
(3, 'Wireless Access Point, AirPremier 11g/11n, Indoor, PoE, 300Mbps', 1, 0, '<p>El Access Point D-Link DAP-2360 PoE AirPremier N ofrece a las empresas una solución para implementar 802.11n de nueva generación en redes de área local (LAN). Diseñado específicamente para entornos de clase empresarial, como las grandes corporaciones o empresas, este punto de acceso ofrece seguras y manejables opciones de LAN inalámbrica para los administradores de red.</p>', 'poprept', 'DAP2360A', 'DAP2360A-fulltechnology.jpg', 1, 1, '2019-08-25 19:29:41'),
(4, 'Wireless N Dual‑Band PoE Outdoor Access Point', 1, 0, '<ul><li>Ideal para implementaciones Exterior en entornos de clase empresarial.</li><li>Conectividad doble banda seleccionable para el Fortalecimiento Red Mayor,IEEE 802.11n.</li><li>Operable como Access Point, WDS / Bridge, WDS con access point o cliente inalámbrico.</li><li>Compatible con 802.3 af Power over Ethernet para una fácil instalación.</li><li>El tiempo nominal de la caja IP65 resistente.</li><li>Funciones de seguridad de confianza, incluido WPA2 Empresarial / Personal.</li></ul>', 'popwriln', 'DAP3520', 'DAP3520-fulltechnology.jpg', 1, 1, '2019-08-25 21:26:08'),
(5, 'DLINK DGE-528T GIGABIT PCI DESKTOP ADAPTOR', 1, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sit doloremque delectus provident labore quos assumenda animi cum fugit. Pariatur maiores tempore provident, amet vitae necessitatibus aut. Assumenda cumque magni porro? Qui rerum porro recusandae, hic perspiciatis iusto sed adipisci ex eveniet alias non, aspernatur, earum voluptate tempora voluptatem exercitationem!</p>', 'poptarj', 'DGE528T', 'DGE528TC-fulltechnology.jpg', 1, 1, '2019-08-25 21:44:36'),
(10, 'Repetidor Wi‑Fi Portátil con batería', 1, 0, '<p><strong>Comparta su conexión a Internet por WiFi</strong> Amplíe y transforme cualquier conexión a internet en un punto de acceso WiFi&nbsp;<br><strong>Su propia nube personal móvil</strong> Acceda desde iPhone/iPad/Android al contenido almacenado en su disco duro o llave USB con la aplicación gratuita D-Link Shareport Mobile&nbsp;<br><br><strong>Amplíe el alcance de su red</strong> Amplifique la señal WiFi de su router para tener cobertura en todos los rincones de su hogar.&nbsp;<br><br><strong>Cargador de móvil</strong> Permite recargar su teléfono iPhone® o Android™<br><br><strong>Auténtica portabilidad</strong> La batería recargable con una autonomía de hasta 4 horas y la alimentación mini-USB opcional ofrecen la libertad para disfrutar de las prestaciones del DIR-506L allá donde se encuentre.!</p>', 'poprop', 'DIR506L', 'DIR506L-fulltechnology.jpg', 1, 1, '2019-08-25 22:00:30'),
(11, 'Router Inalámbrico', 1, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam excepturi doloremque architecto qui maxime ex ut quaerat, cum omnis ad quo hic aperiam ab magni, assumenda, fugiat voluptatem rerum. Ipsum omnis voluptate qui nemo illum pariatur nihil doloremque, velit, delectus dolor debitis, praesentium porro. Ratione eveniet libero quidem modi magni.</p>', 'popdir6', 'DIR600', 'DIR600-fulltechnology1.jpg', 1, 1, '2019-08-25 22:00:48'),
(12, 'Router inalámbrico de 150Mbps con 4 puertos de red 10/100Mbps', 1, 0, '<p>DIR-610 de D-Link es un router inalámbrico basado en la tecnología 11N, el estándar más reciente para la transmisión inalámbrica de datos, permite compartir el acceso a Internet en el hogar con una velocidad de hasta 150 Mbps. De esta manera, el equipo puede crear una red inalámbrica de alta velocidad y sigue siendo compatible con el estándar anterior 802.11g.&nbsp;<br><br>El router DIR-610 también incorpora la función WDS, con la que puede expandir la señal inalámbrica generada desde otro router, funcionando como un puente. El router DIR-610 se conecta a través de un cable o de un módem a Internet, y una vez enchufado permite crear una red inalámbrica interna donde la familia puede compartir fotos, videos y otros documentos. Este dispositivo incorpora NAT (Network Adress Translation), que permite que múltiples usuarios se conecten compartiendo la misma IP.</p>', 'pop610', 'DIR610A', 'DIR610A-fulltechnology.jpg', 1, 1, '2019-08-25 22:06:56'),
(13, 'Router inalámbrico', 1, 0, '<p>El gateway inalámbrico Gigabit N DIR-655 de D-Link es un dispositivo acorde con 802.11n que ofrece un rendimiento real más rápido, de hasta el 650 %, que una conexión inalámbrica 802.11g y también que una Ethernet* de cable a 100 Mbps. Al conectar el gateway DIR-655 a un módem DSL o de cable, los usuarios podrán compartir su acceso a internet de alta velocidad con cualquiera que esté en la red, así como crear una red inalámbrica segura para compartir fotos, archivos, música, vídeo, impresoras y almacenamiento de red por toda la casa.&nbsp;<br><br>El DIR-655 cuenta con el procesador más rápido de la gama Wireless N, que logra incluso un rendimiento más alto entre redes WAN y LAN.&nbsp;<br><br>Combinado con el galardonado QoS StreamEngine, el DIR-655 permite tener una mejor experiencia en internet puesto que las llamadas telefónicas por internet y los juegos en línea se desarrollan perfectamente. Además, el gateway incluye cuatro puertos switch Gigabit Ethernet para las más altas velocidades de transmisión a otros dispositivos Gigabit, como almacenamiento conectado a la red.</p>', 'pop655', 'DIR655', 'DIR655-fulltechnology.jpg', 1, 1, '2019-08-25 22:12:02'),
(14, 'Router Wireless D-link Dir-803 Dual Band Ac750', 1, 0, '<p>El Router DIR-803 Wireless AC750 Dual Band de D-Link es una potente y asequible solución inalámbrica que combina la última especificación Wi-Fi de alta velocidad 802.11ac con tecnología Dual Band y puertos Fast Ethernet para ofrecer una experiencia de red sin problemas. El mayor alcance y fiabilidad de la tecnología Wireless AC llega más lejos en su casa, y las características de seguridad avanzadas del DIR-803 mantienen su red y los datos a salvo de los intrusos.&nbsp;<br><br>El Router DIR-803 Wireless AC750 Dual Band de D-Link ofrece red inalámbrica Dual Band, que le permite operar dos bandas de alta velocidad concurrentes Wi-Fi para un rendimiento inalámbrico máximo. Navegar por la web, chatear y jugar juegos en línea en la banda de 2,4 GHz, mientras se difunde simultáneamente multimedia en la banda de 5 GHz. Lo que es más, cada banda puede funcionar como una red Wi-Fi independiente, que le da la posibilidad de personalizar su red de acuerdo a sus necesidades de conectividad. Incluso puede configurar una zona de invitados para dar a los visitantes el acceso a Internet sin darles acceso al resto de la red.</p>', 'poprod', 'DIR803DUAL', 'DIR803DUAL-fulltechnology.jpg', 1, 1, '2019-08-25 22:27:08'),
(15, 'Router Inalámbrico D-Link Wireless 11N, con velocidad de hasta 150 Mbps DIR-600', 1, 0, '<ul><li>Recepción inalámbrica mejorada y cobertura con base en la tecnología 802.11n.</li><li>Mejor Tecnología inalámbrica - hasta 4 veces más rápido que el estándar 802.11g.</li><li>Conectar un ordenador portátil o PC de sobremesa a una red inalámbrica.</li><li>Fácil de usar características de seguridad inalámbrica con protección de firewall activo.</li></ul>', 'pop900', 'DIR900', 'DIR900-fulltechnology.jpg', 1, 1, '2019-08-25 22:27:19'),
(16, 'Router Inalámbrico', 1, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam earum quasi necessitatibus, reiciendis, deserunt iusto. Aut ut voluptate minima, possimus molestiae earum enim maxime. Ullam, voluptates doloremque? Maiores quas qui, minus esse labore illum est. Quam accusantium, delectus odit, vel tempore magnam eius quaerat debitis cum distinctio inventore non assumenda?</p>', 'pop506L', 'DPR506L', 'DPR506L-fulltechnology.jpg', 1, 1, '2019-08-25 22:42:26'),
(17, 'Cámara Inalámbrica', 1, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam earum quasi necessitatibus, reiciendis, deserunt iusto. Aut ut voluptate minima, possimus molestiae earum enim maxime. Ullam, voluptates doloremque? Maiores quas qui, minus esse labore illum est. Quam accusantium, delectus odit, vel tempore magnam eius quaerat debitis cum distinctio inventore non assumenda?</p>', 'popcam1', 'DSC5635', 'DSC5635-fulltechnology.jpg', 1, 1, '2019-08-25 22:43:05'),
(18, 'Cámara iP Alámbrica', 1, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam earum quasi necessitatibus, reiciendis, deserunt iusto. Aut ut voluptate minima, possimus molestiae earum enim maxime. Ullam, voluptates doloremque? Maiores quas qui, minus esse labore illum est. Quam accusantium, delectus odit, vel tempore magnam eius quaerat debitis cum distinctio inventore non assumenda?</p>', 'popcamip', 'DSC6113', 'DSC6113-fulltechnology.jpg', 1, 1, '2019-08-25 22:43:48'),
(19, 'Tarjeta Inalámbrica USB', 1, 0, '<ul><li>Next Generation Wireless Technology – Wireless AC1200 for seamless gaming, smooth HD video streaming and fast file transfers</li><li>Dual Band Performance – Up to 300Mbps (2.4GHz) or 867Mbps (5GHz) to deliver fast wireless speeds and less interference for maximum throughput</li><li>USB 3.0 – Provides cutting-edge connectivity and performance (C1 Revision Only)</li><li>Backward Compatibility – Compatible with existing Wi-Fi routers and range extenders</li><li>Simple Setup – WPS Push Button for easy connection to your wireless network</li></ul>', 'poptarjs', 'DWA182EU', 'DWA182EU-fulltechnology.jpg', 1, 1, '2019-08-25 22:44:29'),
(20, 'Access Point', 1, 0, '<p>El D-Link DWL-2700AP es un punto de acceso inalámbrico para soluciones Wireless de exteriores. El DWL2700AP perteneciente a la familia D-Link AirPremier y compatible con el estándar IEEE802.11b/g. El punto de acceso DWL-2700AP da cobertura inalámbrica de hasta 54Mbps a grandes distancias, permitiendo implementar soluciones de acceso inalámbrico outdoor como los conocidos Hotspots, y facilitando de esta forma el enlace y la comunicación a usuarios móviles, a Internet o a redes privadas.&nbsp;<br><br>El DWL-2700AP es una solución ideal para proveedores de servicios de comunicaciones de Banda Ancha y para medianas y grandes empresas. También integra un servidor DHCP que asigna automáticamente las direcciones IP a los usuarios sin necesidad de ningún tipo de cable.<br><br>El DWL-2700AP ofrece una gran seguridad con encriptación WEP de 152bits, AES (Advanced Encryption Standard)* y WPA (Wi-FiTM Protected Access), así como estádar 802.1x para la autentificación de usuarios.</p>', 'popaccs', 'DWL2700AP', 'DWL2700AP-fulltechnology.jpg', 1, 1, '2019-08-25 22:45:06'),
(21, 'Access Point Poe D-link Dwl-8600ap Unified 802.11n Dualband', 1, 0, '<p>Access point con soporte PoE y gestionable vía wireless switch. El DWL-8600AP AirPremier de D-Link es un access point inalámbrico básico creado para ser usado junto con el wireless switch DWS-4026 en entornos empresariales.&nbsp;<br><br>Este punto de acceso, diseñado para su instalación en interiores, ofrece opciones seguras para que los administradores de red desarrollen una red inalámbrica sumamente robusta y muy gestionable. El DWL-8600AP soporta Power over Ethernet (PoE) y proporciona cuatro antenas de alta ganancia para una cobertura inalámbrica óptima.<br><br>El punto de acceso se controla totalmente desde el wireless switch, es decir, los datos de configuración no se mantienen al nivel del punto de acceso, lo que añade una capa de protección en caso de robo o vandalismo.<br><br>El DWL-8600AP soporta la encriptación de datos WEP 64/128/152-bit, seguridad WPA/WPA2 y varios SSID. Desde el wireless switch se puede configurar el filtrado de direcciones MAC y deshabilitar la difusión del SSID para establecer la seguridad y limitar el acceso de intrusos a la red interna. El DWL-8600AP soporta VLAN Tagging 802.1Q y WMM (Wi-Fi Multimedia) para las transmisiones inalámbricas importantes, como aplicaciones de VoIP de streaming media, con lo que se ofrecen servicios críticos para el usuario, como la entrega priorizada del tráfico de voz.</p>', 'popaccp', 'DWL8600', 'DWL8600-fulltechnology.jpg', 1, 1, '2019-08-25 22:45:52'),
(22, '2-Port USB KVM Switch', 1, 0, '<p>El KVM-222 de 2 puertos permite controlar dos PC desde un solo teclado, mouse y monitor VGA. El audio también es compatible, permitiendo que las dos PC conectadas compartan un conjunto de altavoces a través de un conector estéreo estándar de 3.5 mm.</p>', 'popcab', 'KVM222', 'KVM222-fulltechnology.jpg', 1, 1, '2019-08-25 22:46:27'),
(23, 'ADSL2+ Modem', 1, 0, '<ul><li>Proporciona acceso a Internet a través del servicio ADSL.</li><li>Funciona con los últimos estándares ADSL: hasta 24 Mbps de rendimiento superior.</li><li>El Firewall integrado lo protege contra ataques de Internet.</li></ul>', 'popmodm', 'modem', 'TD8616-fulltechnology.jpg', 1, 1, '2019-08-25 22:47:05'),
(24, 'Modem Router ADSL2 + Inalámbrico N a 300Mbps', 1, 0, '<ul><li>Módem ADSL 2/2+, Punto de Acceso Inalámbrico y Router de 4 puertos, en un único dispositivo</li><li>Velocidad inalámbrica N de hasta 300 Mbps es ideal para el consumo de ancho de banda pesada o interrupción de las aplicaciones sensibles como los juegos en línea, las llamadas por Internet e incluso el vídeo HD streaming</li><li>Asistente de Configuración con soporte multi-idioma ofrece una instalación rápida y sin complicaciones</li><li>Fácil con un solo toque de encriptación inalámbrica de seguridad con el botón de seguridad de configuración rápida.</li></ul>', 'popmodads', 'TD-W8961ND', 'TDW861N-fulltechnology.jpg', 1, 1, '2019-08-25 22:47:47'),
(25, 'Router Inalámbrico', 1, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat nesciunt dolorum ratione odio ducimus id amet quae, animi placeat consequatur vero sint quis officia, maiores, cumque sapiente, esse natus officiis sequi? Saepe totam minus incidunt rem. Corporis nam doloremque, quaerat assumenda veniam dolor, tempora, magnam impedit facilis ad deserunt repellendus!</p>', 'popro', 'TL3420M', 'TL3420M-fulltechnology.jpg', 1, 1, '2019-08-25 22:48:33'),
(26, 'Servidor de impresión y almacenamiento USB 2.0', 1, 0, '<ul><li>Elevada compatibilidad: Compatible con la mayoría de dispositivos USB del mercado</li><li>Fácil de utilizar: configuración sencilla a través de un asistente de instalación con tan solo unos clics de ratón</li><li>Funcionalidad ampliable: comparta hasta 4 dispositivos USB conectándolos a un hub USB</li></ul>', 'popserv', 'TLPS310U', 'TLPS310U-fulltechnology.jpg', 1, 1, '2019-08-25 22:49:31'),
(27, 'Router Inalámbrico N 300Mbps', 1, 0, '<ul><li>300Mbps wireless speed ideal for interruption sensitive applications like HD video streaming</li><li>Three antennas greatly increase the wireless robustness and stability</li><li>Easy wireless security encryption at a push of WPS button</li><li>IP based bandwidth control allows administrators to determine how much bandwidth is allotted to each PC</li><li>Compatible with IPv6 -the more recent Internet Protocol version</li><li>TP-LINK Tether App allows quick installation and easy management using any mobile device</li></ul>', 'poprout300', 'TLWR845N', 'TLWR845N-fulltechnology.jpg', 1, 1, '2019-08-25 22:50:18'),
(28, 'Router inalámbrico N 450Mbps', 1, 0, '<ul><li>Velocidad inalámbrica ideal de 450 Mbps para las aplicaciones sensibles como la interrupción de difusión de video HD</li><li>&nbsp;</li><li>Tres antenas inalámbricas incrementan la red robusta y estabilidad</li><li>&nbsp;</li><li>Encriptado fácil de la seguridad inalámbrica sólo presionando el botón QSS</li><li>&nbsp;</li><li>Control de ancho de banda basado en IP permite a los administradores determinar la cantidad de ancho de banda asignado a cada PC</li><li>&nbsp;</li><li>*la velocidad inalámbrica 450Mbps es solamente paa el TL-WR940N V3 mientras que las versiones anteriores son 300Mbps.</li></ul>', 'popro450', 'TLWR940N', 'TLWR940N-fulltechnology.jpg', 1, 1, '2019-08-25 22:50:55'),
(29, 'Router de Alta Potencia de hasta 450Mbps', 1, 0, '<ul><li>Rango Superior de hasta*2 900m2. Con un hardware actualizado, el TL-WR941HP supera fácilmente el rendimiento de los routers normales.</li><li>La señal que emite el TL-WR941HP permanece intensa, incluso cuando ha atravesado varios obstáculos eliminando puntos muertos.</li><li>Además de funcionar como un router, el TL-WR941HP tiene la capacidad para trabajar en el modo Extensor de Rango o modo Acces Point.</li><li>Velocidad de 450 Mbps ideal para video en Streaming, juegos en línea y VoIP.</li></ul>', 'popro4503', 'TLWR941HP', 'TLWR941HP-fulltechnology.jpg', 1, 1, '2019-08-25 22:51:40'),
(30, 'Router Inalámbrico N 450mbps Tp-link Tl-wr945n 3 Antenas', 1, 0, '<p>Un Cuerpo de Acero de Potencia y Precisión Las curvas suaves y la elegancia metálica de la TL-WR945N están hechas de aleación de aluminio. Esto se logró gracias a una nueva proeza de diseño industrial: un proceso de anodización y pulido de nueve pasos muy preciso. A través de una máquina CNC de alta precisión de precisión de 0,1 mm, el TL-WR945N nació.&nbsp;<br><br>450Mbps Wi-Fi - Ideal para aplicaciones sensibles a interrupciones como streaming de video HD Exterior metálico - Un acabado exterior de acero previene la interferencia externa para crear una experiencia de red confiable en general<br><br>Cobertura Superior - Tres antenas externas aumentan la señal omnidireccional estable<br><br>TP-Link Tether App - Fácil acceso y administración de su red usando cualquier dispositivo móvil iOS o Android WPS - Amplíe fácilmente la cobertura inalámbrica con un solo clic del botón WPS.</p>', 'poprout3', 'TLWR945N', 'TLWR945N-fulltechnology.jpg', 1, 1, '2019-08-25 22:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `bancuadrados`
--

CREATE TABLE `bancuadrados` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bancuadrados`
--

INSERT INTO `bancuadrados` (`id`, `image`, `titulo`, `target`, `enlace`, `is_active`, `created_at`) VALUES
(2, 'banner.jpg', 'PRF Group', '_blank', 'http://www.prfgroup.net/', 1, '2019-12-18 01:58:15'),
(3, 'banner-mito.jpg', 'contacto SVCBMF', '_self', 'contacto', 1, '2019-12-18 02:06:08'),
(4, 'banner-mels.jpg', 'errr', '_self', 'ghfkhg', 1, '2020-02-27 00:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `banhorizontals`
--

CREATE TABLE `banhorizontals` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banhorizontals`
--

INSERT INTO `banhorizontals` (`id`, `image`, `titulo`, `target`, `enlace`, `is_active`, `created_at`) VALUES
(1, 'bannerH-mels.jpg', 'junta svcbmf', '_blank', 'https://google.com', 1, '2018-10-30 10:14:15'),
(2, 'bannerH-Mito.jpg', 'directorio svcbmf', '_blank', 'https://facebook.com', 1, '2019-12-18 02:13:26'),
(3, 'bannerH.jpg', 'publicidad', '_blank', 'https://instagram.com', 1, '2019-12-21 00:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `banverticals`
--

CREATE TABLE `banverticals` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banverticals`
--

INSERT INTO `banverticals` (`id`, `image`, `titulo`, `target`, `enlace`, `is_active`, `created_at`) VALUES
(3, 'bannerR1.jpg', 'publicidad svcbmf', '_self', 'contacto', 1, '2019-12-18 02:29:19'),
(4, 'bannVPRF.jpg', 'PRF Group', '_blank', 'http://www.prfgroup.net/', 1, '2019-12-18 02:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `userId`, `categoryId`, `description`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Sample blog post 1', 1, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img1.jpg', 1, 1, '2018-10-27 04:12:09'),
(2, 'Sample blog post 2', 1, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img2.jpg', 1, 1, '2018-10-27 06:12:09'),
(3, 'Sample blog post 3', 1, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img3.jpg', 0, 1, '2018-10-27 07:12:09'),
(4, 'Sample blog post 4', 1, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img4.jpg', 0, 1, '2018-10-27 09:12:09'),
(5, 'Sample blog post 5', 1, 7, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img5.jpg', 1, 1, '2018-10-27 10:12:09'),
(6, 'Sample blog post 6', 1, 7, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img6.jpg', 0, 1, '2018-10-27 12:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Grafico'),
(2, 'Webhtml5'),
(3, 'WebApp'),
(4, 'WAP'),
(5, 'Wordpress'),
(6, 'PhpMySql'),
(7, 'Mailmarketing');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `lastname`, `email`, `phone`, `message`, `createdAt`) VALUES
(1, 'Malcolm', 'Cordova', 'mercadocreativo@gmail.com', '9999999999', 'This is test message', '2018-10-30 10:14:15'),
(2, 'Malcolm', 'Cordova', 'mercadocreativo@gmail.com', '4241874370', 'prueba', '2019-07-25 22:57:00'),
(3, 'Malcolm', NULL, 'mercadocreativo@gmail.com', '4241874370', 'dfds', '2019-08-17 22:39:25'),
(4, 'prueba', 'prueab', 'prueba@prueba.com', '2123', 'esto es una prueba', '2020-02-26 00:00:00'),
(5, 'prueba', 'prueab', 'prueba@prueba.com', '2123', 'esto es una prueba', '2020-02-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `destacados`
--

CREATE TABLE `destacados` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `technology` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destacados`
--

INSERT INTO `destacados` (`id`, `title`, `userId`, `categoryId`, `description`, `technology`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Extensor de Rango Inalámbrico N 300Mbps', 1, 1, '<p>a</p>', 'TL-WA850RE', 'Archer-C8-02.png', 1, 1, '2018-10-27 04:12:09'),
(2, 'Router Inalámbrico Banda Dual Gigabit AC1750', 1, 0, '<p>das</p>', 'Archer C8', 'Archer-C8-01.png', 1, 1, '2019-08-25 19:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `token`, `image`, `isActive`, `createdAt`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mercadocreativo', NULL, 'a1aed1a77c0916c43a4a67afe49af265', 'img2.jpg', 1, '2018-10-27 05:25:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bancuadrados`
--
ALTER TABLE `bancuadrados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banhorizontals`
--
ALTER TABLE `banhorizontals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banverticals`
--
ALTER TABLE `banverticals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bancuadrados`
--
ALTER TABLE `bancuadrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banhorizontals`
--
ALTER TABLE `banhorizontals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banverticals`
--
ALTER TABLE `banverticals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
