<?php

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Class Tweets
 *
 * Se connecte à l'API TWITTER
 * Utilise les access_token et les consumer key
 * Renvoie une sélection des propriétés du fil d'actualité
 *
 */
class Tweets
{

    protected $access_token;
    protected $access_token_secret;
    protected $connection;

    const CONSUMER_KEY = "94ORxkS4bcrsEWxkVCFh2YBXg";
    const CONSUMER_SECRET = "WcJiQ0jSnwVY9Sq0cGYXLgzyvhcpwFCuwWnQ0DGEuKMBrEu6CM";

    /**
     * Tweets constructor.
     * S'authentifie sur l'API TWITTER
     * Les access token sont des variables car ils peuvent être regénérés
     * Les Consumer Key et Secret sont des constantes car 'en principe' ne changent pas
     *
     */
    public function __construct()
    {
        $this->access_token = "2570783070-WARwLSiqsBB2eQS9ExcRTo3p1xc5ZEOpadaDDYO";
        $this->access_token_secret = "GalHAaY2EIytAcqDDTpsvw0kMKGnh0JHxFZHYn7rGxUMm";

        $this->connection = new TwitterOAuth(
            self::CONSUMER_KEY,
            self::CONSUMER_SECRET,
            $this->access_token,
            $this->access_token_secret
        );

      //var_dump($this->connection->get("account/verify_credentials"));

    }


    /**
     * @param int $n
     * @return mixed
     *
     * récupère n derniers tweets, met la date de création, l'url pour la photo de profil, le surnom et la localisation
     * dans le tableau $mon_status => le renvoie
     */
    public function getUserTimeline($n = 5)
    {
        $statuses = $this->connection->get("statuses/user_timeline", ["count" => $n]);


        $mon_status['date'] = $statuses[0]->user->created_at;
        $mon_status['photo_profil'] = $statuses[0]->user->profile_image_url_https;
        $mon_status['background'] = $statuses[0]->user->profile_background_color;
        $mon_status['screen_name'] = $statuses[0]->user->screen_name;
        $mon_status['url'] = $statuses[0]->user->url;
        $mon_status['location'] = $statuses[0]->user->location;
        foreach ($statuses as $elem) {
            $mon_status['tweets'][] = $elem->text;
        }
        return $mon_status;

    }
}

