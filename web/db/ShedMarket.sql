#first create the TABLE
CREATE DATABASE SHEDMARKET;

DROP ALL TABLE 
CREATE TABLE seller
(
    id SERIAL PRIMARY KEY,
    companyName Varchar(20) NOT NULL,
    companyLogo Varchar(20) NOT NULL

);

CREATE TYPE rlevel AS ENUM ('1', '2', '3');
CREATE TABLE customer 
(
    id SERIAL PRIMARY KEY,
    email Varchar(50),
    password Varchar(255) NOT NULL,
    roleLevel rlevel DEFAULT '1'
);

CREATE TABLE product
(

	id SERIAL PRIMARY KEY NOT NULL,
    product_item_name varchar(20) NOT NULL,
    product_item_price varchar(20) NOT NULL,
    product_image varchar(50) NOT NULL,
    seller_id INT NOT NULL REFERENCES seller(id)

);

CREATE TABLE inventory
(
    invName Varchar(20) NOT NULL,
    invDescription Varchar(20) NOT NULL,
    invPrice decimal(6,2) NOT NULL,
    invImg varchar(200) NOT NULL,
    invStock Varchar(20) NOT NULL,
    categoryId Varchar(20) NOT NULL,
    invVendor Varchar(20) NOT NULL
);




CREATE TABLE categories (
    categoryId SERIAL PRIMARY KEY,
    categoryName Varchar(50) NOT NULL,
    catImg varchar(50) NOT NULL
    
);


CREATE TABLE product_orders
(
    id SERIAL PRIMARY KEY,
    orderNumber Varchar(10) NOT NULL,
    OrderDate DATE,
    totalAmnt INT NOT NULL,
    customer_id INT NOT NULL REFERENCES customer(id);
);

INSERT INTO seller ('catergoryName', 'catImg') VALUES
('Grains', '../images/rice beans market.jpg'),
('Home product',' ../images/bleach.jpg'),
('Friuts', '../images/cashew.jpg'),
('Frozen foods', '../images/titus.jpg');


INSERT INTO product (id, product_item_name, product_item_price, product_image, seller_id) VALUES
('PGrains1', '../images/parboiledrice.jpg', 'Parboiled Rice'),
('PGrains2', '../images/beans.jpg', 'Beans'),
('PGrains3', '../images/millet.jpeg', 'Millet'),
('PHome product1', '../images/bleach2.jpg', 'Jik'),
('PHome product2', '../images/dettol.jpg', 'Dettol'),
('PHome product', '../images/dettolsoap.jpg', 'Dettol Soap'),
('PFriuts1', '../images/avocado.jpg', 'Avocado'),
('PFriuts2', '../images/cucumber.jpg', 'Cucumber'),
('PFrozen foods', '../images/titus.jpg','Titus');

//GRANT ALL ON SCHEMA public TO postgres;