DROP DATABASE IF EXISTS sportwarehouse;

CREATE DATABASE sportwarehouse;

USE sportwarehouse;


# Add table "Category"   
CREATE TABLE sportwarehouse.Category (
    CategoryID INT NOT NULL AUTO_INCREMENT,
    CategoryName VARCHAR(15) ,
   
       primary key (CategoryID)
);


# Add table "items"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE sportwarehouse.Items (
    ItemID INT NOT NULL AUTO_INCREMENT,
    ItemName VARCHAR(40),
    PhotoPath VARCHAR(255),
    Price DECIMAL(10,2),
    Sale DECIMAL(10,2) ,
    Description  VARCHAR(40),
   Featured Bit not null ,
    CategoryID INT,

   primary key(ItemID)
   );

alter table Items add constraint Items_Category_fk foreign key (CategoryID) references Category(CategoryID);



#add table "shopping order"

CREATE TABLE sportwarehouse.shoppingorder (
ShoppingOrderId int(11) not null AUTO_INCREMENT ,
OrderDate datetime,
FirstName VARCHAR(50),
LastName VARCHAR(50),
Address VARCHAR(200),
ContactNumber VARCHAR(20),
Email VARCHAR(255),
CreditCardNumber VARCHAR(20),
ExpiryDate VARCHAR(4),
NameOnCard VARCHAR(50),
CSV VARCHAR(3) ,
primary key (shoppingOrderId)
) ;


# add table "order Item"
CREATE TABLE sportwarehouse.orderitem(
ItemID int(11) ,
ShoppingOrderId int(11),
quantity int(11),
Price decimal(10,2),
primary key (ItemId , shoppingOrderId)
) ;

alter table orderitem add constraint orderitem_shoppingorder_fk foreign key (ShoppingOrderId) references shoppingorder(ShoppingOrderId);



#add table "user"
CREATE TABLE sportwarehouse.user(
userId int(11) NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
password VARCHAR(255) Not NULL ,
primary key (userId)  );
  -- =====================================================
-- Load The Tables
-- =====================================================
use sportwarehouse;

-- Table 'category'
INSERT INTO category VALUES ('1', 'Shoes');
INSERT INTO category VALUES ('2', 'Helmets');
INSERT INTO category VALUES ('3', 'Pants');
INSERT INTO category VALUES ('4', 'Tops');
INSERT INTO category VALUES ('5', 'Balls');
INSERT INTO category VALUES ('6', 'Equipment');
INSERT INTO category VALUES ('7', 'Training gear');

-- Table 'items'
INSERT INTO items VALUES ('001','Sport shoes' ,'PM100.jpg',100,99,'Ignite Flash Evo Wht-Blck',true,'1');
INSERT INTO items VALUES ('002','Sport shoes' ,'s-p101.jpg',119,null,'Salming Trail T4 - Womens Trail Running Shoes',true,'1');
INSERT INTO items VALUES ('003','Sport shoes' ,'air-vapormax-flyknit-3.jpg',110,100,'air-vapormax-flyknit-3',true,'1');
INSERT INTO items VALUES ('004','Sport shoes' ,'air-vapormax-flyknit-4.jpg',89,79,'air-vapormax-flyknit-4',true,'1');
INSERT INTO items VALUES ('005','Sport shoes' ,'react-vision-4.jpg',100,99,'react-vision-4',true,'1');
INSERT INTO items VALUES ('006','Helmet' ,'1116088-c.jpg',120,110,'1116088-c',true,'2');
INSERT INTO items VALUES ('007','Helmet' ,'1119621-c.jpg',100,99,'1119621-c',true,'2');
INSERT INTO items VALUES ('008','Helmet' ,'FO25471170-c.jpg',150,null,'FO25471170-c',true,'2');
INSERT INTO items VALUES ('009','Helmet' ,'FO25471001-c.jpg',1650,null,'FO25471001-c',true,'2');
INSERT INTO items VALUES ('010','Pants' ,'pants-100.jpg',60,null,'pants-100',true,'3');
INSERT INTO items VALUES ('011','Pants' ,'pants-101.jpg',70,49,'pants-100',true,'3');
INSERT INTO items VALUES ('012','Pants' ,'Urban-3_2000x.jpg',100,99,'Urban-3_2000x',true,'3');
INSERT INTO items VALUES ('013','Pants' ,'Vanquish_LT_v2_Men_x.jpg',59,null,'Vanquish_LT_v2_Men_x',true,'3');
INSERT INTO items VALUES ('014','Pants' ,'Vanquish-Eclipse-Strike-Mens-x.jpg',50,39,'Vanquish-Eclipse-Strike-Mens-x',true,'3');
INSERT INTO items VALUES ('015','Tops' ,'770354290_2_360x464.jpg',79,69,'1_IN_BOUND_SPORTS_BRA',true,'4');
INSERT INTO items VALUES ('016','Tops' ,'tops-01.jpg',49,null,'2_IN_BOUND_SPORTS_BRA',true,'4');
INSERT INTO items VALUES ('017','Tops' ,'tops-02.jpg',49,null,'BOUND_SPORTS_BRA_Crop',true,'4');
INSERT INTO items VALUES ('018','Tops' ,'tops-03.jpg',49,null,'BOUND_SPORTS_BRA',true,'4');
INSERT INTO items VALUES ('045','Tops' ,'Desig-Singlet.jpg',49,null,'Desig-Singlet',true,'4');


