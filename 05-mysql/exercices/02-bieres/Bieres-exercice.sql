-- Récupérer la BDD dans les ressources.
--  1. Quels sont les tickets qui comportent l’article d’ID 500, afficher le numéro de  ticket uniquement ? (24 résultats attendus)
SELECT NUMERO_TICKET FROM ventes WHERE ID_ARTICLE = 500;

--  2. Afficher les tickets du 15/01/2014. (1 résultat attendu)
SELECT * FROM ticket WHERE DATE_VENTE = "2014-01-15";

--  3. Afficher les tickets émis du 15/01/2014 au 17/01/2014.(4 résultats attendus)
SELECT * FROM ticket WHERE DATE_VENTE BETWEEN "2014-01-15" AND "2014-01-17";

--  4. Afficher la liste des articles apparaissant à 50 et plus exemplaires sur un ticket.(1274 résultats attendus)
SELECT * FROM ventes INNER JOIN article USING (ID_ARTICLE) WHERE QUANTITE >= 50;

--  5. Quelles sont les tickets émis au mois de mars 2014.(78 résultats attendus)
SELECT * FROM ticket WHERE DATE_VENTE BETWEEN "2014-03-01" AND "2014-03-31";
SELECT * FROM ticket WHERE DATE_VENTE LIKE "2014-03%";
SELECT * FROM ticket WHERE MONTH(DATE_VENTE) = "03" AND ANNEE = 2014;

--  6. Quelles sont les tickets émis entre les mois de mars et avril 2014 ? (166 résultats attendus)
SELECT * FROM ticket WHERE DATE_VENTE BETWEEN "2014-03-01" AND "2014-04-31";
SELECT * FROM ticket WHERE MONTH(DATE_VENTE) BETWEEN "03" AND "04" AND ANNEE = 2014;

--  7. Quelles sont les tickets émis au mois de mars et juin 2014 ? (819 résultats attendus)
SELECT * FROM ticket WHERE DATE_VENTE BETWEEN '2014-03-01' AND "2014-03-31" OR DATE_VENTE BETWEEN '2014-06-01' AND "2014-06-31";
SELECT * FROM ticket WHERE MONTH(DATE_VENTE) = "03" OR MONTH(DATE_VENTE) = "06"  AND ANNEE = 2014;

--  8. Afficher l’id et le nom des bières classée par couleur. (3922 résultats attendus, vous pouvez afficher la couleur pour vérifier votre résultat)
SELECT ID_ARTICLE, NOM_ARTICLE FROM article ORDER BY ID_COULEUR;
SELECT ID_ARTICLE, NOM_ARTICLE, couleur.NOM_COULEUR FROM article INNER JOIN couleur USING (ID_COULEUR) ORDER BY ID_COULEUR;

--  9. Afficher l’id et le nom des bières n’ayant pas de couleur. (706 résultats attendus)
SELECT NOM_ARTICLE, ID_COULEUR FROM article WHERE ID_COULEUR IS NULL;

--  10. Lister pour chaque ticket la quantité totale d’articles vendus classée par quantité décroissante. (4502 résultats attendus)
SELECT NUMERO_TICKET, SUM(QUANTITE) as total FROM ventes GROUP BY NUMERO_TICKET ORDER BY total DESC;

--  11. Lister chaque ticket pour lequel la quantité totale d’articles vendus est supérieure
--  à 500 classée par quantité décroissante.(1026 résultats attendus)
SELECT NUMERO_TICKET, SUM(QUANTITE) FROM ventes GROUP BY NUMERO_TICKET HAVING SUM(QUANTITE) > 500 ORDER BY SUM(QUANTITE) DESC;
SELECT NUMERO_TICKET, SUM(QUANTITE) as total FROM ventes GROUP BY NUMERO_TICKET HAVING total > 500 ORDER BY total DESC;

--  12. Lister chaque ticket pour lequel la quantité totale d’articles vendus est supérieure
--  à 500 classée par quantité décroissante.On exclura du total,
--  les ventes ayant une quantité supérieure à 50  (1021 résultats attendus)
SELECT NUMERO_TICKET, SUM(QUANTITE) as total FROM ventes WHERE QUANTITE <= 50 GROUP BY NUMERO_TICKET HAVING total > 500 ORDER BY total DESC;

--  13. Lister l'id, le nom de la bière, le volume et le titrage des bières de type ‘Trappiste’. (48 résultats attendus.)
SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, TITRAGE FROM article INNER JOIN type ON article.ID_TYPE = type.ID_TYPE WHERE NOM_TYPE = "Trappiste";

