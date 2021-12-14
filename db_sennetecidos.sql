-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 11:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sennetecidos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `senha`) VALUES
(1, 'admin@sennetecidos.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'joao@sennetecidos.com', 'd88cc9b0d149ecd879538b440b764869');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `nome`) VALUES
(1, 'Cama'),
(2, 'Mesa'),
(3, 'Banho'),
(4, 'Acessórios');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id_produtos` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produtos`
--

INSERT INTO `tb_produtos` (`id_produtos`, `nome`, `categoria`, `descricao`, `imagem`) VALUES
(2, 'Capa de Colchão', 'Cama', 'Ela foi pensada em praticidade e durabilidade, podendo recorrer em até 5 anos de vida a mais para seu colchão, o que permite maior aproveitamento e manter o colchão em estado constante de limpeza.', 'capaDeColchão.jpeg'),
(3, 'Toalha de banho Dohler', 'banho', 'Ideal para quem procura decoração e utilidade em um produto, diversas cores e absorve 100% da água.', 'toalhaDohler.jpeg'),
(4, 'Toalhas Dohler Estampado', 'banho', 'A toalha possui toque macio e que realmente absorve água, fios penteados.', 'toalhasDohlerEstampado.jpeg'),
(5, 'Toalha de Mesa Pimenta', 'Mesa', '4 cadeiras é ideal para toalha de mesa dohler, nela você pode comer sem se preocupar com a mancha, ineficácia, casos de rasgos, rasuras, pois ela foi pensada em um ambiente decorado e útil dentro da sua casas.', 'toalhaDeMesaPimenta .jpeg'),
(6, 'Jogo Americano Dohler', 'mesa', 'Ideal para quem deseja uma cozinha harmônica, podendo ser útil para diversas finalidades por conta da sua acessibilidade e fácil higienização.', 'jogoAmericanoDohler.jpeg'),
(7, 'Toalha por Metro', 'Mesa', 'É a medida que o cliente propõe, podendo ser eficaz na mesa aos armários da casa.', 'toalhaPorM.jpeg'),
(8, 'Piso de Banheiro Clássico', 'banho', 'O piso foi pensando em elegância e qualidade, nele você pode conferir 8 cores (verde escuro,marrom, rosa, verde musgo, terra, laranja, vinho e branco).', 'pisoDeBanheiroClássico.jpeg'),
(9, 'Gorgorão 1,40', 'acessorios', 'O tecido é de grande importância para quem procura uma casa nova sem altos gastos, podendo revestir qualquer área da casa e até mesmo a mobília.', 'gorgorão.jpeg'),
(10, 'Travesseiro Sonhare', 'cama', 'O travesseiro volta a sua forma original, se adequa ao corpo e permite a flexibilização durante o período do sono, contribuindo para aumentar o descanso de forma segura e aconchegante.', 'travesseiroSonhare.jpeg'),
(11, 'Tapete de Academia', 'acessorios', 'O tapete pode ser adquirido por metro para prática de diversas atividades físicas, ideal para quem não quer sair de casa e prefere materiais de qualidade além de evitar o atrito com o chão.', 'tapeteDeAcademia.jpeg'),
(12, 'Sousplat', 'acessorios', 'O sousplat é produzido com tecidos impermeáveis que impedem que manchas se acumulem ou líquidos se absorvam.', 'sousplat.jpeg'),
(13, 'Colcha Casal Sultan', 'cama', 'Suas noites nunca mais serão as mesmas com a Colcha Casal da Sultan, diversas estampas, confeccionada em 100 algodão, irá lhe proporcionar noites tranquilas e aconchegantes, servindo também como um elemento decorativo com seus porta travesseiros e colchaitens inclusos01 Colcha / Cobre Leito Casal Re', 'colchaCasalSultan.jpeg'),
(14, 'Toalha de Mesa Realce Premium', 'mesa', 'Toalha de mesa pensada em eficiência e elegância com tecido pensado em clientes do cotidiano que buscam uma decoração arrojada.', 'toalhaDeMesaRealcePremium.jpeg'),
(15, 'Jogo De Lençol Queen', 'cama', 'Deixe seu quarto mais elegante com o jogo de cama casal estampado premium, além de te proporcionar um lindo ambiente, também irá garantir noites de sono aconchegantes e confortáveis devido sua confecção em percal 100% algodão, um misto de qualidade e beleza para o seu conforto.', 'jogoDeLençolQueen.jpeg'),
(16, 'Toalha de Mesa Jacquard Realce', 'Mesa', 'Fundo brilhante com tecido de confecção de alta qualidade, além de não precisar passar pois o tecido é resistente em casos de dobraduras e marcas.', 'toalhaDeMesaJacquardRealceTop.jpeg'),
(17, 'Toalha Dohler Morango', 'mesa', 'Toalha para mesa decorativa com acabamento especial Döhler Clean, que protege e permite limpar facilmente, basta passar um pano de imediato.', 'toalhaDohlerMorango.jpeg'),
(18, 'Toalha de Mesa Renova', 'mesa', 'Toalha de mesa Renova, estamparia digital (eco-responsável) em tela de poliéster/algodão de fácil conservação.', 'toalhaDeMesaRenova.jpeg'),
(19, 'Toalha de Mesa Alana', 'mesa', 'A Toalha de Mesa Retangular Dohler Renova Alana mede 1,40m x 2,10m e é ideal para mesas retangulares de 6 lugares. Em sua estampa contém lindas folhagens com fundo bege e bordas lisas, delicada e versátil deixa sua mesa posta ainda mais sofisticada, dando aquele toque especial para todas as refeiçõe', 'toalhaDeMesaAlana.jpeg'),
(20, 'Compose Metalassê King Rozac', 'cama', 'Impossível não se apaixonar por uma roupa de cama de qualidade e rica em sofisticação, não é mesmo? A Colcha Provence da Rozac destaca -se por seu tecido matelassê, os detalhes delicados são ideais para deixar o quarto elegante e mais confortável. Além do toque é macio e super aconchegante.\r\nOs port', 'metalassêKingRozacAzul.jpeg'),
(21, 'Compose Metalassê King Rozac', 'cama', 'Impossível não se apaixonar por uma roupa de cama de qualidade e rica em sofisticação, não é mesmo? A Colcha Provence da Rozac destaca -se por seu tecido matelassê, os detalhes delicados são ideais para deixar o quarto elegante e mais confortável. Além do toque é macio e super aconchegante.\r\nOs port', 'metalassêKingRozacVerde1.jpeg'),
(22, 'Compose Metalassê King Rozac', 'cama', 'Impossível não se apaixonar por uma roupa de cama de qualidade e rica em sofisticação, não é mesmo? A Colcha Provence da Rozac destaca -se por seu tecido matelassê, os detalhes delicados são ideais para deixar o quarto elegante e mais confortável. Além do toque é macio e super aconchegante.\r\nOs port', 'metalasseKingRozacVerde2.jpeg'),
(23, 'Compose Metalassê King Rozac', 'cama', 'Impossível não se apaixonar por uma roupa de cama de qualidade e rica em sofisticação, não é mesmo? A Colcha Provence da Rozac destaca -se por seu tecido matelassê, os detalhes delicados são ideais para deixar o quarto elegante e mais confortável. Além do toque é macio e super aconchegante.\r\nOs port', 'metalasseKingRozacCinza.jpeg'),
(24, 'Kit Gênova - Teka', 'cama', 'A coleção Gênova tem cores que combinam com todos os ambientes e vão deixar sua casa ainda mais cheia de vida! Essa colcha é produzida em tecido piquet, que confere charme e dá aquele diferencial para o ambiente. Em 100% algodão, os tecidos são pré-lavados e diminuem o índice de encolhimento, manten', 'kitGenovaTeka.jpeg'),
(25, 'Travesseiro Master Flow', 'cama', 'A alta tecnologia dos travesseiros proporcionam desenvolvimento tecnology esportiva que absorve suor e reduz a  temperatura do corpo.', 'travesseiroMasterFlow.jpeg'),
(26, 'Travesseiro Fibra de Bambu', 'cama', 'A alta tecnologia dos travesseiros proporcionam desenvolvimento tecnology esportiva que absorve suor e reduz a  temperatura do corpo.', 'travesseiroFibraDeBambu.jpeg'),
(27, 'Tapete de Box', 'banho', 'Este tapete de banheiro é perfeito para você! É uma peça que se mantém fixa no piso úmido proporcionando segurança pois tem excelente aderência às superfícies. Evita acidentes e proporciona maior comodidade. Optar por este artigo é ter a certeza de fazer a escolha correta.', 'tapeteDeBox.jpeg'),
(28, 'Toalha de Piso Dohler', 'banho', 'A Toalha de Piso Jacquard Prime AF-1386 da Dohler é confeccionada em 100% Algodão que garante muita qualidade e durabilidade para a toalha, possui detalhes em Jacquard que dão um toque especial para a peça trazendo muita sofisticação ao seu banheiro, além disso, transmite um ar clean e minimalista q', 'toalhaDePisoDohler.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `sobrenome` varchar(80) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nascimento` date NOT NULL,
  `genero` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `sobrenome`, `cpf`, `nascimento`, `genero`, `telefone`, `cep`, `endereco`, `numero`, `cidade`, `email`, `senha`) VALUES
(1, 'João Victor', 'Oliveira Preto Batista', '479.668.698-30', '2001-04-23', 'M', '(11) 91028-1614', '07725520', 'Rua Joseppina Piva Molinari', '178', 'Caieiras', 'joaoliveira.batista1@gmail.com', 'd88cc9b0d149ecd879538b440b764869');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
