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
        <?php include 'includes/sections/home-section.php'; ?>
        <?php include 'includes/sections/explore-section.php'; ?>
        <div class="section-content <?php echo $CURRENT_SECTION === 'settings' ? 'active' : 'disabled'; ?>" data-section="sectionSettings">
            <?php include 'includes/sections/profile-section.php'; ?>
            <?php include 'includes/sections/login-section.php'; ?>
            <?php include 'includes/sections/accessibility-section.php'; ?>
            <?php include 'includes/sections/purchaseHistory-section.php'; ?>
        </div>
    <?php endif; ?>
</div>