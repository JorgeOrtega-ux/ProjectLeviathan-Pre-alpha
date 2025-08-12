<div class="section-content overflow-y <?php echo $CURRENT_SUBSECTION === 'purchaseHistory' ? 'active' : 'disabled'; ?>" data-section="sectionPurchaseHistory">
    <div class="purchase-history-container">
        <div class="profile-card">
            <div class="profile-header-container">
                <div class="profile-header">
                    <h2>Pedidos y facturas</h2>
                    <p>Consulta el estado de tus pedidos, revisa tus facturas y gestiona tus transacciones.</p>
                </div>
            </div>
        </div>

        <div class="purchase-filters">
            <div class="filter-group">
                <label for="search-invoice">Buscar por id de factura</label>
                <div class="search-input-wrapper">
                    <span class="material-symbols-rounded">search</span>
                    <input type="text" id="search-invoice" placeholder="3487M-5032016">
                </div>
            </div>
            
            <div class="filter-group">
                <label>Filtrar por tipo</label>
                <div class="profile-control-group">
                    <div class="selector-input" data-action="toggleSelector">
                        <span class="selected-value">Cualquier tipo de artículo</span>
                        <span class="material-symbols-rounded">arrow_drop_down</span>
                    </div>
                    <div class="module-content module-selector body-title disabled" data-module="moduleSelector">
                        <div class="menu-content">
                            <div class="menu-body overflow-y">
                                <div class="menu-list">
                                    <div class="menu-link active" data-value="all">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">inventory_2</span></div>
                                        <div class="menu-link-text"><span>Cualquier tipo de artículo</span></div>
                                    </div>
                                    <div class="menu-link" data-value="plan">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">subscriptions</span></div>
                                        <div class="menu-link-text"><span>Plan</span></div>
                                    </div>
                                    <div class="menu-link" data-value="credits">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">monetization_on</span></div>
                                        <div class="menu-link-text"><span>Créditos</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-group">
                <label>Filtrar por fecha</label>
                <div class="profile-control-group">
                    <div class="selector-input" data-action="toggleSelector">
                        <span class="selected-value">Todo</span>
                        <span class="material-symbols-rounded">arrow_drop_down</span>
                    </div>
                    <div class="module-content module-selector body-title disabled" data-module="moduleSelector">
                        <div class="menu-content">
                            <div class="menu-body overflow-y">
                                <div class="menu-list">
                                    <div class="menu-link active" data-value="all">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">calendar_today</span></div>
                                        <div class="menu-link-text"><span>Todo</span></div>
                                    </div>
                                    <div class="menu-link" data-value="last30">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">date_range</span></div>
                                        <div class="menu-link-text"><span>Últimos 30 días</span></div>
                                    </div>
                                    <div class="menu-link" data-value="last90">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">date_range</span></div>
                                        <div class="menu-link-text"><span>Últimos 90 días</span></div>
                                    </div>
                                     <div class="menu-link" data-value="2025">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">calendar_month</span></div>
                                        <div class="menu-link-text"><span>2025</span></div>
                                    </div>
                                    <div class="menu-link" data-value="2024">
                                        <div class="menu-link-icon"><span class="material-symbols-rounded">calendar_month</span></div>
                                        <div class="menu-link-text"><span>2024</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="purchase-table-wrapper">
            <table class="purchase-table">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Emitida a nombre de</th>
                        <th>Creado el</th>
                        <th>Estado</th>
                        <th class="text-right">Total a pagar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Descripción">Plan Premium Anual (Renovación)</td>
                        <td data-label="Emitida a nombre de">Jorge Ortega</td>
                        <td data-label="Creado el">10 ago 2025</td>
                        <td data-label="Estado"><span class="status-pill status-paid">Pagado</span></td>
                        <td data-label="Total a pagar" class="text-right">$1,200.00 MXN</td>
                    </tr>
                    <tr>
                        <td data-label="Descripción">Créditos de Contenido (x50)</td>
                        <td data-label="Emitida a nombre de">Jorge Ortega</td>
                        <td data-label="Creado el">15 jul 2025</td>
                        <td data-label="Estado"><span class="status-pill status-paid">Pagado</span></td>
                        <td data-label="Total a pagar" class="text-right">$250.00 MXN</td>
                    </tr>
                    <tr>
                        <td data-label="Descripción">Plan Premium Mensual</td>
                        <td data-label="Emitida a nombre de">Jorge Ortega</td>
                        <td data-label="Creado el">10 jul 2025</td>
                        <td data-label="Estado"><span class="status-pill status-refunded">Reembolsado</span></td>
                        <td data-label="Total a pagar" class="text-right">$120.00 MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>