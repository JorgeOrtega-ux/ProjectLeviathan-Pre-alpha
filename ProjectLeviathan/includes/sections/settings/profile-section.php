<div class="section-content overflow-y <?php echo $CURRENT_SUBSECTION === 'profile' ? 'active' : 'disabled'; ?>" data-section="sectionProfile">
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
                    <div class="selector-input" data-action="toggleSelector">
                        <span class="selected-value">Español (Latinoamérica)</span>
                        <span class="material-symbols-rounded">arrow_drop_down</span>
                    </div>
                    <div class="module-content module-selector disabled" data-module="moduleSelector">
                         <div class="menu-content">
                            <div class="pill-container">
                                <div class="drag-handle"></div>
                            </div>
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
        
        <div class="profile-card">
            <div class="profile-card-item-column">
                <div class="profile-card-info">
                    <strong>¿Para qué usarás esta web?</strong>
                </div>
                <div class="profile-control-group">
                    <div class="selector-input" data-action="toggleSelector">
                        <span class="selected-value">Uso personal</span>
                        <span class="material-symbols-rounded">arrow_drop_down</span>
                    </div>
                    <div class="module-content module-selector disabled" data-module="moduleSelector">
                        <div class="menu-content">
                            <div class="pill-container">
                                <div class="drag-handle"></div>
                            </div>
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
                
                <div class="profile-control-group">
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