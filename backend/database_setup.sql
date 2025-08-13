-- SQL script to create the database and tables for form submissions and search queries

-- Create database (if not exists)
CREATE DATABASE IF NOT EXISTS your_database_name;
USE your_database_name;

-- Table for form submissions
CREATE TABLE IF NOT EXISTS form_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME NOT NULL
);

-- Table for search queries
CREATE TABLE IF NOT EXISTS search_queries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    query_text TEXT NOT NULL,
    searched_at DATETIME NOT NULL
);
