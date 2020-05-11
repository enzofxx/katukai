Užduotis:

Sukurti puslapį, kuris turėtų tokius URL: whateverdomain.com/N, kur N yra skaičius nuo 1 iki 1000000.
Kiekviename tokiame URL išvedamos 3 skirtingos kačių veislės iš sąrašo cats.txt tokia tvarka:
Cat1, Cat2, Cat3
Kačių kombinacijos cache'uojamos 60 sekundžių, t.y. jei kombinacija Cat1, Cat2, Cat3 buvo parodyta URL whateverdomain.com/N, tai 60 sekundžių tas URL turi grąžinti tokią pačią kombinaciją.
Puslapis renka lankytojų statistiką:
countAll - suma visų puslapio atidarymų su visomis N reikšmėmis.
countN - suma atidarymų konkrečiai N reikšmei.
Papildomai puslapis rašo log failą JSON formatu, kiekvienam atidarymui iš naujos eilutės:
{
"datetime": “yyyy-MM-dd HH:mm:ss”,
"N": N,
"Cats": ["Cat1", "Cat2", "Cat3"],
"countAll": countAll,
"countN": countN
}
