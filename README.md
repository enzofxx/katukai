Užduotis:<br/>

Sukurti puslapį, kuris turėtų tokius URL: whateverdomain.com/N, kur N yra skaičius nuo 1 iki 1000000.<br/>
Kiekviename tokiame URL išvedamos 3 skirtingos kačių veislės iš sąrašo cats.txt tokia tvarka:<br/>
Cat1, Cat2, Cat3<br/>
Kačių kombinacijos cache'uojamos 60 sekundžių, t.y. jei kombinacija Cat1, Cat2, Cat3 buvo parodyta URL whateverdomain.com/N, tai 60<br/> sekundžių tas URL turi grąžinti tokią pačią kombinaciją.<br/>
Puslapis renka lankytojų statistiką:<br/>
countAll - suma visų puslapio atidarymų su visomis N reikšmėmis.<br/>
countN - suma atidarymų konkrečiai N reikšmei.<br/>
Papildomai puslapis rašo log failą JSON formatu, kiekvienam atidarymui iš naujos eilutės:<br/>
{<br/>
"datetime": “yyyy-MM-dd HH:mm:ss”,<br/>
"N": N,<br/>
"Cats": ["Cat1", "Cat2", "Cat3"],<br/>
"countAll": countAll,<br/>
"countN": countN<br/>
}
