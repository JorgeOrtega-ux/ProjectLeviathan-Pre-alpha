<?php
// Incluir el sistema de routing
require_once 'config/router.php';

// Función helper para generar URLs base
function getBaseUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $basePath = dirname($scriptName);
    
    return $protocol . $host . ($basePath !== '/' ? $basePath : '');
}

$BASE_URL = getBaseUrl();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $BASE_URL; ?>/assets/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    
    <?php
    // Títulos dinámicos basados en la sección actual
    $pageTitles = [
        'home' => 'Página Principal - ProjectLeviathan',
        'explore' => 'Explorar Comunidades - ProjectLeviathan',
        'settings' => 'Configuración - ProjectLeviathan',
        '404' => 'Página no encontrada - ProjectLeviathan'
    ];
    
    $pageTitle = isset($pageTitles[$CURRENT_SECTION]) ? $pageTitles[$CURRENT_SECTION] : 'ProjectLeviathan';
    ?>
    <title><?php echo $pageTitle; ?></title>
    
    <!-- Meta tags para SEO -->
    <meta name="description" content="ProjectLeviathan - Plataforma de comunidades">
    <link rel="canonical" href="<?php echo $BASE_URL . '/' . $CURRENT_PATH; ?>">
    
    <!-- Variables globales para JavaScript -->
    <script>
        window.PROJECT_CONFIG = {
            baseUrl: '<?php echo $BASE_URL; ?>',
            currentSection: '<?php echo $CURRENT_SECTION; ?>',
            currentSubsection: <?php echo $CURRENT_SUBSECTION ? '"' . $CURRENT_SUBSECTION . '"' : 'null'; ?>,
            currentPath: '<?php echo $CURRENT_PATH; ?>',
            routes: <?php echo json_encode(Router::getAllRoutes()); ?>
        };
    </script>
</head>

<body>
    <div class="page-wrapper">
        <div class="main-content">
            <div class="general-content">
                <div class="general-content-top">
                    <?php include 'includes/layouts/header.php'; ?>
                </div>
                <div class="general-content-bottom">
                    <div class="general-content-scrolleable">
                        <?php include 'includes/modules/module-surface.php'; ?>
                        <?php include 'includes/sections/general-sections.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="<?php echo $BASE_URL; ?>/assets/js/app-init.js"></script>
</body>

</html>