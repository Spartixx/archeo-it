import random

lettres_majuscules = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
lettres_minuscules = "abcdefghijklmnopqrstuvwxyz"
chiffres = "123456789"
caracteres_speciaux = "!@#$%^&*()-=+[]{|;:,.<>?/"

print("Faites votre choix : " )
print("1 - Caractères alphabétiques uniquement")
print("2 - Caractères alphabétiques et numériques")
print("3 - Caractères alphabétiques, numériques et caractères spéciaux")
choix = input("Votre choix (1, 2 ou 3) : ")

longueur_mot_de_passe = 15

groupes = []

if choix == "1":
    groupes = [lettres_majuscules, lettres_minuscules]
elif choix == "2":
    groupes = [lettres_majuscules, lettres_minuscules, chiffres]
elif choix == "3":
    groupes = [lettres_majuscules, lettres_minuscules, chiffres, caracteres_speciaux]
else:
    print("Choix invalide ! Veuillez réessayer.")
    exit()

mot_de_passe = [random.choice(groupe) for groupe in groupes]
characteres_utilises = ''.join(groupes)
mot_de_passe += random.choices(characteres_utilises, k=longueur_mot_de_passe - len(mot_de_passe))

random.shuffle(mot_de_passe)

print("Mot de passe généré :", ''.join(mot_de_passe))
