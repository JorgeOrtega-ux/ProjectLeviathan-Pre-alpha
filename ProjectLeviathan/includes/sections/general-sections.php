<div class="section-container">
    <?php if ($CURRENT_SECTION === '404'): ?>
        <div class="section-content active" data-section="section404">
            <div class="error-404">
                <span class="error-code">404</span>
                <h1>¡Ups! Página no encontrada</h1>
                <p>No pudimos encontrar la página que estás buscando. Es posible que haya sido movida o que ya no exista.</p>
                <a href="<?php echo $BASE_URL; ?>" class="btn-home">
                    <span>Volver a la página principal</span>
                    <span class="material-symbols-rounded">arrow_forward</span>
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