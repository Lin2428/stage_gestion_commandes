<?php

/**
 * Tout les fonctions utilitaires ici
 */

session_start();

/**
 * Rendre la vue. La vue doit se trouver dans le dossier `ROOT/views`
 * Le fichier de view doit se terminer par .view.php ex : `index.view.php`
 * 
 * @param string $name le nom du fichier 'nom'.views.php
 * @param string $pageTitle le titre de la page
 * @param array $params le tableau des parametre
 * @param string $layout le nom du fichier contenant l'entête et le pied de page
 * 
 */
function view($name, string $pageTitle, array $params = [], string $layout = 'default')
{

    $name = str_replace('.', DS, $name);

    $name = $name . '.view';

    $view = VIEW_PATH . $name . '.php';

    extract($params);

    ob_start();
    require $view;
    $content = ob_get_clean();

    require LAYOUT_PATH . $layout . '.php';
}

/**
 * Charge une parie du layout depuis le dossier `LAYOUT_PATH/parts`
 * 
 * @param string $part La partie à charger
 * @return void
 */
function layout_part(string $part)
{
    require LAYOUT_PATH . 'parts' . DS . $part . '.php';
}

/**
 * Renvoie la classe active si la page actuelle correspond
 * au lien $url
 * 
 * @param string $url l'url à vérifier
 * 
 * @return string 'active' la classe css
 */
function is_active(string $url): string
{
    $activePage = $_SERVER['PHP_SELF'];
    $parts = explode('/', $activePage);

    unset($parts[count($parts) - 1]);
    unset($parts[0]);

    $parts = implode('/', $parts);

    if (str_ends_with($parts, $url)) {
        return 'active';
    }

    return '';
}

/**
 * Formate le code à debuger avec la balise <pre> de html
 */
function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}



/**
 * Inclu l'entête de page
 * 
 * @param string $title Le titre de la page
 * @return void
 */
function page_header(string $title = 'Gestion des commandes')
{
    $pageTitle = $title;
    require LAYOUT_PATH . 'header.php';
}

/**
 * Inclu le pied de page
 * 
 * @return void
 */
function page_footer()
{
    require LAYOUT_PATH . 'footer.php';
}

/**
 * Complète le chemin d'url du site au link
 * 
 * 
 */
function base_url($link)
{
    if (!str_starts_with($link, '/')) {
        $link = '/' . $link;
    }
    return SITE_URL . $link;
}

/**
 * Load css from asset dir
 */
function css($name)
{
    if (!str_contains($name, '.css')) {
        $name .= '.css';
    }

    return '<link href="' . SITE_URL . '/assets/' . $name . '" rel="stylesheet">';
}



/**
 * affiche les bouton d'action de détails, d'edition et de suppréssion
 * 
 * @param string $id l'id du produit
 * 
 * @return string $html le code des bouton
 */
function actions_produits($id)
{
    $html = '<a href="'.SITE_URL .'/admin/produits/detail.php?id=' . $id . '" class="btn btn-info btn-sm">Détails</a> ';
    $html .= '<a href="'.SITE_URL .'//admin/produits/update.php?id=' . $id . '" class="btn btn-primary btn-sm">Modifier</a>';
    $html .= '<form action="'.SITE_URL .'//admin/produits/delete.php" method="POST">';
    $html .='<input type="hidden" name="id" value="' . $id . '">';
    $html .= '<button type="submit" class="btn btn-danger btn-sm">Supprimer</button></form>';

    return $html;
}

/**
 * Retourne une card comportant un champs input
 * 
 * @param string $label le label de l'input
 * @param string $type le type de l'input
 * @param string $name le name de l'input
 * @param string $default la valeur par defau du champs
 * @param bool $required l'attribut' required de l'input
 * 
 * @return string $html le conde html
 */
function form_input($label, $name, $type = "text", $required = true, $default = null)
{
    $defaultValue = $_POST[$name] ?? $default ?? '';

    $isRequired = $required ? 'required' : '';

    $class = "form-control mb-3";
    if (!empty($_POST) && empty($_POST[$name])) {
        $class .= ' ' . 'is-invalid';
    }

    $html = '<h5 class="card-title mt-3">' . $label . '</h5>';
    $input = '<input type="' . $type . '" name="' . $name . '"' . $isRequired . ' value="' .  $defaultValue . '" class="' . $class . '" placeholder="' . $label . '">';



    if ($type === "textarea") {
        $input = '<textarea class="form-control" name="' . $name . '" rows="2"  placeholder="' . $label . '">' .  $defaultValue . '</textarea>';
    }

    $html .= $input;


    return $html;
}

/**
 * Envoie d'un message flash
 * 
 * @param string $message
 * @param string $type
 */
function flash_message($message, $type = "message")
{
    $flash = [
        'message' => $message,
        'type' => $type
    ];

    $_SESSION['flash'] = $flash;
}

/**
 * Lit un message flash
 * 
 * @return string $html le code du message
 */
function read_flash_message()
{
    $flash = $_SESSION['flash'] ?? null;

    if ($flash) {
        unset($_SESSION['flash']);

        $html = '<div class="alert alert-' . $flash['type'] . '">' . $flash['message'] . '</div>';

        return $html;
    }

    return '';
}



