from urllib import request

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

with open("test", "w") as file:
    file.write("\n".join("|".join(item) for item in menu))
print("Success")


# (SELECT * FROM food_menu WHERE dt = 3) Hämtar alla rader från food_menu om dt = 3
# (INSERT INTO forum_question (CourseID, userID, Title, Content, dt, Upvote) VALUES (?, ?, ?, ?, ?, ?))