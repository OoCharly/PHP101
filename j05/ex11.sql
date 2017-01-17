SELECT UPPER(fp.nom) AS NOM,prenom,prix FROM membre m INNER JOIN fiche_personne fp ON m.id_fiche_perso=fp.id_perso INNER JOIN abonnement ab ON ab.id_abo=m.id_abo WHERE ab.prix > 42 ORDER BY nom,prenom ASC;