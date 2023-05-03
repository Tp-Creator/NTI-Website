from os.path import exists
from datetime import datetime


def log_file(message, log_type = 1):
    log_file = "logs/" + [
        "messages",
        "main",
        "error"
    ][log_type] + ".log"
    
    if not exists(log_file):
        open(log_file, "w").close()

    current_time = datetime.now().strftime("%Y-%m-%d %H:%M:%S")


    with open(log_file, "a", encoding="utf8") as file:
        file.write(f"\n{current_time}:  {message}")



def log(message, log_type = 1, separator = ": ", colors=[0, "1;90", "1;94", 96, 90, 0]):
    log_name = [
        "messages",
        "main",
        "error"
    ][log_type]
    log_file = f"logs/{log_name}.log"
    
    if not exists(log_file):
        open(log_file, "w").close()

    current_time = datetime.now().strftime("%Y-%m-%d %H:%M:%S")


    with open(log_file, "a", encoding="utf8") as file:
        file.write(f"\n{current_time}{separator}{message}")

    segments = message.split(separator)
    colored_message = separator.join(f"\033[{colors[i+2]}m{segments[i]}" for i in range(len(segments)))
    print(f"\033[{colors[0]}m{current_time}{separator}\033[{colors[1]}m{log_name}\033[0m{separator}{colored_message}\033[0m", flush=True)