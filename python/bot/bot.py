import sys
import discord
from log import *

from cryptography.fernet import Fernet
from os.path import exists
from os import system

cipher_suites = Fernet(input("Key: ").encode('utf-8'))

def saveToken(token):
    file = "token.txt"

    if not exists(file):
        open(file, "w").close()

    with open(file, "a") as file:
        file.write(cipher_suites.encrypt(token.encode('utf-8')).decode('utf-8'))

def loadToken(token_number):
    file = "token.txt"

    if not exists(file):
        open(file, "w").close()

    with open(file, "r") as file:
        return cipher_suites.decrypt(file.read().split("\n")[token_number].encode('utf-8')).decode('utf-8')



class MyBot(discord.Client):
    async def on_connect(self):
        self.moderators = []
        with open("moderators.txt", "r") as file:
            for part in  file.read().split(","):
                self.moderators.append(int(part))

    async def on_ready(self):
        print(f"\nSuccessful login as {self.user}")
        
        await self.get_user(self.moderators[0]).send("Salve, ego sum in linea.")

    
    async def on_message(self, message):
        if message.author == self.user:
            return
        
        command, *subcommands = message.content.split(" ")


        log(f"{message.channel}: {message.author}: {message.content}", log_type=0, colors=[0, "1;30", "1;34", 96, 0])

        if message.author.id in self.moderators:
            log(f"{message.author}: Authorized", log_type=0, colors=[0, "1;30", 96, 32])
            if command == "update":
                system("git pull")
                system("systemctl restart httpd")
                await message.channel.send("Successfully updated gradeless")
            
            elif command == "mod":
                if subcommands[0] == "add":
                    self.moderators.append(int(subcommands[1]))

                elif subcommands[0] == "remove":
                    self.moderators.remove(int(subcommands[1]))

                elif subcommands[0] == "list":
                    await message.channel.send(">>> " + "\n".join(self.moderators))

            elif command == "help":
                await message.channel.send(">>> The only two commands this bot has is update and help.\nDo not contact the programer for more info.")
            
        
        else:
            log(f"{message.author}: Not Authorized", log_type=0, colors=[0, "1;30", 96, 31])


intents = discord.Intents.default()
intents.message_content = True
intents.members = True

client = MyBot(intents=intents)
 
if __name__ == "__main__":
    with open("logs/error.log", "a") as file:
        file.write("\n"*10)
        sys.stderr = file

        token_number = input("Token number: ")
        client.run(loadToken(token_number if token_number.isdigit() else 0))
        sys.stderr = sys.__stderr__