--  14. Lister les marques de bières du continent ‘Afrique’ (3 résultats attendus)
SELECT marque.ID_MARQUE, marque.NOM_MARQUE, continent.ID_CONTINENT, continent.NOM_CONTINENT FROM marque INNER JOIN pays ON marque.ID_PAYS = pays.ID_PAYS INNER JOIN continent ON pays.ID_CONTINENT = continent.ID_CONTINENT WHERE continent.NOM_CONTINENT = "Afrique";

--  15. Lister les bières du continent ‘Afrique’ (6 résultats attendus)
SELECT a.NOM_ARTICLE, m.NOM_MARQUE, p.NOM_PAYS, c.NOM_CONTINENT FROM article a INNER JOIN marque m USING(ID_MARQUE) INNER JOIN pays p USING(ID_PAYS) INNER JOIN continent c USING(ID_CONTINENT) WHERE c.NOM_CONTINENT = "Afrique"; 

--  16. Lister les tickets (année, numéro de ticket, montant total payé). En sachant que le
--  prix de vente est égal au prix d’achat augmenté de 15% et que l’on n’est pas
--  assujetti à la TVA. (8263 résultats attendus avec pour les tickets 1, 2 et 3 des totaux égaux à "601.40", "500.05" et "513.33")
SELECT ANNEE, NUMERO_TICKET, SUM(ROUND(QUANTITE * article.PRIX_ACHAT *1.15)) as total FROM ventes INNER JOIN article USING(ID_ARTICLE) GROUP BY ANNEE, NUMERO_TICKET;

--  17. Donner le C.A. par année. (3 résultats attendus : 
-- 2014: "585092.90", 2015: "1513659.30", 2016: "2508155.68")
SELECT ANNEE, SUM(round(QUANTITE * a.PRIX_ACHAT * 1.15)) as total FROM ventes INNER JOIN article ON ventes.ID_ARTICLE = article.ID_ARTICLE GROUP BY ANNEE;

--  18. Lister les quantités vendues de chaque article pour l’année 2016. (1960 résultats attendues (ou 3922))
SELECT ventes.ANNEE, article.NOM_ARTICLE, SUM(ventes.QUANTITE) FROM ventes INNER JOIN article ON ventes.ID_ARTICLE = article.ID_ARTICLE WHERE ventes.ANNEE IN (2016) GROUP BY ventes.ID_ARTICLE;

--  19. Lister les quantités vendues de chaque article pour les années 2014,2015 ,2016. (5838 résultats attendus (ou 11197))
SELECT SUM(ventes.QUANTITE), ventes.ID_ARTICLE, ventes.ANNEE, article.NOM_ARTICLE FROM ventes INNER JOIN article ON ventes.ID_ARTICLE = article.ID_ARTICLE GROUP BY ventes.ID_ARTICLE, ventes.ANNEE ORDER BY ID_ARTICLE;

--  20. Lister les articles qui n’ont fait l’objet d’aucune vente en 2014. (498 résultats attendus)
SELECT NOM_ARTICLE FROM article INNER JOIN ventes ON ventes.ID_ARTICLE = article.ID_ARTICLE WHERE article.ID_ARTICLE NOT IN (SELECT ventes.ID_ARTICLE FROM ventes WHERE ventes.ANNEE = 2014) GROUP BY article.NOM_ARTICLE;

--  21. Coder de 3 manières différentes la requête suivante :
--  Lister les pays qui fabriquent des bières de type ‘Trappiste’. (3 résultats attendus)
SELECT pays.NOM_PAYS FROM pays INNER JOIN marque ON pays.ID_PAYS = marque.ID_PAYS INNER JOIN article ON article.ID_MARQUE = marque.ID_MARQUE INNER JOIN type ON type.ID_TYPE = article.ID_TYPE WHERE type.ID_TYPE IN (13) GROUP BY pays.NOM_PAYS;

SELECT marque.NOM_MARQUE, type.NOM_TYPE, pays.NOM_PAYS FROM marque INNER JOIN pays ON pays.ID_PAYS = marque.ID_PAYS INNER JOIN article ON article.ID_MARQUE = marque.ID_MARQUE INNER JOIN type ON article.ID_TYPE = type.ID_TYPE WHERE type.NOM_TYPE = "Trappiste" GROUP BY marque.NOM_MARQUE;

SELECT p.NOM_PAYS FROM type t INNER JOIN article a USING(ID_TYPE) INNER JOIN marque m USING(ID_MARQUE) INNER JOIN pays p USING(ID_PAYS) WHERE t.NOM_TYPE = "Trappiste" GROUP BY p.NOM_PAYS;

--  22. Lister les tickets sur lesquels apparaissent un des articles apparaissant aussi sur
--  le ticket 2014-856. (38 résultats attendus)

