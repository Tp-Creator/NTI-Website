from urllib import request
from functions import *


url = 'http://www.skolfood.foodservo.com/view?menus'
response = request.urlopen(url)
html = response.read().decode('utf-8')
this_weeks_food_HTML = html.split("<section class ='section_standard_max'>")[1] # [1] gör att det bara är den första veckan som tas

menu = []
for day_HTML in this_weeks_food_HTML.split("dag")[1:]:
    for i in day_HTML.split("⬇")[1:]:
        menu.append([
            i.split("<")[0].strip(),
            float(i.split("/ port")[0].split(">")[-1].replace(",", "."))   # Enheten för koldioxid halt är (x/portion)CO2e/kg
        ])





# Prepare an INSERT query with placeholders
query = "INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2) VALUES (%s, %s, %s, %s, %s)"

# Create a cursor object
myCursor = mydb.cursor()

# Execute the query with values
values = ('2023-04-24', 'Oxpytt med rödbetor', 'Vegetarisk pytt med garbanzobönor serveras med rödbetor', 0.62, 0)
myCursor.execute(query, values)

# Commit the changes to the database
mydb.commit()

# Close the database connection
mydb.close()


log("Successfully fetched food data")



# (SELECT * FROM food_menu WHERE dt = 3) Hämtar alla rader från food_menu om dt = 3
# (INSERT INTO forum_question (CourseID, userID, Title, Content, dt, Upvote) VALUES (?, ?, ?, ?, ?, ?))

# INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
# VALUES ('2023-04-24', 'Oxpytt med rödbetor', 'Vegetarisk pytt med garbanzobönor serveras med rödbetor', 0.62, 0);