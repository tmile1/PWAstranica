-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 05:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stranica`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'admin', '$2y$10$U9abtx8aQS0GaTZ4s.3/9ewwoabKSGca0Kd/RMpVu40Fi0GucGOSS', 1),
(2, 'user', '$2y$10$6IUag0OcxUNqmkwKzneeSeFZFSNROEr9uweel5kgH591V6qq89icu', 0),
(6, 'user1', '$2y$10$QBeNc.RluEsIwBH7KJTYJuT7AH0rcWx3yLKhv3SwmJlCR2HK5ykEm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `kategorija` varchar(20) DEFAULT NULL,
  `arhiva` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2025-06-19', 'Max Verstappen četvrti naslov', 'Max Verstappen osvojio je svoju četvrtu uzastopnu titulu 2024. godine.', 'Verstappen je i 2024. bio nezaustavljiv. S više od 15 pobjeda tijekom sezone, Max je s lakoćom osigurao naslov prvaka i dodatno učvrstio svoje mjesto u povijesti F1. Red Bullov RB20 bio je gotovo bez premca, a Verstappen je vožnjama pokazivao zrelost, kontrolu i brzinu u svakoj situaciji. Kritičari su govorili o monotoniji, ali Verstappenov stil i konzistentnost fasciniraju i one koji nisu navijači Red Bulla. Pitanje više nije hoće li osvojiti još jedan naslov, već koliko ih još može.', 'max_verstappen.jpg', 'vozači', 0),
(2, '2025-06-19', 'Lewis Hamilton zatvaranje ere', 'Lewis Hamilton završio je svoju zadnju sezonu s Mercedesom 2024. i prelazi u Ferrari za sezonu 2025', 'Nakon više od desetljeća s Mercedesom, Lewis Hamilton je završio jednu od najuspješnijih suradnji u povijesti F1. Iako nije uspio osvojiti osmi naslov, 2024. je pokazao da još uvijek ima brzinu i motivaciju. Hamilton je objavio prelazak u Ferrari ranije tijekom sezone, što je šokiralo mnoge. No, ljubav prema talijanskom timu i izazov vraćanja Ferrarija na vrh bili su presudni faktori. Emocije su bile snažne na njegovoj posljednjoj utrci s Mercedesom, dok fanovi širom svijeta čekaju njegov debi u crvenom bolidu 2025.', 'lewis_hamilton.webp', 'vozači', 0),
(3, '2025-06-19', 'Lando Norris – Prva pobjeda', 'Lando Norris je 2024. napokon ostvario svoju prvu pobjedu u Formuli 1 u Miamiju.', 'Dugo je trajalo, ali Norris je napokon stao na najvišu stepenicu pobjedničkog postolja 2024. godine. Njegova prva pobjeda došla je nakon nekoliko blistavih vožnji i konstantnog napretka McLarenovog bolida. Lando je tijekom sezone imao više postolja, često bio najbliži Verstappenu i konačno se etablirao kao vođa nove generacije. Fanovi ga vole zbog iskrenosti, humora i iskonske vozačke vještine, a 2025. bi mogao biti prava prilika za borbu za naslov.\r\n\r\n', 'lando-norris.webp', 'vozači', 0),
(5, '2025-06-19', 'Ferrari promjene i nove nade', 'Ferrari završava 2024. u usponu, ali pravi izazov slijedi 2025. s dolaskom Lewisa Hamiltona.', 'Ferrari je u 2024. imao bolje performanse nego prethodnih godina, a Charles Leclerc je imao više pole positiona nego bilo koji drugi vozač osim Verstappena. Carlos Sainz je osvajao bodove i donosio podije. No, prava priča godine bila je najava dolaska Lewisa Hamiltona. Tim iz Maranella konačno želi prekinuti sušu titula koja traje od 2008. Pitanje više nije jesu li spremni, nego hoće li Hamilton donijeti ono što nedostaje.', 'Ferrari.jpg', 'teamovi', 0),
(6, '2025-06-19', 'Mercedes zatvaranje jedne ere', 'Mercedes je 2024. završio bez naslova, ali s pripremama za novu eru s novim mladim vozačem.', 'Odlazak Hamiltona označava kraj jedne ere. Mercedes je imao izazovnu 2024., s nekonzistentnim performansama i problemima u balansu bolida. George Russell pokazao je brzinu, ali i frustraciju. Sada je na timu da pronađe novog partnera Russellu – mogući su Esteban Ocon, Kimi Antonelli ili čak Sainz. Tehnički odjel radi punom parom na bolidu za 2025., znajući da je za povratak na vrh potrebno više od talenta – potrebna je strategija, stabilnost i nova vizija.', 'Mercedes.jpg', 'teamovi', 0),
(7, '2025-06-19', 'McLaren povratak konkurencije', 'McLaren je 2024. potvrdio svoj veliki povratak među najbolje timove.', 'Sezona 2024. bila je prekretnica za McLaren. Tim je nadogradio uspjeh iz 2023., donio efikasne nadogradnje i napravio iskorak ka stalnom vrhu. Lando Norris je ostvario svoju prvu pobjedu, dok je Oscar Piastri pokazao izniman napredak i zrelost. Tehnički tim pod vodstvom Andrea Stelle stvorio je bolid kojim je uspio osvojiti naslov konstruktora. Ako ovakav napredak nastavi, McLaren 2025. ulazi kao jedan od favorita za naslov u oba prvenstva.', 'Mclaren.jpg', 'teamovi', 0),
(8, '2025-06-19', 'Red Bull gubitak dominacije', 'Red Bull je osvojio vozački naslov, no tim je pao na treće mjesto u konstruktorskom poretku', 'Sezona 2024. bila je kontrast za Red Bull Racing – dok je Max Verstappen impresivno osvojio svoju četvrtu uzastopnu titulu, tim je izgubio konstruktorski naslov, završivši tek na trećem mjestu, iza McLarena i Ferrarija. Glavni razlog za pad bio je niz loših rezultata i sudara Sergija Péreza, koji nije uspijevao pratiti tempo vodećih, često završavajući izvan bodova ili u barijerama.\r\n\r\nTehnička izvrsnost dizajna Adriana Neweya ostala je očita, ali nedostatak ravnoteže u performansama oba vozača pokazao se skupim. Red Bull više nije tim koji diktira tempo — sad je lovac, a ne plijen. Ulazak u 2025. označava prijelaznu fazu: Verstappen je i dalje najbolji vozač svijeta, ali Red Bull mora odlučiti što dalje s vozačkom postavom i kako ponovno postati prvak među timovima.\r\n\r\n', 'Red_bull.jpg', 'teamovi', 0),
(9, '2025-06-19', 'Sainz zadnja sezona u crvenom', 'Carlos Sainz završio je sezonu 2024. kao vozač Ferrarija, a dolazak Hamiltona znači oproštaj.', 'Iako je Sainz jedini vozač osim Verstappena koji je uzeo pobjedu 2023. i ponovio dobre nastupe 2024., Ferrari je odlučio zamijeniti ga s Lewisom Hamiltonom. Carlos je dostojanstveno odradio svoju posljednju sezonu u crvenom, često bio konkurentan i pomagao timu kad je bilo najpotrebnije. Još uvijek nije službeno objavljeno gdje će voziti 2025., ali interes postoji – od Saubera do Williamsa. Njegovo vrijeme u Ferrariju završava, ali karijera daleko od toga.', 'carlos_sainz.webp', 'vozači', 0),
(25, '2025-06-20', 'Primjer1', 'primjer1primjer1', 'asddasdsadsadasdasdsadasdasdasd', 'max_verstappen.jpg', 'vozači', 1),
(26, '2025-06-20', 'Primjer2', 'Primjer2Primjer2', 'Primjer2Primjer2Primjer2Primjer2', 'max_verstappen.jpg', 'vozači', 1),
(27, '2025-06-20', 'Primjer3', 'Primjer3Primjer3', 'Primjer3Primjer3Primjer3', 'max_verstappen.jpg', 'vozači', 1),
(28, '2025-06-20', 'Primjer4', 'Primjer4Primjer4', 'Primjer4Primjer4Primjer4Primjer4', 'max_verstappen.jpg', 'vozači', 1),
(29, '2025-06-20', 'Primjer5', 'Primjer5Primjer5', 'Primjer5Primjer5Primjer5Primjer5', 'max_verstappen.jpg', 'vozači', 1),
(30, '2025-06-20', 'Primjer6', 'Primjer6Primjer6', 'Primjer6Primjer6Primjer6Primjer6', 'Ferrari.jpg', 'teamovi', 1),
(31, '2025-06-20', 'Primjer7', 'Primjer7Primjer7', 'Primjer7Primjer7Primjer7', 'Ferrari.jpg', 'teamovi', 1),
(32, '2025-06-20', 'Primjer8', 'Primjer8Primjer8', 'Primjer8Primjer8Primjer8', 'Ferrari.jpg', 'teamovi', 1),
(33, '2025-06-20', 'Primjer9', 'Primjer9Primjer9', 'Primjer9Primjer9Primjer9', 'Ferrari.jpg', 'teamovi', 1),
(35, '2025-06-20', 'Primjer10', 'Primjer10Primjer10', 'Primjer10Primjer10Primjer10', 'Ferrari.jpg', 'teamovi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
