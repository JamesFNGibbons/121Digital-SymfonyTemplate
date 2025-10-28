-- Create database for REG121 Homepage
CREATE DATABASE reg121_homepage;
GO

-- Use the database
USE reg121_homepage;
GO

-- Create a sample table for testing
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    email NVARCHAR(255) NOT NULL UNIQUE,
    first_name NVARCHAR(100) NOT NULL,
    last_name NVARCHAR(100) NOT NULL,
    created_at DATETIME2 DEFAULT GETDATE(),
    updated_at DATETIME2 DEFAULT GETDATE()
);
GO

-- Insert sample data
INSERT INTO users (email, first_name, last_name) VALUES 
('admin@reg121.com', 'Admin', 'User'),
('test@reg121.com', 'Test', 'User');
GO

PRINT 'Database reg121_homepage created successfully with sample data';
