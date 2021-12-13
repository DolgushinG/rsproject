import json
import requests
from bs4 import BeautifulSoup

month = {
    "января": "01",
    "февраля": "02",
    "марта": "03",
    "апреля": "04",
    "мая": "05",
    "июня": "06",
    "июля": "07",
    "августа": "08",
    "сентября": "09",
    "октября": "10",
    "ноября": "11",
    "декабря": "12",
}


class Event:
    def __init__(self, name, date_start, date_end, event_categories, link, place):
        self.name = name
        self.date_start = date_start
        self.date_end = date_end
        self.event_categories = event_categories
        self.link = link
        self.place = place

    name = None
    date_start = None
    date_end = None
    time_start = "08:00"
    time_end = "23:00"
    event_categories = None
    link = None
    place = None


def parser_cfr():
    response = requests.post(
        'https://rusclimbing.ru/competitions/?year=2022&ranks=&types=0&groups=0&disciplines=0&start=&end=')
    if response.status_code != 200:
        return f'not connect with testservice'
    soup = BeautifulSoup(response.content, 'html.parser')
    result = {}
    months = soup.find_all("div", class_="calendar-card__month")
    dates = soup.find_all("div", class_="calendar-card__date")
    names = soup.find_all("div", class_="calendar-card__name")
    categories = soup.find_all("div", class_="calendar-card-full j-card-full")
    places = soup.find_all("div", class_="calendar-location__city")
    links = soup.find_all("a", class_="calendar-card__link")
    for x in range(0, len(soup.find_all("div", class_="calendar-card__name"))):
        m = months[x].text.split()
        d = dates[x].text.strip().split()
        year = "2022"
        data_start = f'{year}-{month[m[0]]}-{d[0]}'
        data_end = f'{year}-{month[m[1]]}-{d[1]}'
        category = find_category(categories[x])
        link = "https://rusclimbing.ru" + links[x].get('href')
        place = places[x].text.strip()
        result.update({x: Event(names[x].text.strip(), data_start, data_end, category, link, place)})
    return result


def find_category(x):
    lead = x.text.find("Т")
    boulder = x.text.find("Б")
    category = []
    if boulder > 0:
        category.append("2")
    if lead > 0:
        category.append("1")
    category.append("4")
    return category


events = parser_cfr()
# convert to JSON format
json_file = list()
for x in range(0, len(events)):
    json_file.append(events[x].__dict__)


with open('data.json', 'w', encoding='utf-8') as f:
    json.dump(json_file, f, ensure_ascii=False, indent=4)


