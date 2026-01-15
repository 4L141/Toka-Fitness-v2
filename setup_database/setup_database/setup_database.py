import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password=""
)

mycursor = mydb.cursor()

mycursor.execute("CREATE DATABASE IF NOT EXISTS users")
mycursor.execute("""CREATE TABLE IF NOT EXISTS users.users (
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
first_name VARCHAR(20)NOT NULL,
last_name VARCHAR(40)NOT NULL,
email VARCHAR(60)NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date DATETIME NOT NULL,
is_admin BOOLEAN DEFAULT FALSE,
PRIMARY KEY (user_id),
UNIQUE (email)
)""")


mycursor.execute("""CREATE TABLE IF NOT EXISTS users.logs (
log_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
user_id INT UNSIGNED NOT NULL,
email VARCHAR(60) NOT NULL,
action VARCHAR(255) NOT NULL,
timestamp DATETIME NOT NULL,
PRIMARY KEY (log_id),
FOREIGN KEY (user_id) REFERENCES users.users(user_id)
)""")


mycursor.execute("""CREATE TABLE IF NOT EXISTS users.analytics (
analytics_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
metric_name VARCHAR(60) NOT NULL,
metric_value VARCHAR(255) NOT NULL,
timestamp DATETIME NOT NULL,
PRIMARY KEY (analytics_id)
)""")