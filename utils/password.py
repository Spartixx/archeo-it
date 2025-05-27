import random

uppercase_letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
lowercase_letters = "abcdefghijklmnopqrstuvwxyz"
digits = "123456789"
special_characters = "!@#$%^&*()-=+[]{|;:,.<>?/"

print("Faites votre choix : " )
print("1 - Caractères alphabétiques uniquement")
print("2 - Caractères alphabétiques et numériques")
print("3 - Caractères alphabétiques, numériques et caractères spéciaux")
choix = input("Votre choix (1, 2 ou 3) : ")

size = 15

groupes = []

if choix == "1":
    groupes = [uppercase_letters, lowercase_letters]
elif choix == "2":
    groupes = [uppercase_letters, lowercase_letters, digits]
elif choix == "3":
    groupes = [uppercase_letters, lowercase_letters, digits, special_characters]
else:
    print("Choix invalide ! Veuillez réessayer.")
    exit()

password = [random.choice(groupe) for groupe in groupes]
used_chars = ''.join(groupes)
password += random.choices(used_chars, k=size - len(password))

random.shuffle(password)

print("Mot de passe généré :", ''.join(password))
