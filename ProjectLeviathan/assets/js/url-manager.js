// --- URL Manager Module ---
let urlManagerConfig = null;
let urlMap = null;

function initUrlManager() {
    urlManagerConfig = window.PROJECT_CONFIG;
    urlMap = {
        home: '',
        explore: 'explore',
        'settings-profile': 'settings/profile',
        'settings-login': 'settings/login',
        'settings-accessibility': 'settings/accessibility',
        'settings-purchaseHistory': 'settings/purchase-history'
    };
}

function generateUrl(section, subsection = null) {
    if (!urlManagerConfig) return '#';
    
    let path = '';

    if (section === 'home') {
        path = '';
    } else if (section === 'explore') {
        path = 'explore';
    } else if (section === 'settings') {
        const sub = subsection || 'profile';
        switch (sub) {
            case 'profile':
                path = 'settings/profile';
                break;
            case 'login':
                path = 'settings/login';
                break;
            case 'accessibility':
                path = 'settings/accessibility';
                break;
            case 'purchaseHistory':
                path = 'settings/purchase-history';
                break;
            default:
                path = 'settings/profile';
        }
    }

    return path ? `${urlManagerConfig.baseUrl}/${path}` : urlManagerConfig.baseUrl;
}

function navigateToUrl(section, subsection = null, updateHistory = true) {
    if (!urlManagerConfig) return;
    
    const url = generateUrl(section, subsection);
    
    // Comprobar si la nueva URL es diferente a la actual antes de modificar el historial
    if (updateHistory && window.location.href !== url) {
        history.pushState({
            section: section,
            subsection: subsection
        }, '', url);
    }

    updatePageTitle(section, subsection);
}

function updatePageTitle(section, subsection = null) {
    const titles = {
        home: 'Página Principal - ProjectLeviathan',
        explore: 'Explorar Comunidades - ProjectLeviathan',
        settings: 'Configuración - ProjectLeviathan'
    };

    const title = titles[section] || 'ProjectLeviathan';
    document.title = title;
}

function getCurrentUrlState() {
    if (!urlManagerConfig) return null;
    
    const section = urlManagerConfig.currentSection;
    const subsection = urlManagerConfig.currentSubsection;
    
    return {
        section: section,
        subsection: subsection,
        isSettingsSection: section === 'settings'
    };
}

function setupPopStateHandler(callback) {
    window.addEventListener('popstate', (event) => {
        if (event.state) {
            const { section, subsection } = event.state;
            callback(section, subsection, false);
        } else {
            callback('home', null, false);
        }
    });
}

function setInitialHistoryState() {
    if (!urlManagerConfig) return;
    
    const currentState = getCurrentUrlState();
    
    if (!history.state && currentState) {
        history.replaceState({
            section: currentState.section,
            subsection: currentState.subsection
        }, '', window.location.href);
    }
}

export {
    initUrlManager,
    generateUrl,
    navigateToUrl,
    updatePageTitle,
    getCurrentUrlState,
    setupPopStateHandler,
    setInitialHistoryState
};