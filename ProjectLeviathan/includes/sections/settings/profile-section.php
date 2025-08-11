<style>
    .profile-header h2 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 4px;
        color: #333;
    }

    .profile-header p {
        font-size: 16px;
        color: #666;
        margin: 0;
    }

    .profile-card {
        border: 1px solid #00000020;
        border-radius: 12px;
        margin-bottom: 16px;
        background-color: #fff;
    }

    .profile-header-container {
        padding: 24px;
        text-align: center;
    }

    .profile-card-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        min-height: 90px;
    }
    
    .profile-card-item-column {
        padding: 20px;
    }
    
    .profile-card-item.with-divider {
        border-bottom: 1px solid #00000020;
    }

    .profile-card-content {
        display: flex;
        align-items: center;
        flex: 1;
        min-width: 0;
    }

    .profile-avatar-container {
        margin-right: 16px;
    }

    .profile-avatar-container .profile-container {
        width: 50px;
        height: 50px;
    }

    .profile-avatar-container .profile-content {
        font-size: 24px;
    }

    .profile-card-info {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        text-align: left;
        min-width: 0;
    }

    .profile-card-info strong {
        font-size: 1rem;
        font-weight: 500;
        color: #333;
        margin-bottom: 2px;
    }

    .profile-card-info span {
        font-size: 0.9rem;
        color: #666;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .profile-card-info.allow-wrap strong,
    .profile-card-info.allow-wrap span {
        white-space: normal;
        overflow: visible;
        text-overflow: initial;
    }


    .edit-button {
        background-color: transparent;
        border: 1px solid #00000020;
        border-radius: 8px;
        color: #333;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        margin-left: 16px;
    }

    .edit-button:hover {
        background-color: #f5f5fa;
    }

    /* -- Edit and View State Styles -- */
    .hidden {
        display: none !important;
    }

    .profile-card-item .view-state,
    .profile-card-item .edit-state {
        width: 100%;
    }
    
    .profile-card-item .view-state {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .edit-input-group {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .edit-input {
        flex-grow: 1;
        padding: 8px 12px;
        border: 1px solid #00000020;
        border-radius: 8px;
        font-size: 0.9rem;
        outline: none; 
    }
    
    .edit-input:focus {
        border: 1px solid #000000;
    }

    .edit-actions {
        display: flex;
        gap: 8px;
    }

    .cancel-button {
        background-color: transparent;
        border: 1px solid #00000020;
        border-radius: 8px;
        color: #333;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 10px 18px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .cancel-button:hover {
        background-color: #f5f5fa;
    }

    .save-button {
        background-color: #000;
        border: 1px solid #000;
        border-radius: 8px;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 10px 18px;
        cursor: pointer;
        transition: opacity 0.2s ease;
    }

    .save-button:hover {
        opacity: 0.8;
    }
    
    /* -- Custom Selector Styles -- */
    .profile-control-group {
        width: 100%;
        max-width: 285px;
        margin-top: 8px;
    }

    .module-selector {
        position: relative;
        width: 100%;
    }
    
    .module-selector-button {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 0 12px;
        height: 40px;
        border: 1px solid #00000020;
        border-radius: 8px;
        background-color: #fff;
        cursor: pointer;
    }

    .module-selector-button .selected-value {
        font-size: 0.9rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .module-selector-button .material-symbols-rounded {
        font-size: 24px;
        transition: transform 0.2s ease;
    }

    .module-selector.active .module-selector-button .material-symbols-rounded {
        transform: rotate(180deg);
    }
    
    .module-selector .module-content {
        position: absolute;
        top: calc(100% + 4px);
        left: 0;
        width: 100%;
        z-index: 10;
        display: none;
    }
    
    .module-selector.active .module-content {
        display: block;
    }
    
    .module-selector .menu-content {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px #00000020;
        max-height: 250px;
    }
    
    .module-selector .menu-body {
        padding: 8px;
        max-height: 230px;
    }

    .info-box {
        background-color: #e7f3ff;
        color: #004085;
        padding: 15px;
        margin-top: 8px;
        border-radius: 8px;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    /* -- Toggle Switch Styles -- */
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
        margin-left: 16px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 24px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
        box-shadow: 0 1px 3px #00000033;
    }
    
    .toggle-switch .material-symbols-rounded {
        position: absolute;
        font-size: 14px;
        color: #000;
        left: 5px;
        top: 5px;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s, transform 0.4s;
    }

    input:checked + .toggle-slider {
        background-color: #000;
    }
    
    input:checked + .toggle-slider:before {
        transform: translateX(20px);
    }
    
    input:checked ~ .material-symbols-rounded {
        opacity: 1;
        transform: translateX(20px);
    }


    @media (max-width: 468px) {
        .edit-input-group {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
        }

        .edit-actions {
            justify-content: flex-end;
        }
        
        .profile-card-item.toggle-item {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .toggle-item .profile-card-content {
            margin-bottom: 12px;
        }

        .toggle-item .toggle-switch {
            margin-left: 0;
            align-self: flex-end;
        }
    }
</style>

<div class="section-content <?php echo $CURRENT_SUBSECTION === 'profile' ? 'active' : 'disabled'; ?>" data-section="sectionProfile">
    <div class="settings-container">
        <div class="profile-card">
            <div class="profile-header-container">
                <div class="profile-header">
                    <h2>Tu perfil</h2>
                    <p>Administra tu nombre, correo y otros datos de tu cuenta.</p>
                </div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-card-item">
                <div class="profile-card-content">
                    <div class="profile-avatar-container">
                        <div class="profile-container rank-owner">
                            <div class="profile-content">
                                <span class="material-symbols-rounded">shield</span>
                            </div>
                        </div>
                    </div>
                    <div class="profile-card-info allow-wrap">
                        <strong>Avatar de Perfil</strong>
                        <span>Tu avatar se asigna automáticamente basado en tu rango.</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-card-item with-divider" data-section="name">
                <div class="view-state">
                    <div class="profile-card-content">
                        <div class="profile-card-info">
                            <strong>Nombre</strong>
                            <span>Ortega Aguilar Jorge</span>
                        </div>
                    </div>
                    <button class="edit-button" data-action="toggleEditState">Editar</button>
                </div>
                <div class="edit-state hidden">
                    <div class="profile-card-info">
                        <strong>Nombre</strong>
                        <div class="edit-input-group">
                            <input type="text" class="edit-input" value="Ortega Aguilar Jorge">
                            <div class="edit-actions">
                                <button class="cancel-button" data-action="toggleViewState">Cancelar</button>
                                <button class="save-button" data-action="toggleViewState">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-card-item" data-section="email">
                <div class="view-state">
                    <div class="profile-card-content">
                        <div class="profile-card-info">
                            <strong>Correo electrónico</strong>
                            <span>jorge1ortega.484@gmail.com</span>
                        </div>
                    </div>
                    <button class="edit-button" data-action="toggleEditState">Editar</button>
                </div>
                <div class="edit-state hidden">
                     <div class="profile-card-info">
                        <strong>Correo electrónico</strong>
                        <div class="edit-input-group">
                            <input type="email" class="edit-input" value="jorge1ortega.484@gmail.com">
                            <div class="edit-actions">
                                <button class="cancel-button" data-action="toggleViewState">Cancelar</button>
                                <button class="save-button" data-action="toggleViewState">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="profile-card">
            <div class="profile-card-item-column">
                <div class="profile-card-info allow-wrap">
                    <strong>Idioma</strong>
                    <span>Elige tu idioma de preferencia para la interfaz.</span>
                </div>
                <div class="profile-control-group">
                    <div class="module-selector" data-module="moduleSelector">
                        <div class="module-selector-button" data-action="toggleSelector">
                            <span class="selected-value">Español (Latinoamérica)</span>
                            <span class="material-symbols-rounded">arrow_drop_down</span>
                        </div>
                        <div class="module-content">
                             <div class="menu-content">
                                <div class="menu-body overflow-y">
                                    <div class="menu-list">
                                        <div class="menu-link active" data-value="es-LA">
                                            <div class="menu-link-icon"><span class="material-symbols-rounded">language</span></div>
                                            <div class="menu-link-text"><span>Español (Latinoamérica)</span></div>
                                        </div>
                                        <div class="menu-link" data-value="en-US">
                                            <div class="menu-link-icon"><span class="material-symbols-rounded">language</span></div>
                                            <div class="menu-link-text"><span>English (United States)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="profile-card">
            <div class="profile-card-item-column">
                <div class="profile-card-info">
                    <strong>¿Para qué usarás esta web?</strong>
                </div>
                <div class="profile-control-group">
                    <div class="module-selector" data-module="moduleSelector">
                        <div class="module-selector-button" data-action="toggleSelector">
                            <span class="selected-value">Uso personal</span>
                            <span class="material-symbols-rounded">arrow_drop_down</span>
                        </div>
                        <div class="module-content">
                            <div class="menu-content">
                                <div class="menu-body overflow-y">
                                    <div class="menu-list">
                                        <div class="menu-link active" data-value="personal">
                                            <div class="menu-link-icon"><span class="material-symbols-rounded">person</span></div>
                                            <div class="menu-link-text"><span>Uso personal</span></div>
                                        </div>
                                        <div class="menu-link" data-value="commercial">
                                            <div class="menu-link-icon"><span class="material-symbols-rounded">storefront</span></div>
                                            <div class="menu-link-text"><span>Uso comercial</span></div>
                                        </div>
                                        <div class="menu-link" data-value="educational">
                                            <div class="menu-link-icon"><span class="material-symbols-rounded">school</span></div>
                                            <div class="menu-link-text"><span>Uso educativo</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-box">
                        Estamos personalizando tu experiencia para que se adapte mejor a tus necesidades. Puedes cambiar esta configuración en cualquier momento.
                    </div>
                </div>
            </div>
        </div>
        
        <div class="profile-card">
            <div class="profile-card-item with-divider toggle-item">
                <div class="profile-card-content">
                    <div class="profile-card-info allow-wrap">
                        <strong>Abrir los diseños en una pestaña nueva</strong>
                        <span>En el navegador web, los diseños siempre se abrirán en una pestaña nueva.</span>
                    </div>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                    <span class="material-symbols-rounded">done</span>
                </label>
            </div>
            <div class="profile-card-item toggle-item">
                <div class="profile-card-content">
                    <div class="profile-card-info allow-wrap">
                        <strong>Abrir enlaces en la app para escritorio</strong>
                        <span>Los enlaces de la web se abren en la app para escritorio, no en tu navegador web.</span>
                    </div>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                    <span class="material-symbols-rounded">done</span>
                </label>
            </div>
        </div>

    </div>
</div>