function initDragController(closeCallback, isAnimatingCallback) {
    // Selecciona todos los módulos que están diseñados para ser arrastrables
    const draggableModules = document.querySelectorAll('[data-module="moduleOptions"], [data-module="moduleSelector"]');

    draggableModules.forEach(module => {
        // El menuContent es el hijo directo que realmente se mueve
        const menuContent = module.querySelector('.menu-content');
        const pillContainer = module.querySelector('.pill-container');

        if (!menuContent || !pillContainer) return;

        let isDragging = false;
        let startY;
        let initialTransformY = 0;

        const onDragStart = (e) => {
            // Comprueba si el módulo está activo. Solo los módulos activos deben ser arrastrables.
            if (window.innerWidth > 468 || (isAnimatingCallback && isAnimatingCallback()) || !module.classList.contains('active')) return;
            
            isDragging = true;
            startY = e.pageY || e.touches[0].pageY;
            
            // Obtiene el valor de la transformación inicial, si existe
            const computedStyle = window.getComputedStyle(menuContent);
            const transform = new WebKitCSSMatrix(computedStyle.transform);
            initialTransformY = transform.m42;
            
            menuContent.style.transition = 'none';
        };

        const onDragMove = (e) => {
            if (!isDragging) return;
            const currentY = e.pageY || e.touches[0].pageY;
            let diffY = currentY - startY;

            // Evita arrastrar por encima de la posición inicial
            if (initialTransformY + diffY < 0) {
                 diffY = -initialTransformY;
            }
            
            menuContent.style.transform = `translateY(${initialTransformY + diffY}px)`;
        };

        const onDragEnd = () => {
            if (!isDragging) return;
            isDragging = false;
            
            const computedStyle = window.getComputedStyle(menuContent);
            const transform = new WebKitCSSMatrix(computedStyle.transform);
            const currentTransformY = transform.m42;

            const menuHeight = menuContent.offsetHeight;

            // Vuelve a habilitar las transiciones para la animación de retorno/cierre
            menuContent.style.transition = 'transform 0.3s ease-out';

            // Decide si cerrar o volver a la posición inicial
            if (currentTransformY > menuHeight * 0.4) {
                if (typeof closeCallback === 'function') {
                    // El callback determinará qué módulo cerrar
                    closeCallback(); 
                }
            } else {
                // No se arrastró lo suficiente, vuelve a la parte superior
                menuContent.style.transform = 'translateY(0)';
                
                // Limpia los estilos en línea después de la animación
                menuContent.addEventListener('transitionend', () => {
                    // Solo elimina los estilos si no estamos cerrando el módulo.
                    if (module.classList.contains('active')) {
                       menuContent.style.transition = '';
                       menuContent.style.transform = '';
                    }
                }, { once: true });
            }
        };

        pillContainer.addEventListener('mousedown', onDragStart);
        document.addEventListener('mousemove', onDragMove);
        document.addEventListener('mouseup', onDragEnd);
        pillContainer.addEventListener('touchstart', onDragStart, { passive: true });
        document.addEventListener('touchmove', onDragMove);
        document.addEventListener('touchend', onDragEnd);
    });
}

export { initDragController };