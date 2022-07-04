-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 04, 2022 alle 19:21
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblibreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tblibro`
--

CREATE TABLE `tblibro` (
  `id` int(11) NOT NULL,
  `titolo` varchar(50) NOT NULL,
  `autore` varchar(20) NOT NULL,
  `dettagli` varchar(400) NOT NULL,
  `costo` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `genere` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tblibro`
--

INSERT INTO `tblibro` (`id`, `titolo`, `autore`, `dettagli`, `costo`, `img`, `genere`, `likes`) VALUES
(1, 'Harry Potter e Il calice di fuoco', 'J.K. Rowling', 'Harry Potter e il calice di fuoco e\' il quarto romanzo della saga fantasy Harry Potter, scritta da J. K. Rowling e ambientata principalmente nell\'immaginario Mondo magico ', 13, 'https://m.media-amazon.com/images/I/51+O6+BisCL.jpg', 1, 24),
(2, 'Harry Potter e Il principe mezzo sangue', 'J.K. Rowling', 'Lord Voldemort stringe la sua presa sia sul mondo dei babbani che su quello dei maghi, Hogwarts non e\'piu un rifugio sicuro', 15, 'https://m.media-amazon.com/images/I/51YuFod+3FL._SL500_.jpg', 1, 18),
(3, 'Harry Potter e la pietra filosofale', 'J.K. Rowling', 'A 11 anni, Harry Potter scopre di essere il figlio orfano di due potenti maghi. Frequenta la scuola di magia e stregoneria di Hogwarts dove scopre la verita su se stesso e sulla morte dei suoi genitori.', 16, 'https://m.media-amazon.com/images/I/51rdksF61YL.jpg', 1, 10),
(4, 'Harry Potter e la camera dei segreti', 'J.K. Rowling', 'Harry Potter e la camera dei segreti e\' il secondo romanzo della saga high fantasy Harry Potter, scritta da J. K. Rowling e ambientata principalmente nell\'immaginario Mondo magico durante gli anni novanta del XX secolo', 14, 'https://m.media-amazon.com/images/I/51iy7u+yklL.jpg', 1, 11),
(5, 'Harry Potter e l\'ordine della fenicie', 'J.K. Rowling', 'Mentre si trova confinato contro la sua volonta a Privet Drive, Harry scopre che Albus Silente e\' a capo di una organizzazione segreta che ha il compito di contrapporsi e possibilmente sconfiggere Lord Voldemort.', 9, 'https://m.media-amazon.com/images/I/51C70ZMHsxL.jpg', 1, 6),
(6, 'Harry Potter :La saga completa', 'J.K. Rowling', 'Saga completa dei titoli', 54, 'https://m.media-amazon.com/images/I/51rbcw7whpL.jpg', 1, 80),
(7, 'Harry Potter e Il prigioniero di Azkaban', 'J.K. Rowling', 'Harry Potter sta frequentando il terzo anno a Hogwarts e questa volta deve difendersi da un pericoloso assassino, Sirius Black, scappato dalla sorvegliata prigione per maghi di Azkaban e legato alla famiglia del piccolo mago.', 18, 'https://m.media-amazon.com/images/I/5126p5+amYL.jpg', 1, 20),
(8, 'My heart is a chainsaw', 'Stephen Jones', 'This is a story of friendship, a dysfunctional family, and an even more dysfunctional community', 16, 'https://images-na.ssl-images-amazon.com/images/I/41nCMv1dd4L._SY498_BO1,204,203,200_.jpg', 1, 24),
(9, 'Stagioni diverse', 'Stephen King', 'Stagioni diverse e\' la seconda raccolta di racconti scritta da Stephen King e pubblicata nel 1982', 25, 'https://i1.sndcdn.com/artworks-BPzs8NcoWCOdk1Pv-EJ5sHQ-t500x500.jpg', 1, 56),
(10, 'It', 'Stephen King', 'La pellicola ha come protagonisti Bill Skarsgard nel ruolo dell\'entita misteriosa Pennywise/It e Jaeden Lieberher nei panni di Bill Denbrough. Il film si concentra sugli avvenimenti narrati nelle parti del romanzo ambientate tra il 1957 e il 1958', 16, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2015/10/it.jpg', 2, 12),
(11, 'La zona morta', 'Stephen King', 'Johnny esce dal coma dopo cinque anni, scoprendo di avere poteri paranormali che gli permettono di sentire cio\' che sta per succedere e di modificare il corso degli eventi.', 13, 'https://www.iperdeal.com/files/archivio_Files/Foto/1409_2.PNG', 2, 65),
(12, 'Outsider', 'Stephen King', 'The Outsider e\' un romanzo horror giallo di Stephen King, pubblicato negli USA il 22 maggio 2018, mentre la pubblicazione in Italia e\' stata il 23 ottobre dello stesso anno da Sperling & Kupfer.', 15, 'https://www.mescalina.it/foto/libri/recensioni/big/736--20181109174547.jpg', 2, 10),
(13, 'Salem\'s lot', 'Stephen King', 'Le notti di Salem e\' un romanzo horror scritto da Stephen King, pubblicato nel 1975. E\' la seconda opera pubblicata da King, dopo il precedente Carrie', 22, 'https://m.media-amazon.com/images/I/51uf6hRTxGL._SL500_.jpg', 2, 22),
(14, 'West side story', 'Leonard Berstein', 'Non disponibile', 12, 'https://img.sheetmusic.direct/catalogue/product/hl-00450057-lg.jpg', 2, 11),
(15, 'Shining', 'Stephen King', 'Jack Torrance, aspirante scrittore, accetta l\'incarico di guardiano invernale di un albergo in un luogo isolato sulle montagne del Colorado. Ma suo figlio Danny inizia a sperimentare delle visioni riguardo i terribili eventi accaduti nella struttura', 13, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2015/10/king.jpg', 2, 24),
(16, 'Heller', 'Leonard Berstein', 'Nata a Budapest nel 1929, e\' stata la massima esponente della Scuola di Budapest, corrente filosofica del marxismo facente parte del cosiddetto \"dissenso dei paesi dell\'est europeo\", prima del crollo definitivo dei regimi dell\'est europeo.', 15, 'https://www.woodbrass.com/it-it/images/SQUARE400/woodbrass/EP3562.JPG', 2, 18),
(17, 'Universo', 'Stephen Hawking', 'I dettagli dell\'universo in viaggio affascinante', 16, 'https://www.hangarstore.it/files/hangar_Files/Foto/72521_5.PNG', 2, 80),
(18, 'Psicologia Oscura', 'Leonard Berstein', 'Psicologia Oscura: Come analizzare Le persone e Decifrare La Loro mente attraverso 7 tecniche segrete di persuasione e psicoanalisi Comportamentale', 13, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1579000185i/50483827._UY500_SS500_.jpg', 2, 31),
(19, 'I promessi sposi', 'Alessandro Manzoni', 'I promessi sposi e\' un celebre romanzo storico di Alessandro Manzoni, ritenuto il piu famoso e il piu letto tra quelli scritti in lingua italiana.', 16, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2018/12/manzoni.jpg', 3, 120),
(20, 'Il segreto di greenshore', 'Agatha Christie', 'Il segreto di Greenshore, titolo originale Hercule Poirot and the Greenshore Folly, e\' un racconto di Agatha Christie pubblicato postumo nel 2014. Fu scritto nel 1954, a scopo di beneficenza, e mai pubblicato nella sua forma originale', 15, 'https://1.bp.blogspot.com/-I5KHziirn2k/VhqxAWVKRwI/AAAAAAAAJFI/-liv9aq2XlY/s1600/il%2Bsegreto%2Bgreenshore%2Bcover-min.jpg', 3, 43),
(21, 'Ventimila leghe sotto i mari ', 'Jules Verne', 'Ventimila leghe sotto i mari e\' un classico romanzo fantascientifico e d\'avventure, uno dei piu celebri tra quelli scritti dallo scrittore francese Jules Verne.', 22, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2019/07/verne.jpg', 3, 10),
(22, 'I sommersi e i salvati', 'Primo Levi', 'I sommersi e i salvati e\' un saggio di Primo Levi che analizza la tragedia dei Lager nazisti, il ruolo delle vittime e degli aguzzini all\'interno dei campi', 12, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2019/07/levi3.jpg', 3, 10),
(23, 'Il mito e l\'astrologia psicologica', 'Leonard Berstein', 'La stretta relazione tra i miti, i caratteri umani e le varie fasi della vita, conferma il legame simbolico che ci connette a un linguaggio universale', 22, 'https://www.namaste-shop.it/25853-home_default/il-mito-e-l-astrologia-psicologica-libro.jpg', 3, 11),
(24, 'Un giardino semplice', 'Paolo Pejrone', 'Un giardino felice asseconda i tempi e le esigenze della natura, e racconta tante storie delle quali il giardiniere e\' scrittore e custode', 34, 'https://cdn.gelestatic.it/repubblica/design/2017/03/1467704702289_1-ungiardinosemplice.jpg', 3, 34),
(25, 'Lo scroccone', 'Jules Verne', 'Forse soltanto \"Bouvard e Pecuchet\" sta accanto a questo meraviglioso Scroccone per la comicita\' asciutta e feroce', 34, 'https://2.bp.blogspot.com/-7YjPHcxocgY/VhqvdOmxTQI/AAAAAAAAJE0/yarTuGTmc-s/s1600/Lo%2Bscroccone%2Bcover-min.jpg', 3, 18),
(26, 'Rosemary\'s baby', 'Agatha Christie', 'Rosemary\'s Baby e\' un romanzo horror scritto da Ira Levin nel 1967. E\' il secondo e sicuramente il piu noto tra i romanzi pubblicati dall\'autore statunitense', 45, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2015/10/rosemarys-baby.jpg', 3, 33),
(27, 'Il mondo deve sapere', 'Michela Murgia', 'Il mondo deve sapere. Romanzo tragicomico di una telefonista precaria e\' un romanzo autobiografico in forma di diario scritto da Michela Murgia', 16, 'https://cdn.gelestatic.it/kataweb/ilmiolibro/2019/07/murgia.jpg', 3, 80);

-- --------------------------------------------------------

--
-- Struttura della tabella `tblike`
--

CREATE TABLE `tblike` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idlibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tblike`
--

INSERT INTO `tblike` (`id`, `iduser`, `idlibro`) VALUES
(3, 6, 1);

--
-- Trigger `tblike`
--
DELIMITER $$
CREATE TRIGGER `likes_trigger` AFTER INSERT ON `tblike` FOR EACH ROW UPDATE
tblibro
set likes= likes+1
where id=new.idlibro
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `unlikes_trigger` AFTER DELETE ON `tblike` FOR EACH ROW UPDATE
tblibro
set likes=likes-1
where id=old.idlibro
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tbordine`
--

CREATE TABLE `tbordine` (
  `id` int(11) NOT NULL,
  `idlibro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tbutente`
--

CREATE TABLE `tbutente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sesso` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tbutente`
--

INSERT INTO `tbutente` (`id`, `nome`, `cognome`, `username`, `email`, `password`, `sesso`) VALUES
(1, 'davide', 'rossi', 'davirossi', 'davi@gmail.it', 'daviderossi', 'maschio'),
(2, 'Alfio', 'musmarra', 'alfiuccio', 'alfio@gmail.com', 'alfioalfio', 'maschio'),
(4, 'lorenzo', 'verdi', 'loreverdi', 'lore@gmail.it', 'lorenzoverdi', 'maschio'),
(5, 'lucia', 'neri', 'lucineri', 'lucia@gmail.it', 'lucianeri', 'femmina'),
(6, 'luca', 'verdi', 'lucaverdi', 'luca@gmail.it', '$2y$10$rDW9zuf1EP1Yu4oxRqY7/.XYFEUSs0NcEetDJJygJKSbK7gwAtaAK', 'maschio'),
(7, 'lorena', 'grasso', 'lorenaz', 'lorenagrasso@gmail.it', '$2y$10$WHCU2Y6.x9Yy.XjOHZy.IOJggVBO9KSM2aC/FSGv9otZ8OfNeb6.2', 'femmina'),
(8, 'alfio', 'neri', 'alfione', 'alfioneri@gmail.com', '$2y$10$H2psY3kGnur.SbvBCf9rM.8jFqNWbngBBH/AR1z8cYHS4Ps2pTd.O', 'maschio'),
(9, 'marco', 'rossi', 'marcorossi', 'marco@gmail.com', '$2y$10$MwzJkF014Qx.iHi2pe9AE.2kVLOSjELGrrmEyTi6fUZMkNhWI4RMu', 'maschio'),
(10, 'Bea', 'neri', 'beaneri', 'bea@gmail.com', '$2y$10$X2JWysxQMu3KAYvcL5kkhuGm.F/LWCU6iw1Z84Vx/PTOANKDGu1zq', 'femmina'),
(11, 'ciccio', 'rossi', 'cicciorossi', 'ciccio@gmail.it', 'cicciorossi', 'maschio'),
(12, 'lara', 'verdi', 'laraverdi', 'lara@gmail.it', 'laraverdi', 'femmina'),
(13, 'elena', 'fiori', 'elenafiori', 'elena@gmail.com', '$2y$10$IMYpc.ggWQlDBobisxgIFu7RUIj7z/7mcjQ1nh5zXtu.qBGGfxkoy', 'femmina'),
(14, 'luca', 'neri', 'lucaneri', 'lucaneri@gmail.it', '$2y$10$MrNLzPMzhyj42rCtIT6DluNgQOC3nNCLd4FTkh1y2cJJ8pfzZEls6', 'maschio');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tblibro`
--
ALTER TABLE `tblibro`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tblike`
--
ALTER TABLE `tblike`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbordine`
--
ALTER TABLE `tbordine`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbutente`
--
ALTER TABLE `tbutente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tblibro`
--
ALTER TABLE `tblibro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `tblike`
--
ALTER TABLE `tblike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT per la tabella `tbordine`
--
ALTER TABLE `tbordine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT per la tabella `tbutente`
--
ALTER TABLE `tbutente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
