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
    invStock Varchar(20) NOT NULL,
    categoryId Varchar(20) NOT NULL,
    invVendor Varchar(20) NOT NULL
);




CREATE TABLE categories (
    categoryId SERIAL PRIMARY KEY,
    categoryName Varchar(50) NOT NULL,

);


CREATE TABLE product_orders
(
    id SERIAL PRIMARY KEY,
    orderNumber Varchar(10) NOT NULL,
    OrderDate DATE,
    totalAmnt INT NOT NULL,
    customer_id INT NOT NULL REFERENCES customer(id);
);

INSERT INTO seller (companyName, companyLogo) VALUES
('Grains', '../images/rice beans market.jpg'),
('Home product',' ../images/bleach.jpg'),
('Friuts', '../images/cashew.jpg'),
('Frozen foods', '../images/titus.jpg');

INSERT INTO product_item( product_item_name, product_item_price, product_image, seller_id) VALUES
('PGrains1', '../images/parboiledrice.jpg', 'Parboiled Rice', 15000.00, 1),
('PGrains2', '../images/beans.jpg', 'Beans', 600.00, 1),
('PGrains3', '../images/millet.jpeg', 'Millet', 1000.00, 2),
('PHome product1', '../images/bleach2.jpg', 'Jik', '1500.00', 3),
('PHome product2', '../images/dettol.jpg', 'Dettol', 800.00, 2),
('PHome product', '../images/dettolsoap.jpg', 'Dettol Soap', 500.00, 3),
('PFriuts1', '../images/avocado.jpg', 'Avocado', 50.00, 4),
('PFriuts2', '../images/cucumber.jpg', 'Cucumber', 50.00, 4),
('PFrozen foods', '../images/titus.jpg','Titus', 450.00, 5);

//GRANT ALL ON SCHEMA public TO postgres;