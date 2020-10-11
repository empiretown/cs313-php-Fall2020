#first create the TABLE
CREATE DATABASE SHEDMARKET;



CREATE TABLE public.seller
(

	SellerID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)


);

INSERT INTO public.seller (SellerID, LastName, FirstName, Address, City)
VALUES ('');

CREATE TABLE public.buyer 
(

	BuyerID int, 

) INHERITS (public.seller);

INSERT INTO public.buyer ()
VALUES ('');


CREATE TABLE verify_seller_information 
(

  

);



CREATE TABLE public.categories
(

	CategoryID int,
	CategoriesName Varchar(255),

);

INSERT INTO public.categories ()
VALUES ('');


CREATE TABLE public.products
(
   ProductID int,
   ProductName Varchar(255),
   ProductPrice int,


);

INSERT INTO products (product_name, product_price)
VALUES ('');

CREATE TABLE ADD_Products
(


);

CREATE TABLE Remove_products 
(


);

CREATE TABLE public.products_orders
(
	PersonID int,
	OrderDate datetime,


)INHERITS (public.products);





