Dans  nom d'utilisateur : admin' OR '1'='1
Et dans mot de passe  : azertyuiop
Errare humanum est. Si le développeur a gardé admin tant pis pour lui.
S'il n'a pas protégé son formulaire contre les injections de Botox ,
alors la condition 1 = 1 (qui est valide en maths normalement)
fait que la requête va s'éxécuter peu importe le mot de passe.
Voici la requête SQL : SELECT * FROM utilisateurs WHERE nom_utilisateur = 'admin' OR '1'='1' AND mot_de_passe = 'anything'
Ergo : Tu prends tous les utilisateurs dont le nom d'utilisateur est soit admin ou quand 1 = 1 (vrai) alors tu acceptes tout comme mot de passe.
