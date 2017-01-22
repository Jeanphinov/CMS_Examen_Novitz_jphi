Formulaire
==========

Il y a deux facons d'ajouter un formulaire au site:
* utiliser un puggin (contact form 7)
* créer entièrement un formulaire 

J'ai d'abord installé et activer l'extension Contact Form 7 et cela fonctionne mais pour l'examen j'ai décidé de créer un 
formulaire en mode développeur.

Le formulaire
-------------

J'ai créé un ficher template contact.php qui contient la mise en forme et mon formulaire html.  
``` <form action="" method="POST" class="form-horizontal"> ```
* Je ne met pas de destination pour _action_ car je veux que la page renvoie vers le formulaire
* J'ai choisi la méthode _POST_
* Le formulaire sera _horizontal_

```<?php wp_nonce_field('contacter', 'form-jphi'); ?> ```
la fonction wp_nonce_field est une fonction qui sert à la verification.  C'est une fonction qui sert de verification, que 
le formulaire ne soit pas mal utilisé ou détourné.  Il vérifie entre autre que le formulaire a bien été envoyé du site et non de l'extérieur.
_nonce_ signifie __number used once__ c'est une sorte de tokern, ses parametres sont une action et un nom.

Traitement du formulaire
------------------------

Fichier formulaire.php
La  fonction __form_submit()__ traite le formulaire en verrifiant que le _nonce_ est bien correct, que j'ai bien reçu le formulaire 
 via methode POST.  Si tout va bien je récupère les différentes valeurs que met dans des variables. Si mes variables ne sont pas vides c'est que
 tout s'est bien déroulé:
 
 ``` add_action('template_redirect', 'form_submit'); ```` 
 intercepte le formulaire avant que la page ne traite le header c'est cela qui me permet de tester le form  
   
   
 J'envoie alors le mail avec __wp_mail($to, $email, $message)__  
 * wp_mail renvoie true si le mail a été envoyé et false si il y eu une erreur.
 * je teste si c'est true ou false 
 * je créer une petite variable en fonction du résultat:
  -  ```$url = add_query_arg('succes', 'Envoyé !', home_url());```  
   true: message qui se nomme 'succès' et affichera 'envoyé' je prévois une redirection vers la page d'accueil
   - ```$url = add_query_arg('erreur', 'Problème', wp_get_referer());```  
   false= message qui se nomme 'erreur' et affichera 'probleme!' je prévois une redirection vers la page actuelle  
   
 En gros au submit du formulaire s'il manque un champs ou si il ya un soucis le formulaire se réaffiche avec une message 
 d'erreur en rouge .  Si tout se passe bien on est renvoyé sur la page d'accueil avec le message de réussite en vert.  
 
   
   ``` 
   if (isset($_GET['succes']))
   {
       ?>
       <div class="alert alert-icon alert-success" role="alert">
           <?php echo $_GET['succes']?>
       </div>
   <?php }
               if (isset($_GET['erreur']))
               {
                   ?>
                   <div class="alert alert-icon alert-danger" role="alert">
                       <?php echo $_GET['erreur']?>
                   </div>
               <?php }
   ```

Ci dessus un exemple de détection et d'affichage d'un message de réussite sur la page d'accueil.
            
     