INSERT INTO items VALUES ('019','Balls' ,'68344.jpg',120,99,'SKU83344185',true,'5');
INSERT INTO items VALUES ('020','Balls' ,'42137_63078.jpg',120,99,'SKU83344187',true,'5');
INSERT INTO items VALUES ('021','Balls' ,'70657.jpg',120,99,'SKU83344188',true,'5');

INSERT INTO items VALUES ('023','Balls' ,'205180.jpg',110,99,'SKU83345112',true,'5');
INSERT INTO items VALUES ('024','Balls' ,'42137_42138.jpg',110,99,'SKU8358073',true,'5');
INSERT INTO items VALUES ('025','Balls' ,'ball-3.jpg',110,99,'SKU8358073',true,'5');
INSERT INTO items VALUES ('043','Balls' ,'2fbaShoes.jpg',110,99,'2fbaShoes',true,'5');


INSERT INTO items VALUES ('026','Equipment' ,'water-bottle.gif',67,57,'WATER BOTTLE_1',true,'6');
INSERT INTO items VALUES ('027','Equipment' ,'7313_7409.jpg',67,59,'SKU24926',true,'6');
INSERT INTO items VALUES ('028','Equipment' ,'FS20DMBSETA_1.jpg',59,49,'FS20DMBSETA_1',true,'6');
INSERT INTO items VALUES ('029','Equipment' ,'205150.jpg',99,89,'Gloves_3_V2',true,'6');
INSERT INTO items VALUES ('044','Equipment' ,'bigW.jpg',99,89,'teNNis_3_V2',true,'6');
INSERT INTO items VALUES ('046','Equipment' ,'EL514B-2.jpg',69,39,'EL514B-2',true,'6');



INSERT INTO items VALUES ('030','Training gear' ,'FSADJKTLBLA_1.jpg',99,70,'FSADJKTLBLA_1',true,'7');
INSERT INTO items VALUES ('033','Training gear' ,'FS20DMBSETA_1.jpg',59,49,'FSVIBXXPLTA_012',true,'7');
INSERT INTO items VALUES ('047','Training gear' ,'EL514B-2.jpg',89,29,'EL514B-2',true,'7');
INSERT INTO items VALUES ('048','Training gear' ,'electricity.jpg',189,179,'electricity',true,'7');
INSERT INTO items VALUES ('050','Training gear' ,'MTS-Kids-Black-Gold-540x540.jpg',189,179,'MTS-Kids-Black',true,'7');
INSERT INTO items VALUES ('051','Training gear' ,'Rebel-res.jpg',320,280,'Rebel-res',true,'7');




INSERT INTO items VALUES ('034','Sport shoes' ,'boot.gif',129,null,'Ignite Flash Evo Wht-blue',true,'1');
INSERT INTO items VALUES ('049','Sport shoes' ,'Liquifect-shoes.jpg',129,null,'Liquifect-shoes',true,'1');

INSERT INTO items VALUES ('035','Sport shoes' ,'s-p101.jpg',129,99,'Ignite Flash Evo blackpnk',true,'1');
INSERT INTO items VALUES ('036','Equipment' ,'7312_7405.jpg',89,59,'glov7312_7405',false,'6');
INSERT INTO items VALUES ('037','Equipment' ,'30419_41871.jpg',89,null,'glvs30-419',true,'6');
INSERT INTO items VALUES ('038','Equipment' ,'30419_41871.jpg',89,59,'glvs185-446',true,'6');
INSERT INTO items VALUES ('039','Equipment' ,'185453.jpg',89,59,'glvs18-5453',false,'6');
INSERT INTO items VALUES ('040','Equipment' ,'130677.jpg',39,32,'w130677',true,'6');
INSERT INTO items VALUES ('041','Training gear' ,'gloves.gif',59,null,'boADJKTLBA',false,'7');
INSERT INTO items VALUES ('042','Training gear' ,'hat.gif',59,49,'HaJKTLt',false,'7');


-- Table 'category'
