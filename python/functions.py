from datetime import datetime
import mysql.connector

# Connect to the database
mydb = mysql.connector.connect(
  host="localhost",
  user="yourusername",
  password="yourpassword",
  database="yourdatabase"
)


# funktion för att skriva till log
# Skriver datum först och sedan meddelandet som anges som argument
def log(msg):
    nowDate = datetime.now()
    nowStr = nowDate.strftime("%Y-%m-%d, %H:%M:%S")

    with open("python/log.txt", 'a', encoding="utf8") as file:
        file.write(f"\n{nowStr}  {str(msg)}")
    
    return None