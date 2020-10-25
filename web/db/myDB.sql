#first create the TABLE
CREATE DATABASE SHEDMARKET;



CREATE TABLE user1
(

	id SERIAL PRIMARY KEY NOT NULL,
    first_name varchar(20) NOT NULL,
    last_name varchar(20) NOT NULL,
    username varchar(5) NOT NULL,
    password varchar(9) NOT NULL,
    Address varchar(255) NOT NULL,
    city varchar(255) NOT NULL

);



CREATE TABLE public.buyer 
(

	id SERIAL PRIMARY KEY NOT NULL,
    user_name varchar(20) NOT NULL,
    first_name varchar(20) NOT NULL,
    last_name varchar(20) NOT NULL,
    password varchar(20) NOT NULL,

);

INSERT INTO buyer (id, username ,first_name, last_name, password )
VALUES ('1234', 'jane', 'Doe', 'janD7', 'Qwerty!96');


CREATE TABLE public.categories
(

	category_ID int,
	categories_Name Varchar(255),

);

INSERT INTO public.categories ()
VALUES ('A142-0009', 'Electronics');


CREATE TABLE public.products
(
   product_ID int NOT NULL,
   product_Name Varchar(255) NOT NULL,
   product_Price int NOT NULL,


);

INSERT INTO products (product_ID, product_name, product_price)
VALUES ('B4530-1102', 'LG LED TV "32 inch" ', '45,000 naira');

CREATE TABLE ADD_Products
(


);

CREATE TABLE Remove_products 
(


);

CREATE TABLE public.products_orders
(
	Person_ID int,
	OrderDate datetime,


)INHERITS (public.products);





