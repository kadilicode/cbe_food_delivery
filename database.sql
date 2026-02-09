CREATE DATABASE IF NOT EXISTS cbe_food_delivery;
USE cbe_food_delivery;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    address TEXT,
    role ENUM('customer', 'admin') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE menu_items (
    item_id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    is_available TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    delivery_address TEXT NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    payment_method ENUM('cash_on_delivery', 'airtel_money', 'tigo_pesa', 'mpesa', 'halopesa') NOT NULL,
    payment_status ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
    order_status ENUM('pending', 'confirmed', 'preparing', 'out_for_delivery', 'delivered', 'cancelled') DEFAULT 'pending',
    payment_phone VARCHAR(15),
    order_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE order_items (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES menu_items(item_id) ON DELETE CASCADE
);

CREATE TABLE reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    order_id INT NOT NULL,
    item_id INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES menu_items(item_id) ON DELETE CASCADE
);

INSERT INTO users (full_name, email, phone, password_hash, role) 
VALUES ('Admin', 'kadiliy17@gmail.com', '0618240534', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

INSERT INTO categories (category_name, description, image_url) VALUES
('Pilau', 'Pilau ya kupendeza', 'food1.jpg'),
('Wali na Maharage', 'Wali wa rangi na maharage', 'food2.jpg'),
('Chips & Chicken', 'Chipsi na kuku', 'food3.jpg'),
('Ugali & Samaki', 'Ugali na samaki wa kupendeza', 'food4.jpg'),
('Biriyani', 'Biriyani ya Indian', 'food5.jpg'),
('Drinks', 'Vinywaji', 'food6.jpg');

INSERT INTO menu_items (category_id, item_name, description, price, image_url) VALUES
(1, 'Pilau ya Kuku', 'Pilau ya kuku wenye mchuzi mzuri', 8000.00, 'food1.jpg'),
(2, 'Wali na Maharage', 'Wali wa rangi na maharage ya nazi', 5000.00, 'food2.jpg'),
(3, 'Chips na Quarter', 'Chipsi za viazi na quarter chicken', 10000.00, 'food3.jpg'),
(4, 'Ugali na Samaki', 'Ugali na samaki wa kukaanga', 12000.00, 'food4.jpg'),
(5, 'Biriyani ya Nyama', 'Biriyani ya nyama ya ng\'ombe', 15000.00, 'food5.jpg'),
(6, 'Juice ya Maembe', 'Juice fresh ya maembe', 3000.00, 'food6.jpg');
