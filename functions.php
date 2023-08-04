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
/*
function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
*/

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
 * Require le fichier model d'une entité
 * 
 * @param $nom le nom du fichier
 */
function model($nom)
{
    return require ROOT . 'models' . DS . $nom;
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
 * Load js from asset dir
 */
function js($name)
{
    if (!str_contains($name, '.js')) {
        $name .= '.js';
    }

    return '<script src="' . SITE_URL . '/assets/' . $name . '" ></script>';
}

/**
 * Load l'image depuis assets
 * 
 * @param $image l'image 
 */
function image($name)
{
    return base_url('/assets/dist/img/' . $name);
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
function liste_action($id, $dossier, $detail = true, $desactive = false, int $statut = 0)
{
    $active = $desactive ? "power" : 'x';
    $class = "bg-danger";
    if ($desactive === true && $statut === 0) {
        $active = "power";
        $class = "bg-success";
    }
    $html = '';
    if ($detail) {
        $html .= '<a href="' . base_url('/admin/' . $dossier . '/detail.php?id=' . $id) . '" class=" btn bouton_action btn-sm bg-info"><span data-feather="info"><span></a> ';
    }
    $html .= '<a href="' . base_url('/admin/' . $dossier . '/update.php?id=' . $id) . '" class="btn bouton_action bg-primary btn-sm me-1"><span data-feather="edit"><span></a>';
    $html .= '<form action="' . base_url('/admin/' . $dossier . '/delete.php') . '" method="POST" class="d-inline text-align-center">';
    $html .= '<input type="hidden" name="id" value="' . $id . '">';
    $html .= '<button type="submit" class="bouton_action ' . $class . '  btn-sm btn"><span data-feather="' . $active . '"><span></button>';
    $html .= ' </form>';

    return $html;
}

/**
 * Retourne une card comportant un champs input
 * 
 * @param string|bool $label le label de l'input
 * @param string $type le type de l'input
 * @param string $name le name de l'input
 * @param string $default la valeur par defau du champs
 * @param bool $required l'attribut' required de l'input
 * 
 * @return string $html le conde html
 */
function form_input($label, $name, $type = "text", $required = true, $placeholder = '', $default = null, array $options = [], $valueSource = 'POST')
{
    if ($valueSource === 'POST') {
        $data = $_POST;
    } else {
        $data = $_GET;
    }

    $defaultValue = $data[$name] ?? $default ?? '';

    $isRequired = $required ? 'required' : '';

    $class = "form-control";
    if ($type === 'select') {
        $class = 'form-select';
    }

    if (isset($data[$name]) && empty($data[$name]) && $required) {
        $class .= ' is-invalid';
    }


    if ($label) {
        $html = '<div class="mb-3">';
        $html .= '<label for="' . $name . '" class="form-label">' . $label . '</label>';
    } else {
        $html = '<div>';
    }

    if ($type === "textarea") {
        $html .= '<textarea id="' . $name . '" class="form-control" name="' . $name . '" rows="3"  placeholder="' . $label . '">' . $defaultValue . '</textarea>';
    } elseif ($type === 'select') {
        $html .= '<select  name="' . $name . '" id="' . $name . '" ' . $isRequired . ' value="' . $defaultValue . '" class="' . $class . '">';
        foreach ($options as $value => $text) {
            $selected = $defaultValue == $value ? 'selected' : '';
            $html .= '<option ' . $selected . ' value="' . $value . '">' . $text . '</option>';
        }
        $html .= '</select>';
    } else {
        if ($type === 'file' && !empty($_FILES)) {
            $defaultValue = uploadImage();
            $class .= ' ' . $defaultValue;
        }
        $html .= '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" ' . $isRequired . ' value="' . $defaultValue . '" class="' . $class . '" placeholder="' . $label . $placeholder . '">';
    }

    $html .= "</div>";

    return $html;
}


function input_client(string $name, string $label, string $type = "text", $required = true, $default = null)
{
    $default = $_POST[$name] ?? '';
    $required = $required ? 'required ' : '';

    $border = "border-gray-200";
    if (isset($_POST[$name]) && empty($_POST[$name])) {
        $border = 'border-error';
    }
    if (!empty($_GET[$name])) {
        $border = 'border-error';
    }
    $length = null;
    if ($name === 'password') {
        $length = 'minlength="8"';
    }
    if ($name === 'tel') {
        $length = 'minlength="9"';
    }

    $html = '<div class="mt-4">';
    $html .= '<label for="' . $name . '" class="form-label-client mb-2">' . $label . '<span> *</span> </label><br>';
    $html .= '<input type="' . $type . '" name="' . $name . '" ' . $length . ' id="' . $name . '" value="' . $default . '" ' . $required . ' class="form-input-client ' . $border . '">';
    $html .= '</div>';
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
 * Fait un redirection sur la page courant
 * 
 * @param string $currentUrl l'url de la page courant
 */
function redirect_self($currentUrl, ?string $message = null, string $messageType = 'success'): void
{
    redirect($currentUrl, $message, $messageType);
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
    $fileName = $uniqueName . '.' . $extention;

    move_uploaded_file($tmpName, "../../assets/dist/img/" . $fileName);

    return $fileName;
}

/**
 * Retour la pagination
 */
function paginate($pageCount, $currentPage, $baseUrl)
{
    require LAYOUT_PATH . 'parts' . DS . 'pagination.php';
}


/**
 * Créer ou récupère l'ID unique du visiteur du site
 * 
 * @return string Id du visiteur
 */
function get_visitor_id()
{
    $id = $_COOKIE['visitor_id'] ?? null;

    if ($id) {
        return $id;
    }

    $id = uniqid();

    setcookie('visitor_id', $id, [
        'httponly' => true,
        'expires' => time() + (360 * 3600),
    ]);

    return $id;
}


/**
 * Récupère l'id du visiteur dans les cookie si l'itulisateur est connecter
 * ou récupère son id depuis la base de données
 * 
 * @param int $id l'id de l'utilisateur
 * 
 * @return int
 */
function get_user_connect($id = null)
{
    $idUser = $_COOKIE['user_id'] ?? null;

    if ($idUser) {
        return $idUser;
    } else {
        if ($id) {
            setcookie('user_id', $id, [
                'httponly' => true,
                'expires' => time() + (3600 * 24),
            ]);
        }
        return $idUser;
    }
}


/**
 * Récupère l'email du visiteur dans les cookie si l'itulisateur est connecter
 * 
 * @param string $email l'email de l'utilisateur
 * 
 * @return string
 */
function get_email_user($email = null)
{
    $userEmail = $_COOKIE['user_email'] ?? null;

    if ($userEmail) {
        return $userEmail;
    } else {
        if ($email) {
            setcookie('user_email', $email, [
                'httponly' => true,
                'expires' => time() + (3600 * 24),
            ]);
        }
        return $userEmail;
    }
}

/**
 * Crée un numéro unique de la commande
 * 
 * @param int $nombre nombre de la commande
 * 
 * @return  string
 */
function numero_commande($nombre){
    $nombre += 1;
    return date('my-') . str_pad((string)$nombre, 6, "0", STR_PAD_LEFT);
}
