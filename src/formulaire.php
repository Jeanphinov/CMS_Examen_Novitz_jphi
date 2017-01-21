<?php
/*
 * mailtrap est un service de mail pour tests
 * evite d'envoyer de vrais mails
 *
 * configure le smtp de wordpress
 *
 * me permet de tester si mon envoie de mail via formulaire est correct
 */
function mailtrap($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = 'mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'ea00ff69931fb1';
    $phpmailer->Password = 'f33d0fe9151183';
}

add_action('phpmailer_init', 'mailtrap');


/**
 *  wp_verify_nonce() fonctionne avec  wp_nonce_field()
 * sert à verifier le formulaire -> la requete est bien envoyée du site et pas d'autre part
 * une sorte de verification, un token
 */
function form_submit()
{

    if (isset($_POST['contact']) && isset($_POST['form-jphi'])) {

        if (wp_verify_nonce($_POST['form-jphi'], 'contacter')) {

            /*
             * j'ai verifier que le formulaire était bien soumis sur le site et que tout va bien
             * je récupere les valeurs de variable $_POST
             * j'utilise la fonction wp_mail pour envoyer le mail
             */
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $message = $_POST['message'];
            $to = "novitz@gmail.com";

            if (!empty($email) && !empty($nom) && !empty($message)) {

                if (wp_mail($to, $email, $message)) {
                    $url = add_query_arg('succes', 'Envoyé !', home_url());


                } else {
                    $url = add_query_arg('erreur', 'Problème', wp_get_referer());
                }

            }

           else {
                $url = add_query_arg('erreur', 'Problème', wp_get_referer());
            }
            wp_safe_redirect($url);
            exit();


        }

    }
}

add_action('template_redirect', 'form_submit');