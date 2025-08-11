<?php
// Incluir el sistema de routing
require_once 'router.php';

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
                        <div class="section-container">
                            <?php if ($CURRENT_SECTION === '404'): ?>
                                <div class="section-content active" data-section="section404">
                                    <div class="error-404">
                                        <h1>404</h1>
                                        <h2>Página no encontrada</h2>
                                        <p>La página que buscas no existe o ha sido movida.</p>
                                        <a href="<?php echo $BASE_URL; ?>" class="btn-home">
                                            Volver al inicio
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="section-content <?php echo $CURRENT_SECTION === 'home' ? 'active' : 'disabled'; ?>" data-section="sectionHome">
                                    <h1>Página Principal</h1>
                                    <p>Bienvenido al contenido de la página principal</p>
                                </div>
                                <div class="section-content <?php echo $CURRENT_SECTION === 'explore' ? 'active' : 'disabled'; ?>" data-section="sectionExplore">
                                    <h1>Explorar Comunidades</h1>
                                    <p>Descubre y explora diferentes comunidades</p>
                                </div>
                                <div class="section-content <?php echo $CURRENT_SECTION === 'settings' ? 'active' : 'disabled'; ?>" data-section="sectionSettings">
                                    <div class="section-content <?php echo $CURRENT_SUBSECTION === 'profile' ? 'active' : 'disabled'; ?>" data-section="sectionProfile">
                                        <h2>Tu Perfil</h2>
                                        <p>Administra la configuración de tu perfil de usuario</p>
                                    </div>
                                    <div class="section-content <?php echo $CURRENT_SUBSECTION === 'login' ? 'active' : 'disabled'; ?>" data-section="sectionLogin">
                                        <h2>Iniciar Sesión</h2>
                                        <p>Inicia sesión en tu cuenta</p>
                                    </div>
                                    <div class="section-content <?php echo $CURRENT_SUBSECTION === 'accessibility' ? 'active' : 'disabled'; ?>" data-section="sectionAccessibility">
                                        <h2>Accesibilidad</h2>
                                        <p>Configura las opciones de accesibilidad</p>
                                    </div>
                                    <div class="section-content <?php echo $CURRENT_SUBSECTION === 'purchaseHistory' ? 'active' : 'disabled'; ?>" data-section="sectionPurchaseHistory">
                                        <h2>Historial de Compras</h2>
                                        <p>Ve tu historial de compras y transacciones</p>
                                    </div>
                                </div>        
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="<?php echo $BASE_URL; ?>/assets/js/app-init.js"></script>
</body>

</html>