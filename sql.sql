create table products(
        id int not null AUTO_INCREMENT,
        name varchar(20) not null,
        image varchar(100) not null,
        price float not null,
    primary key (id)
);

create table customers(
    customer_id int not null AUTO_INCREMENT,
    customer_name varchar(10) not null,
    customer_contact varchar(11) not null,
    customer_address varchar(15) not null,
    customer_email varchar(30) not null,
    customer_dob date not null,
    customer_password varchar(20) not null,
    primary key(customer_id)
    

);

ALTER TABLE customers AUTO_INCREMENT=1000;

create table bill(
    bill_id int not null AUTO_INCREMENT,
    customer_id int not null,
    primary key(bill_id),
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);




create table order_details(
    bill_id int not null,
    product_id int not null,
    product_quantity int ,
    
    net_total float not null,
    order_date date not null,
    FOREIGN KEY (bill_id) REFERENCES bill(bill_id),
    FOREIGN KEY (product_id) REFERENCES products(id)

);

