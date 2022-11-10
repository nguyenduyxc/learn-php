=== Phan tich Mini prj quan ly user === 
- register.php
    + neu da dang nhap -> user.php(auto)
    + dk thanh cong -> login.php
- login.php
    + neu da dang nhap -> user.php(auto)
    + dang nhap thanh cong -> user.php
-user.php
    + chua dang nhap -> login.php(auto)
    + show list ng dung 

=== Cach bc ===
b1: Xay dung db 
CREATE TABLE Users(	
    id int(10) PRIMARY KEY AUTO_INCREMENT,   	
    fullname varchar(255) NOT NULL,  	
    email varchar(255) NOT NULL,   
    birthday date NOT NULL,   
    password varchar(255) NOT NULL,    
    address varchar(255) NOT NULL
);

b2: phat trien du an 
- build thu vien dung chung 
    config.php
    dbhelper.php
    utility.php
- Xay dung page
    register.php
    login.php
    user.php
- Phat trien them chuc nang cookie
- Bao mat ve login
    + Xac minh dc tai khoan nao dang dang nhap he thong
    + quan ly trang thai dang nhap cua tk khoan do 
    + dam bao tinh bao mat
    -> giai phap 
        + Login thanh cong -> tao ra token (o cookie), gia tri token khac nhau vs moi tk, tai tung thoi diem 
        + token -> xac thuc token co hon le ko -> ung vs tai khoan ng dung nao
        -> yeu cau: luu token vao db 

