b1 Tao db
CREATE DATABASE cart_cookie;
CREATE TABLE Products(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title VARCHAR(100) NOT NULL,
    thumbnail VARCHAR(500) NOT NULL,
    content LONGTEXT, 
    price FLOAT,
    created_at DATETIME,
    UPDATED_AT DATETIME
);
CREATE TABLE Orders(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    order_date DATETIME
);
CREATE TABLE OrderDetails(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    order_id INT NOT NULL ,
    product_id INT NOT NULL,
    num INT,
    price FLOAT,
    CONSTRAINT fk_orders FOREIGN KEY (order_id) REFERENCES Orders(id),
    CONSTRAINT fk_products FOREIGN KEY (product_id) REFERENCES Products(id)
);
ALTER TABLE orders ADD COLUMN note longtext
b2 Xay dung cau truc du an
- db
    - config.php
    - dbhelper.php
- utils
    - utility.php
b3: fake data

b4: phat trien cac chuc nang 
- product.php
- details.php
- cart.php
    sd cookie -> tgian lau(phu thuoc tgian set)
                -> id sp + so luong
                cart: [
                    {
                        "id" : 1,
                        "num": 3
                    }, {
                        "id" : 2,
                        "num": 2
                    }
                ]
        sesion -> tgian ngan