<?php

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
 * Retourne le chémin d'un repository
 * 
 * @param string $repo le nom du repository
 * 
 * @return string
 */
function include_repo($repo)
{
    return include REPO_PATH . $repo;
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
 * @param string $id l'id de l'element
 * @param string $dossier le dossier du fichier
 * @param bool $detail si l'element a un detail
 * 
 * @return string $html le code des bouton
 */
function liste_action($id, $dossier, $detail = true)
{
    $html = "";
    if ($detail) {
        $html .= '<a href="' . base_url('/admin/' . $dossier . '/detail.php?id=' . $id) . '" class=" btn badge bg-info">Détails</a> ';
    }
    $html .= '<a href="' . base_url('/admin/' . $dossier . '/update.php?id=' . $id) . '" class="btn badge bg-primary btn-sm me-1">Modifier</a>';
    $html .= '<form action="' . base_url('/admin/' . $dossier . '/delete.php') . '" method="POST" class="d-inline text-align-center">';
    $html .= '<input type="hidden" name="id" value="' . $id . '">';
    $html .= '<button type="submit" class="badge bg-danger btn-sm btn">Supprimer</button>';
    $html .= ' </form>';

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
function form_input($label, $name, $type = "text", $required = true, $default = null, array $options = [])
{
    $defaultValue = $_POST[$name] ?? $default ?? '';

    $isRequired = $required ? 'required' : '';

    $class = "form-control";
    if (isset($_POST[$name]) && empty($_POST[$name]) && $required) {
        $class .= ' is-invalid';
    }

    $html = '<div class="mb-3">';
    $html .= '<label for="' . $name . '" class="form-label">' . $label . '</label>';

    if ($type === "textarea") {
        $html .= '<textarea id="' . $name . '" class="form-control" name="' . $name . '" rows="3"  placeholder="' . $label . '">' .  $defaultValue . '</textarea>';
    } elseif ($type === 'select') {
        $html .= '<select  name="' . $name . '" id="' . $name . '" ' . $isRequired . ' value="' .  $defaultValue . '" class="' . $class . '">';
        foreach ($options as $value => $text) {
            $selected = $defaultValue === $value ? 'selected' : '';
            $html .= '<option ' . $selected . ' value="' . $value . '">' . $text . '</option>';
        }
        $html .= '</select>';
    } else {
        if ($type === 'file' && !empty($_FILES)) {
            $defaultValue = uploadImage();
            $class .= ' ' . $defaultValue;
        }
        $html .= '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" ' . $isRequired . ' value="' .  $defaultValue . '" class="' . $class . '" placeholder="' . $label . '">';
    }

    $html .= "</div>";

    return $html;
}

/**
 * Envoie d'un message flash
 * 
 * @param string $message
 * @param string $type
 */
function flash_message($message, $type = "success")
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

        $html = '<div class="alert alert-dismissible alert-' . $flash['type'] . '">';
        $html .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        $html .= '<div class="alert-message">' . $flash['message'] . '</div>';
        $html .= '</div>';

        return $html;
    }

    return '';
}


/**
 * Verifie si le post n'est pas vide
 * 
 * @return bool
 */
function is_post(): bool
{
    return !empty($_POST);
}

/**
 * Fait une rediretion de page et enregistre un message
 * flash dans la fonction `flash_message`
 * 
 * @param string $url l'url de redirection
 * @param string $message le message à enregistrer
 * @param string $messageType le type du message
 */
function redirect(string $url, ?string $message = null, string $messageType = 'success'): void
{
    if ($message != null) {
        flash_message($message, $messageType);
    }
    header("Location: $url");
    exit;
}

/**
 * Upload de l'image dans le dossier ./imgages
 * et renvoie le chemin de l'image en question ou null
 * s'il y a eu une erreur
 * 
 * @return string|null chemin de l'image
 */
function uploadImage(): ?string
{
    $extentionValide = ['jpg', 'png', 'jpeg'];

    if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
        return null;
    }

    $fileName = $_FILES['image']['name'];
    $extention = pathinfo($fileName, PATHINFO_EXTENSION);


    if (!in_array($extention, $extentionValide)) {
        return 'is-invalid';
    }

    $tmpName = $_FILES['image']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));
    $fileName = $uniqueName . '.' .  $extention;

    move_uploaded_file($tmpName, "../../img/$fileName");

    return $fileName;
}
