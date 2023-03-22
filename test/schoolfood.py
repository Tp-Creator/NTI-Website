from urllib import request

url = 'http://www.skolfood.foodservo.com/view?menus'
response = request.urlopen(url)
html = response.read().decode('utf-8')
this_weeks_food_HTML = html.split("<section class ='section_standard_max'>")[1]  # Behövs inte

menu = []
for day_HTML in this_weeks_food_HTML.split("dag")[1:]:
    for i in day_HTML.split("⬇")[1:]:
        menu.append([
            i.split("<")[0].strip(),
            i.split("/ port")[0].split(">")[-1]
        ])
print(menu)