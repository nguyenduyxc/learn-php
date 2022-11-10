=== b1 tao db
CREATE DATABASE cart_session;
CREATE TABLE products(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title VARCHAR(255) NOT NULL,
    thumbnail VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    contents LONGTEXT NOT NULL, 
    created_at DATETIME,
    updated_at DATETIME
);
CREATE TABLE orders(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    note LONGTEXT NOT NULL,
    date_order DATETIME NOT NULL
);
CREATE TABLE orderdetails(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_id INT NOT NULL,
    order_id INT NOT NULL,
    num INT NOT NULL,
    price FLOAT,
    CONSTRAINT pk_product FOREIGN KEY  (product_id) REFERENCES products(id),
    CONSTRAINT pk_order FOREIGN KEY  (order_id) REFERENCES orders(id)
);

ALTER TABLE products ADD COLUMN created_at DATETIME NOT NULL;
ALTER TABLE products ADD COLUMN updated_at DATETIME NOT NULL;
=== b2 add cac thu vien can thiet 
- db    
    - config.php
    - dbhelper.php
- utils
    - utility.php
=== b3 fake dl
INSERT INTO `products` (`id`, `title`, `thumbnail`, `price`, `contents`, `created_at`, `updated_at`) VALUES (NULL, 'Samsung Galaxy A13', 'https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/3/22/637835361843548009_samsung-galaxy-a13-den-dd.jpg', '4090000', 'Chính: 6.6 inch, TFT LCD, FHD+, 1200 x 2408 Pixels\r\n\r\n50.0 MP + 5.0 MP + 2.0 MP + 2.0 MP\r\n\r\n8.0 MP\r\n\r\nExynos 850\r\n\r\n128 GB', '2022-11-05 03:05:28.000000', '2022-11-05 03:05:28.000000');
=== b4 tao cac trang
- products.php
- detail.php
- cart.php
    cart luu session
        - $SESSION['cart'] = [
            [
                'id' => $id,
                'num' => $num
            ], ...
        ]
    site
        count   title   num   price     total   del
- buy.php