SELECT NUMERO_TICKET FROM ventes WHERE ID_ARTICLE IN (SELECT ID_ARTICLE FROM ventes WHERE ANNEE = 2014 AND NUMERO_TICKET = 856);

--  23. Lister les articles ayant un degré d’alcool plus élevé que la plus forte des
--  trappistes. (74 résultats attendus)
SELECT NOM_ARTICLE FROM article WHERE titrage > (SELECT titrage FROM article a INNER JOIN type t ON t.ID_TYPE = a.ID_TYPE WHERE t.NOM_TYPE = "trappiste" ORDER BY titrage DESC LIMIT 1);

SELECT NOM_ARTICLE, TITRAGE, VOLUME FROM article WHERE titrage > (SELECT MAX(titrage) FROM article a INNER JOIN type t ON t.ID_TYPE = a.ID_TYPE WHERE t.NOM_TYPE = "trappiste");

--  24. Afficher les quantités vendues pour chaque couleur en 2014.
-- (5 résultats attendus : Blonde	"72569", Brune	"49842"	,
-- NULL	"36899", Ambrée	31427, Blanche	14416	)
SELECT c.NOM_COULEUR, SUM(v.QUANTITE) as total FROM couleur c INNER JOIN article a USING (ID_COULEUR) INNER JOIN ventes v USING(ID_ARTICLE) WHERE v.ANNEE = 2014 GROUP BY c.NOM_COULEUR;

--  25. Donner pour chaque fabricant, le nombre de tickets sur lesquels apparait un de
--  ses produits en 2014. (11 résultats attendus dont 7383 sans NULL)
SELECT fabricant.NOM_FABRICANT, COUNT(ventes.NUMERO_TICKET) FROM fabricant INNER JOIN marque ON fabricant.ID_FABRICANT = marque.ID_FABRICANT INNER JOIN article ON marque.ID_MARQUE = article.ID_MARQUE INNER JOIN ventes ON ventes.ID_ARTICLE = article.ID_ARTICLE WHERE ventes.ANNEE = 2014 GROUP BY fabricant.NOM_FABRICANT;

-- 26. Donner l’ID, le nom, le volume et la quantité vendue des 20 articles les plus  vendus en 2016. 
--(résultats allant de l'id "3192" avec 597 ventes à l'id "3789" avec 488 ventes)
SELECT article.ID_ARTICLE, article.NOM_ARTICLE, article.VOLUME, SUM(ventes.QUANTITE) FROM ventes INNER JOIN article ON article.ID_ARTICLE = ventes.ID_ARTICLE WHERE ventes.ANNEE = 2016 GROUP BY article.ID_ARTICLE ORDER BY SUM(ventes.QUANTITE) DESC LIMIT 20;

--  27. Donner l’ID, le nom, le volume et la quantité vendue des 5 ‘Trappistes’ les plus vendus en 2016.
-- (résultats allant de l'id "3588" avec 502 ventes à l'id "2104" avec 357 ventes)
SELECT a.ID_ARTICLE, a.NOM_ARTICLE, a.VOLUME, SUM(v.QUANTITE) as Total FROM article a INNER JOIN ventes v USING (ID_ARTICLE) INNER JOIN type t USING (ID_TYPE) WHERE v.ANNEE = 2016 AND t.NOM_TYPE = "Trappiste" GROUP BY a.ID_ARTICLE ORDER BY Total DESC LIMIT 5;

--  28. Donner l’ID, le nom, le volume et les quantité vendues en 2015 et 2016, des
--  bières dont les ventes ont été stables. (moins de 1% de variation)
-- (29 résultats attendus)
SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, 
    (SELECT SUM(QUANTITE) FROM ventes WHERE ID_ARTICLE = A.ID_ARTICLE AND ANNEE = 2015) as "2015",
    (SELECT SUM(QUANTITE) FROM ventes WHERE ID_ARTICLE = A.ID_ARTICLE AND ANNEE = 2016) as "2016"
    FROM article A
    WHERE CAST((SELECT SUM(QUANTITE) FROM ventes WHERE ID_ARTICLE = A.ID_ARTICLE AND ANNEE = 2016) -
    (SELECT SUM(QUANTITE) FROM ventes WHERE ID_ARTICLE = A.ID_ARTICLE AND ANNEE = 2015) as FLOAT)/
    (SELECT SUM(QUANTITE) FROM ventes WHERE ID_ARTICLE = A.ID_ARTICLE AND ANNEE = 2015)*100 BETWEEN -1 AND 1
    ORDER BY A.ID_ARTICLE;

