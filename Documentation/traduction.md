Traduction
==========

J'ai installé loco traduction et configuré le theme.

```
add_action('after_setup_theme', 'pdw_theme_setup');

function pdw_theme_setup()
{
    load_theme_textdomain('wp-theme-base-translate', get_template_directory() . '/languages');
}

```
Dans le template - ajoute le pluggin de traduction.
  
J'ai utilisé la traduction pour traduire les titres  

```
<?php _e('Accueil', 'wp-theme-base-translate'); ?>
```
permet de traduire mes titres.  

