SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
--  Table structure for `Order`
-- ----------------------------
DROP TABLE IF EXISTS `Order`;
CREATE TABLE `Order` (
  `idOrder` int(11) DEFAULT NULL,
  `RequestedTime` datetime DEFAULT NULL,
  `ResponsibleStaffMember` varchar(100) DEFAULT NULL,
  `CutomerDetails` varchar(300) DEFAULT NULL,
  KEY `idOrder` (`idOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `OrderLineItem`
-- ----------------------------
DROP TABLE IF EXISTS `OrderLineItem`;
CREATE TABLE `OrderLineItem` (
  `idSpatula` int(11) DEFAULT NULL,
  `idOrder` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  KEY `idSpatula` (`idSpatula`),
  KEY `idOrder` (`idOrder`),
  CONSTRAINT `orderlineitem_ibfk_1` FOREIGN KEY (`idSpatula`) REFERENCES `Spatula` (`idSpatula`),
  CONSTRAINT `orderlineitem_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `Order` (`idOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `Spatula`
-- ----------------------------
DROP TABLE IF EXISTS `Spatula`;
CREATE TABLE `Spatula` (
  `idSpatula` int(11) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Colour` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `QuantityInStock` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSpatula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `Spatula`
-- ----------------------------
INSERT INTO `Spatula` VALUES 
('2', 'S2', 'Drugs', '20', 'Green', '3.00', '10'), 
('4', 'S4', 'Plaster', '10', 'Yellow', '8.00', '1'),
('6', 'S6', 'Drugs', '30', 'Red', '6.00', '20'),
('8', 'S8', 'Plaster', '20', 'Blue', '1.00', '30'),
('10', 'S10', 'Food', '10', 'Purple', '3.00', '100');

INSERT INTO `Spatula` VALUES 
('1', 'S1', 'Drugs', '50', 'Rainbow', '23.00', '0'), 
('3', 'S3', 'Paints', '40', 'Orange', '14.00', '0'),
('5', 'S4', 'Food', '5', 'Black', '6.00', '0'),
('7', 'S7', 'Plaster', '20', 'Grey', '22.00', '0'),
('9', 'S9', 'Paints', '30', 'Purple', '15.00', '0');

INSERT INTO `Order` VALUES 
('1', '2008-03-17 13:23:44', 'Xiong', 'Name: César Marquez Anero, Address: Privada Toloba No. 95'), 
('2', '2009-08-18 12:12:01', 'Jack', 'Name: Joe C. Theberge, Address: 916 Ashton Little'),
('3', '2015-04-12 21:12:01', 'Jaff', 'Name: Kenth U. Dewald, Address: 891 Marion Half'),
('4', '2012-09-09 15:45:21', 'Foo', 'Name: Fredrick R. Jack, Address: 617 Catherine Lake'),
('5', '2011-12-10 16:12:01', 'Cathy', 'Name: Frank S. Pelaez, Address: 425 Stoneybrook Circle');

INSERT INTO `OrderLineItem` VALUES 
('2','1','1'),
('4','2','1'),('6','2','12'),
('6','3','14'),('8','3','23'),('10','3','48'),
('8','4','22'),('2','4','6'),('10','4','70'),('6','4','12'),
('10','5','56'),('4','5','1'),('6','5','15'),('2','5','9'),('8','5','24');

SET FOREIGN_KEY_CHECKS = 1;

