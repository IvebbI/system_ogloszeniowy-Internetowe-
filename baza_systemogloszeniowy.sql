-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 12:03 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_systemogloszeniowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aplikacja`
--

CREATE TABLE `aplikacja` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `id_ogloszenia` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aplikacja`
--

INSERT INTO `aplikacja` (`id`, `id_uzytkownika`, `id_ogloszenia`, `status`) VALUES
(1, 1, 3, 'Rozpatrywane'),
(2, 2, 5, 'Odrzucone'),
(3, 3, 2, 'W trakcie'),
(4, 4, 1, 'Zaakceptowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doswiadczenie`
--

CREATE TABLE `doswiadczenie` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `stanowisko` varchar(100) DEFAULT NULL,
  `nazwa_firmy` varchar(100) DEFAULT NULL,
  `lokalizacja` varchar(100) DEFAULT NULL,
  `okres_zatrudnienia_od` date DEFAULT NULL,
  `okres_zatrudnienia_do` date DEFAULT NULL,
  `obowiazki` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doswiadczenie`
--

INSERT INTO `doswiadczenie` (`id`, `id_uzytkownika`, `stanowisko`, `nazwa_firmy`, `lokalizacja`, `okres_zatrudnienia_od`, `okres_zatrudnienia_do`, `obowiazki`) VALUES
(1, 1, 'Programista', 'Firma 1', 'Warszawa', '2019-01-01', '2021-12-31', 'Zadania jako programista'),
(2, 2, 'Specjalista ds. Marketingu', 'Firma 2', 'Kraków', '2018-05-01', '2020-06-30', 'Zadania jako specjalista ds. marketingu'),
(3, 3, 'Kierownik Sprzedaży', 'Firma 3', 'Gdańsk', '2020-03-15', '2023-08-30', 'Zadania jako kierownik sprzedaży'),
(4, 4, 'Asystentka Biura', 'Firma 4', 'Poznań', '2017-11-01', '2019-11-30', 'Zadania jako asystentka biura'),
(5, 5, 'Analityk Finansowy', 'Firma 5', 'Łódź', '2018-02-01', '2021-01-31', 'Zadania jako analityk finansowy'),
(6, 6, 'Programista', 'Firma 6', 'Wrocław', '2019-09-01', '2022-08-31', 'Zadania jako programista'),
(7, 7, 'Specjalista ds. HR', 'Firma 7', 'Szczecin', '2020-07-01', '2023-06-30', 'Zadania jako specjalista ds. HR'),
(8, 8, 'Kierownik Magazynu', 'Firma 8', 'Katowice', '2019-04-01', '2022-03-31', 'Zadania jako kierownik magazynu'),
(9, 9, 'Doradca Klienta', 'Firma 9', 'Gdynia', '2017-12-01', '2019-12-31', 'Zadania jako doradca klienta'),
(10, 10, 'Specjalista ds. Zakupów', 'Firma 10', 'Bydgoszcz', '2018-08-01', '2021-07-31', 'Zadania jako specjalista ds. zakupów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firma`
--

CREATE TABLE `firma` (
  `id` int(11) NOT NULL,
  `nazwa_firmy` varchar(100) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `lokalizacja_geograficzna` varchar(100) DEFAULT NULL,
  `informacje` text DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firma`
--

INSERT INTO `firma` (`id`, `nazwa_firmy`, `adres`, `lokalizacja_geograficzna`, `informacje`, `logo_url`) VALUES
(1, 'Firma 1', 'Adres Firma 1', 'Lokalizacja 1', 'Informacje o Firma 1', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(2, 'Firma 2', 'Adres Firma 2', 'Lokalizacja 2', 'Informacje o Firma 2', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(3, 'Firma 3', 'Adres Firma 3', 'Lokalizacja 3', 'Informacje o Firma 3', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(4, 'Firma 4', 'Adres Firma 4', 'Lokalizacja 4', 'Informacje o Firma 4', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(5, 'Firma 5', 'Adres Firma 5', 'Lokalizacja 5', 'Informacje o Firma 5', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(6, 'Firma 6', 'Adres Firma 6', 'Lokalizacja 6', 'Informacje o Firma 6', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(7, 'Firma 7', 'Adres Firma 7', 'Lokalizacja 7', 'Informacje o Firma 7', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(8, 'Firma 8', 'Adres Firma 8', 'Lokalizacja 8', 'Informacje o Firma 8', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(9, 'Firma 9', 'Adres Firma 9', 'Lokalizacja 9', 'Informacje o Firma 9', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png'),
(10, 'Firma 10', 'Adres Firma 10', 'Lokalizacja 10', 'Informacje o Firma 10', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Bieronka_logo_no_claim.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `name` text NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `name`, `type`) VALUES
(1, 0xffd8ffe000104a46494600010100000100010000ffdb0043000b090907090907090909090b0909090909090b090b0b0c0b0b0b0c0d100c110e0d0e0c121912251a1d251d191f1c292916253735361a2a323e2d2930193b2113ffdb0043010708080b090b150b0b152c1d191d2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2c2cffc000110800c000c003012200021101031101ffc4001c0001010003010101010000000000000000000804050607030102ffc4004110000103020106090a0503050100000000000102040306051117365594d20712213151547593b31415164161749195d3d4347173b2b413428122233253a3c2ffc40014010100000000000000000000000000000000ffc40014110100000000000000000000000000000000ffda000c03010002110311003f00f5b0000000000f8be543639cc7c8a0d7b57239afab4dae45e7e5455ca07d818fe5b03ad46efa96f0f2d81d6a377d4b780c8063f96c0eb51bbea5bc3cb6075a8ddf52de032018fe5b03ad46efa96f0f2d81d6a377d4b780c8063f96c0eb51bbea5bc3cb6075a8ddf52de032018fe5b03ad46efa96f0f2d81d6a377d4b780c8063f96c0eb51bbea5bc3cb6075a8ddf52de03201f06cb84e735ad931dce72f15ad6d5a6ae72f42222e53ee000000000000000007e1375f9a5d727bdb7c1a65244db7ee975c9ef6df06981cc800000000000000000000000dfd99a556c769c6fdc5324cd666955b1da71bf714c80000000000000000026dbf74bae4f7b6f834ca489b6fdd2eb93dedbe0d30399000000000000000000000001bfb334aad8ed38dfb8a6499accd2ab63b4e37ee299000000000000000c59d3f0ec363be5cf95422c76722d590f6b1bc6c8aa8d6e5e755c9c889ca70f3b859b4633dec894b109aa8bc952952651a2efc96bb92a7fe607a11c3e2fc1a5b98ce253b1393371565799512ad46d0a91529b551a8dc8d47d155c9c9d2a6917863c372f26092d53db26922fec3f33c7876a397b552dc033734169f5fc6bbd87f6e334169f5fc6bbd87f6e61678f0ed472f6aa5b833c7876a397b552dc033734169f5fc6bbd87f6e334169f5fc6bbd87f6e61678f0ed472f6aa5b833c7876a397b552dc033734169f5fc6bbd87f6e334169f5fc6bbd87f6e61678f0ed472f6aa5b833c7876a397b552dc033734169f5fc6bbd87f6e334169f5fc6bbd87f6e61678f0ed472f6aa5b833c7876a397b552dc033734169f5fc6bbd87f6e334169f5fc6bbd87f6e61678f0ed472f6aa5b833c7876a397b552dc033734169f5fc6bbd87f6e334169f5fc6bbd87f6e61678f0ed472f6aa5b833c7876a397b552dc03738670616de158840c4a3cdc59f5a157a722936b558ab4dce62e5447a368a2e4ff28776795e78f0ed472f6aa5b833c786ea397b552dc03d501e6d1785eb6aab91b2a06271f2ae447b12857627b5d91ed77c114edb09c7b01c7292d5c2a7d0928d445a8c6aab6b5345e4cb528bd12a227e6d03660000686e8b970fb630d7cd93fee57a8aea5062b5c88f915b265c9ec6a73bd72727b55c88edf135de98fd4b871d9d251eab0e3bdd130f6a2ffa523d372a23d13a5eb95cbf9e4f501afc6b1ec66e098f9b89c87557e554a54db95b423b17fb28d3e644e6f6af3aaaaf2aeac000000000000000000000000000000001bac06d8c7ee4ab529e19191d4e92a2579159e94e3d1554ca88e7af2aafb11157d993940d29f789326c091465c291563c9a2ee352ab45eac7b57f34f52fad0ebb14e0cef2c322d597c487329d26abeab30fad52a55631132abbfa7569b15727b32afb0e280a06c5bde95cb41614ee252c66353e35446a2369cba49913fad493d4e4fef6ff0094e45c8cedc9470e9f330b9d0b1087515926256656a4ee5c995bced72273a2a654727ad157a4a870ac42862d8761d89504c94a6c6a521ad5545562bdb95cc554f5b572a2fe407c6e090f89815c3258aa95286158855a6a9ce8f6d07ab57e24b453d75e8c5d3d8d88f80e261000000000000000000000000000000000052361c58916d3b7d23b5a895e2a4aace6a2657d7ace573d5cbd29ff001fc9a89ea26e3d0ec8e10fd1f8e98562946b57c35af7be3548fc55af155eaae73388e544562ae55e7454cabcf972343dd49a6f78b1215d7714788d6b683652546b58888d63ab536567b5a89c8888ae54443d3314e16adfa316a79a634a9535cd54a29269ff004635377a9d5551dc75c9cf911397a539cf1795264cd93265c9a8b52449ad52bd7a8ec995f52a395ce72a27201f13dfb82c92faf69d1a6abc90e7cd8cdf63555b23ff00b53c04f76e093466676ccbf02301d45d7a3174f63623e038984a7aebd18ba7b1b11f01c4c2000000000000000000000000000000000000000000f76e093466676ccbf0231e127bb7049a3333b665f81180ea2ebd18ba7b1b11f01c4c253d75e8c5d3d8d88f80e26100000000000156e1ed6f9061dc89f838bea4ff00a9a04a40adf8ade84f820e2b7a13e0804900adf8ade84f820e2b7a13e0804900adf8ade84f820e2b7a13e0804900adf8ade84f820e2b7a13e0804900adf8ade84f82132ddfa517476b4df1540d1000000001eedc1268ccced997e0463c24f76e093466676ccbf02301d45d7a3174f63623e038984a82e8a756adb97352a4c7d4a953099f4e9b29b5cf7bdeea2e446b5ade5555270f315c9a9b15d864ee01ae06c7cc5726a6c576193b83cc5726a6c576193b806b81b1f315c9a9b15d864ee1855e8498d56a509346ad1af4d512a52aec753a8c5544544731e88a9f003e655d87fe030ef748de134944abb0ff00c061dee91bc26819400000000000000004c977e945d1dad37c5529b264bbf4a2e8ed69be2a81a207f74a956ad529d2a34df52ad472329d3a4d73def72ae446b5ade555533bcc5726a6c576193b806b81b1f315c9a9b15d864ee0f315c9a9b15d864ee01ae3ddb824d1999db32fc08c78d798ae4d4d8aec32770f6be0b22cd876e4ba52e3488f5571794f4649a55293d5ab423a2391b511172722fc3d8077800000003f09cb842d31b8ff00562ff168947138f085a6371feac6fe2d103952aec3ff0001877ba46f09a4a255d87fe030ef748de1340ca0000000000000000264bbf4a2e8ed69be2a94d9325dfa517476b4df15405a1a516bf6b42f150a6c98ed0d28b5fb5a178a8538000000000000000007e1397085a6371feac6fe2d128e271e10b4c6e3fd58dfc5a2072a539071fb6590a035d8de108e6c58ed722cf8a8a8a94da8a8a9c726300549e90dafaf306f9844df1e90dafaf306f9844df25b00549e90dafaf306f9844df1e90dafaf306f9844df25b00549e90dafaf306f9844df1e90dafaf306f9844df25b00549e90dafaf306f9844df1e90dafaf306f9844df25b00549e90dafaf306f9844df274baaad1af725c95a854a7568d5c5263e9d4a4e6be9bdab51551cd7379150d300379686945afdad0bc5429c263b434a2d7ed683e2a14e000000000000000000397c4ac4b3b169b2b119d06a559725cd7567a4a92c472b5a8c4c8d63d139913d475000e33367606adabb6ccfa83367606adabb6ccfa876600e33367606adabb6ccfa83367606adabb6ccfa876600e33367606adabb6ccfa83367606adabb6ccfa876600e33367606adabb6ccfa83367606adabb6ccfa876600e33367606adabb6ccfa83367606adabb6ccfa876600e33367606adabb6ccfa83367606adabb6ccfa876600e521707d6561f2e24e8b02ab24c4ad4e4507acb94e46d4a6bc66aab5cfc8a75600000000001fffd9, 'OIP.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk`
--

CREATE TABLE `jezyk` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `nazwa_jezyka` varchar(50) DEFAULT NULL,
  `poziom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jezyk`
--

INSERT INTO `jezyk` (`id`, `id_uzytkownika`, `nazwa_jezyka`, `poziom`) VALUES
(1, 1, 'Niemiecki', 'Średniozaawansowany'),
(2, 2, 'Francuski', 'Początkujący'),
(3, 3, 'Hiszpański', 'Zaawansowany'),
(4, 4, 'Chiński', 'Podstawowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `Id` int(11) NOT NULL,
  `email` text NOT NULL,
  `haslo` text NOT NULL,
  `admin` text NOT NULL,
  `firma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konto`
--

INSERT INTO `konto` (`Id`, `email`, `haslo`, `admin`, `firma`) VALUES
(1, 'knurowskikarol12345@gmail.com', '202cb962ac59075b964b07152d234b70', 'TAK', ''),
(2, 's@s', '202cb962ac59075b964b07152d234b70', 'NIE', 'NIE'),
(3, 'test@s', '202cb962ac59075b964b07152d234b70', 'NIE', 'TAK'),
(4, 's@asdasd', '202cb962ac59075b964b07152d234b70', 'NIE', 'NIE'),
(5, 'karolxdv2@gmail.com', '202cb962ac59075b964b07152d234b70', 'NIE', 'NIE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `nazwa_szkolenia` varchar(100) DEFAULT NULL,
  `organizator` varchar(100) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`id`, `id_uzytkownika`, `nazwa_szkolenia`, `organizator`, `data`) VALUES
(1, 1, 'Kurs Zarządzania', 'Firma XYZ', '2021-04-15'),
(2, 2, 'Kurs Marketingu', 'Inna Firma', '2022-09-20'),
(3, 3, 'Kurs Fotografii', 'Studio ABC', '2020-11-11'),
(4, 4, 'Kurs Kreatywnego Pisania', 'Wydawnictwo 123', '2023-05-28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `adres_url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `id_uzytkownika`, `adres_url`) VALUES
(1, 1, 'http://przykladowylink1.com'),
(2, 2, 'http://przykladowylink2.com'),
(3, 3, 'http://przykladowylink3.com'),
(4, 4, 'http://przykladowylink4.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenie`
--

CREATE TABLE `ogloszenie` (
  `id` int(11) NOT NULL,
  `id_firmy` int(11) DEFAULT NULL,
  `nazwa` varchar(100) NOT NULL,
  `poziom_stanowiska` varchar(50) DEFAULT NULL,
  `rodzaj_umowy` varchar(50) DEFAULT NULL,
  `wymiar_etatu` varchar(50) DEFAULT NULL,
  `rodzaj_pracy` varchar(50) DEFAULT NULL,
  `widelki_wynagrodzenia` varchar(100) DEFAULT NULL,
  `dni_pracy` varchar(50) DEFAULT NULL,
  `godziny_pracy` varchar(50) DEFAULT NULL,
  `data_waznosci` date DEFAULT NULL,
  `kategoria` varchar(50) DEFAULT NULL,
  `zakres_obowiazkow` text DEFAULT NULL,
  `wymagania_kandydata` text DEFAULT NULL,
  `oferowane_benefity` text DEFAULT NULL,
  `informacje_o_firmie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ogloszenie`
--

INSERT INTO `ogloszenie` (`id`, `id_firmy`, `nazwa`, `poziom_stanowiska`, `rodzaj_umowy`, `wymiar_etatu`, `rodzaj_pracy`, `widelki_wynagrodzenia`, `dni_pracy`, `godziny_pracy`, `data_waznosci`, `kategoria`, `zakres_obowiazkow`, `wymagania_kandydata`, `oferowane_benefity`, `informacje_o_firmie`) VALUES
(1, 1, 'Stanowisko 1', 'Junior', 'Umowa o pracę', 'Pełny etat', 'Stacjonarna', '5000-6000 PLN', 'Pon-Pt', '8:00-16:00', '2023-12-31', 'Edukacja', 'Opis obowiązków stanowiska 1', 'Wymagania dla kandydata stanowiska 1', 'Benefity oferowane przez firmę 1', 'Informacje o Firmie 1'),
(2, 2, 'Stanowisko 2', 'Senior', 'Umowa zlecenie', 'Część etatu', 'Zdalna', '100-120 PLN/h', 'Elastyczne', 'Do uzgodnienia', '2023-12-15', 'Energetyka', 'Opis obowiązków stanowiska 2', 'Wymagania dla kandydata stanowiska 2', 'Benefity oferowane przez firmę 2', 'Informacje o Firmie 2'),
(3, 3, 'Stanowisko 3', 'Menedżer', 'Umowa o dzieło', 'Pełny etat', 'Hybrydowa', '8000-10000 PLN', 'Pon-Sob', '9:00-17:00', '2024-01-10', 'Produkcja', 'Opis obowiązków stanowiska 3', 'Wymagania dla kandydata stanowiska 3', 'Benefity oferowane przez firmę 3', 'Informacje o Firmie 3'),
(4, 4, 'Stanowisko 4', 'Specjalista', 'Staż/praktyka', 'Dodatkowa/tymczasowa', 'Stacjonarna', '1200-1500 PLN', 'Sob-Nd', '10:00-18:00', '2023-11-30', 'Hotelarstwo', 'Opis obowiązków stanowiska 4', 'Wymagania dla kandydata stanowiska 4', 'Benefity oferowane przez firmę 4', 'Informacje o Firmie 4'),
(5, 5, 'Stanowisko 5', 'Ekspert', 'Umowa o pracę', 'Pełny etat', 'Zdalna', '15000-20000 PLN', 'Pon-Pt', '8:00-16:00', '2023-12-20', 'Edukacja', 'Opis obowiązków stanowiska 5', 'Wymagania dla kandydata stanowiska 5', 'Benefity oferowane przez firmę 5', 'Informacje o Firmie 5'),
(6, 6, 'Stanowisko 6', 'Junior', 'Umowa o pracę', 'Część etatu', 'Stacjonarna', '4000-4500 PLN', 'Pon-Pt', '12:00-18:00', '2024-01-05', 'Energetyka', 'Opis obowiązków stanowiska 6', 'Wymagania dla kandydata stanowiska 6', 'Benefity oferowane przez firmę 6', 'Informacje o Firmie 6'),
(7, 7, 'Stanowisko 7', 'Menedżer', 'Umowa o pracę', 'Pełny etat', 'Hybrydowa', '9000-11000 PLN', 'Pon-Sob', '9:00-17:00', '2023-12-25', 'Produkcja', 'Opis obowiązków stanowiska 7', 'Wymagania dla kandydata stanowiska 7', 'Benefity oferowane przez firmę 7', 'Informacje o Firmie 7'),
(8, 8, 'Stanowisko 8', 'Specjalista', 'Staż/praktyka', 'Dodatkowa/tymczasowa', 'Zdalna', '1300-1600 PLN', 'Sob-Nd', '10:00-18:00', '2023-11-27', 'Hotelarstwo', 'Opis obowiązków stanowiska 8', 'Wymagania dla kandydata stanowiska 8', 'Benefity oferowane przez firmę 8', 'Informacje o Firmie 8'),
(9, 9, 'Stanowisko 9', 'Ekspert', 'Umowa o dzieło', 'Pełny etat', 'Stacjonarna', '18000-22000 PLN', 'Pon-Pt', '8:00-16:00', '2023-12-18', 'Edukacja', 'Opis obowiązków stanowiska 9', 'Wymagania dla kandydata stanowiska 9', 'Benefity oferowane przez firmę 9', 'Informacje o Firmie 9'),
(10, 10, 'Stanowisko 10', 'Kierownik', 'Umowa o pracę', 'Pełny etat', 'Hybrydowa', '12000-15000 PLN', 'Pon-Pt', '9:00-17:00', '2024-01-15', 'Produkcja', 'Opis obowiązków stanowiska 10', 'Wymagania dla kandydata stanowiska 10', 'Benefity oferowane przez firmę 10', 'Informacje o Firmie 10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umiejetnosc`
--

CREATE TABLE `umiejetnosc` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `nazwa_umiejetnosci` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umiejetnosc`
--

INSERT INTO `umiejetnosc` (`id`, `id_uzytkownika`, `nazwa_umiejetnosci`) VALUES
(1, 1, 'Obsługa pakietu MS Office'),
(2, 2, 'Programowanie w Pythonie'),
(3, 3, 'Analityka danych'),
(4, 4, 'Zarządzanie projektem');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) DEFAULT NULL,
  `nazwisko` varchar(50) DEFAULT NULL,
  `data_urodzenia` date DEFAULT NULL,
  `numer_telefonu` varchar(20) DEFAULT NULL,
  `zdjecie_profilowe` text DEFAULT NULL,
  `miejsce_zamieszkania` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `imie`, `nazwisko`, `data_urodzenia`, `numer_telefonu`, `zdjecie_profilowe`, `miejsce_zamieszkania`) VALUES
(1, 'Jan', 'Kowalski', '1990-05-15', '123456789', 'https://marcinbiodrowski.com/wp-content/uploads/2018/03/dlaczego-warto-miec-dobre-zdjecie-w-CV.jpg', 'Warszawa'),
(2, 'Anna', 'Nowak', '1988-12-10', '987654321', 'zdjecie_anna.jpg', 'Kraków'),
(3, 'Piotr', 'Lewandowski', '1995-07-20', '456123789', 'zdjecie_piotr.jpg', 'Gdańsk'),
(4, 'Magda', 'Wójcik', '1993-03-25', '789654321', 'zdjecie_magda.jpg', 'Poznań'),
(5, 'Marek', 'Dąbrowski', '1987-10-30', '654789321', 'zdjecie_marek.jpg', 'Łódź'),
(6, 'Karolina', 'Zielińska', '1992-08-05', '321456987', 'zdjecie_karolina.jpg', 'Wrocław'),
(7, 'Łukasz', 'Szymański', '1991-01-22', '159263487', 'zdjecie_lukasz.jpg', 'Szczecin'),
(8, 'Natalia', 'Jaworska', '1994-06-18', '456987123', 'zdjecie_natalia.jpg', 'Katowice'),
(9, 'Michał', 'Kaczmarek', '1998-09-28', '987654321', 'zdjecie_michal.jpg', 'Gdynia'),
(10, 'Ewa', 'Witkowska', '1997-04-12', '654789321', 'zdjecie_ewa.jpg', 'Bydgoszcz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyksztalcenie`
--

CREATE TABLE `wyksztalcenie` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `nazwa_szkoly` varchar(100) DEFAULT NULL,
  `miejscowosc` varchar(100) DEFAULT NULL,
  `poziom_wyksztalcenia` varchar(50) DEFAULT NULL,
  `kierunek` varchar(100) DEFAULT NULL,
  `okres_od` date DEFAULT NULL,
  `okres_do` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wyksztalcenie`
--

INSERT INTO `wyksztalcenie` (`id`, `id_uzytkownika`, `nazwa_szkoly`, `miejscowosc`, `poziom_wyksztalcenia`, `kierunek`, `okres_od`, `okres_do`) VALUES
(1, 1, 'Uniwersytet ABC', 'Miasto XYZ', 'Licencjat', 'Psychologia', '2016-09-01', '2020-06-30'),
(2, 2, 'Politechnika 123', 'Inne Miasto', 'Inżynier', 'Informatyka', '2015-09-01', '2021-07-15'),
(3, 3, 'Szkoła GHI', 'Miasto RST', 'Technik', 'Elektronika', '2014-09-01', '2017-06-30'),
(4, 4, 'Uniwersytet LMN', 'Miasto UVW', 'Magister', 'Ekonomia', '2017-09-01', '2022-06-30');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aplikacja`
--
ALTER TABLE `aplikacja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_ogloszenia` (`id_ogloszenia`);

--
-- Indeksy dla tabeli `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `jezyk`
--
ALTER TABLE `jezyk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `ogloszenie`
--
ALTER TABLE `ogloszenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_firmy` (`id_firmy`);

--
-- Indeksy dla tabeli `umiejetnosc`
--
ALTER TABLE `umiejetnosc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikacja`
--
ALTER TABLE `aplikacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `firma`
--
ALTER TABLE `firma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jezyk`
--
ALTER TABLE `jezyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konto`
--
ALTER TABLE `konto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ogloszenie`
--
ALTER TABLE `ogloszenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `umiejetnosc`
--
ALTER TABLE `umiejetnosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplikacja`
--
ALTER TABLE `aplikacja`
  ADD CONSTRAINT `aplikacja_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`),
  ADD CONSTRAINT `aplikacja_ibfk_2` FOREIGN KEY (`id_ogloszenia`) REFERENCES `ogloszenie` (`id`);

--
-- Constraints for table `doswiadczenie`
--
ALTER TABLE `doswiadczenie`
  ADD CONSTRAINT `doswiadczenie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`);

--
-- Constraints for table `jezyk`
--
ALTER TABLE `jezyk`
  ADD CONSTRAINT `jezyk_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`);

--
-- Constraints for table `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `kurs_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`);

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`);

--
-- Constraints for table `ogloszenie`
--
ALTER TABLE `ogloszenie`
  ADD CONSTRAINT `ogloszenie_ibfk_1` FOREIGN KEY (`id_firmy`) REFERENCES `firma` (`id`);

--
-- Constraints for table `umiejetnosc`
--
ALTER TABLE `umiejetnosc`
  ADD CONSTRAINT `umiejetnosc_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`);

--
-- Constraints for table `wyksztalcenie`
--
ALTER TABLE `wyksztalcenie`
  ADD CONSTRAINT `wyksztalcenie_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