--  29. Lister les types de bières suivant l’évolution de leurs ventes entre 2015 et 2016.
--  Classer le résultat par ordre décroissant des performances.
-- (13 résultats attendus allant de "Bio" 82.71 à "Lambic" 47.28)
select ID_TYPE, NOM_TYPE,
  round(
    (
    cast(
      (
        select sum(quantite)
        from ventes
        where annee = 2016
          and ID_article in (
            select ID_article
            from article
            where ID_TYPE = t.id_type
            )
      )
      - 
      (
        select sum(quantite)
        from ventes
        where annee = 2015
          and ID_article in 
            (
              select ID_article
              from article
              where ID_TYPE = t.id_type
            )
      )
    as float) /
    (
      select sum(quantite)
      from ventes
      where annee = 2015
      and ID_article in 
        (
          select ID_article
          from article
          where ID_TYPE = t.id_type
        )
    )
  * 100) ,2) as evolution
from type t
order by evolution desc

--  30. Existe-t-il des tickets sans vente ? (3 résultats attendus)
SELECT ANNEE, NUMERO_TICKET FROM ticket WHERE CONCAT(ANNEE, NUMERO_TICKET) NOT IN (SELECT CONCAT(ANNEE, NUMERO_TICKET) FROM ventes);

--  31. Lister les produits vendus en 2016 dans des quantités jusqu’à -15% des quantités
--  de l’article le plus vendu. (12 résultats attendus)
select a.ID_ARTICLE,
    NOM_ARTICLE,
    (select sum(QUANTITE) from ventes where ANNEE = 2016 and ID_ARTICLE = a.ID_ARTICLE) as qte
from article a
where (select sum(QUANTITE) from ventes where ANNEE = 2016 and ID_ARTICLE = a.ID_ARTICLE)
        >=
      (select sum(QUANTITE)as q from ventes where ANNEE = 2016 group by ID_ARTICLE order by q desc limit 1) * 0.85
order by qte desc;

--  LES BESOINS DE MISE A JOUR
--  32. Appliquer une augmentation de tarif de 10% pour toutes les bières ‘Trappistes’ de couleur ‘Blonde’ (Résultat attendu : 22 lignes modifiées)
UPDATE article SET PRIX_ACHAT = PRIX_ACHAT * 1.1
WHERE ID_COULEUR = (SELECT ID_COULEUR FROM couleur WHERE NOM_COULEUR = "Blonde") AND ID_TYPE = (SELECT ID_TYPE FROM type WHERE NOM_TYPE = "Trappiste");

--  33. Mettre à jour le degré d’alcool de toutes les bières n’ayant pas cette information.
--  On y mettra le degré d’alcool de la moins forte des bières du même type et de même couleur. (6 lignes modifiées ou 28)
UPDATE article a1 SET TITRAGE = 
(SELECT MIN(TITRAGE) FROM article a2 WHERE a1.ID_COULEUR = a2.ID_COULEUR AND a1.ID_TYPE = a2.ID_TYPE)
WHERE TITRAGE IS NULL;

-- VERSION compliqué qui prend en compte couleur et type séparé :
UPDATE article a SET TITRAGE = 
IF((SELECT MIN(TITRAGE) FROM article WHERE a.ID_Couleur = ID_Couleur AND a.ID_TYPE = ID_TYPE) IS NOT NULL,
  	(SELECT MIN(TITRAGE) FROM article WHERE a.ID_Couleur = ID_Couleur AND a.ID_TYPE = ID_TYPE),
  IF((SELECT MIN(TITRAGE) FROM article WHERE a.ID_TYPE = ID_TYPE) IS NOT NULL,
    (SELECT MIN(TITRAGE) FROM article WHERE a.ID_TYPE = ID_TYPE),
    IF((SELECT MIN(TITRAGE) FROM article WHERE a.ID_Couleur = ID_Couleur) IS NOT NULL,
      (SELECT MIN(TITRAGE) FROM article WHERE a.ID_Couleur = ID_Couleur),
      (SELECT MIN(TITRAGE) FROM article)))) 
WHERE TITRAGE IS NULL;

--  34. Suppression des bières qui ne sont pas des bières ! (type ‘Bière Aromatisée’) (262 lignes supprimées)
DELETE FROM article WHERE ID_TYPE = (SELECT ID_TYPE FROM type WHERE NOM_TYPE = "Bière Aromatisée");

--  35. Supprimer les tickets qui n’ont pas de ventes.(3 lignes supprimées)
DELETE FROM ticket WHERE CONCAT(ANNEE, NUMERO_TICKET) NOT IN (SELECT CONCAT(ANNEE, NUMERO_TICKET) FROM ventes);