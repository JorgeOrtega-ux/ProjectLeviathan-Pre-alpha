import { initDragController } from './drag-controller.js';
import { initUrlManager, navigateToUrl, getCurrentUrlState, setupPopStateHandler, setInitialHistoryState } from './url-manager.js';

function initMainController() {
    // --- General Settings ---
    const closeOnClickOutside = true;
    const closeOnEscape = true;
    const allowMultipleActiveModules = false;
    let isAnimating = false;

    // Initialize URL manager
    initUrlManager();
    const initialState = getCurrentUrlState();
    
    // --- State Variables (initialized from current URL) ---
    let isModuleOptionsActive = false;
    let isModuleSurfaceActive = false;
    let isSectionHomeActive = initialState ? initialState.section === 'home' : true;
    let isSectionExploreActive = initialState ? initialState.section === 'explore' : false;
    let isSectionSettingsActive = initialState ? initialState.section === 'settings' : false;
    let isSectionProfileActive = initialState ? initialState.subsection === 'profile' : false;
    let isSectionLoginActive = initialState ? initialState.subsection === 'login' : false;
    let isSectionAccessibilityActive = initialState ? initialState.subsection === 'accessibility' : false;
    let isSectionPurchaseHistoryActive = initialState ? initialState.subsection === 'purchaseHistory' : false;

    // --- Element Selectors ---
    const toggleOptionsButton = document.querySelector('[data-action="toggleModuleOptions"]');
    const moduleOptions = document.querySelector('[data-module="moduleOptions"]');
    const toggleSurfaceButton = document.querySelector('[data-action="toggleModuleSurface"]');
    const moduleSurface = document.querySelector('[data-module="moduleSurface"]');
    const surfaceMain = document.querySelector('[data-surface-type="main"]');
    const surfaceSettings = document.querySelector('[data-surface-type="settings"]');
    const sectionHome = document.querySelector('[data-section="sectionHome"]');
    const sectionExplore = document.querySelector('[data-section="sectionExplore"]');
    const sectionSettings = document.querySelector('[data-section="sectionSettings"]');
    const sectionProfile = document.querySelector('[data-section="sectionProfile"]');
    const sectionLogin = document.querySelector('[data-section="sectionLogin"]');
    const sectionAccessibility = document.querySelector('[data-section="sectionAccessibility"]');
    const sectionPurchaseHistory = document.querySelector('[data-section="sectionPurchaseHistory"]');
    const toggleSectionHomeButton = document.querySelector('[data-action="toggleSectionHome"]');
    const toggleSectionExploreButton = document.querySelector('[data-action="toggleSectionExplore"]');
    const toggleSectionSettingsButton = document.querySelector('[data-action="toggleSectionSettings"]');
    const toggleSectionPurchaseHistoryButton = document.querySelector('[data-action="toggleSectionPurchaseHistory"]');
    const toggleSectionHomeFromSettingsButton = document.querySelector('[data-action="toggleSectionHomeFromSettings"]');
    const toggleSectionProfileButton = document.querySelector('[data-action="toggleSectionProfile"]');
    const toggleSectionLoginButton = document.querySelector('[data-action="toggleSectionLogin"]');
    const toggleSectionAccessibilityButton = document.querySelector('[data-action="toggleSectionAccessibility"]');
    const toggleSectionPurchaseHistoryFromSettingsButton = document.querySelector('[data-action="toggleSectionPurchaseHistoryFromSettings"]');

    if (!toggleOptionsButton || !moduleOptions || !toggleSurfaceButton || !moduleSurface || !sectionHome || !sectionExplore || !sectionSettings) return;

    const menuContentOptions = moduleOptions.querySelector('.menu-content');

    // Setup browser navigation handling
    setInitialHistoryState();
    setupPopStateHandler((section, subsection, updateHistory) => {
        handleNavigationChange(section, subsection, updateHistory);
    });

    const updateLogState = () => {
        const toState = (active) => active ? '✅ Activo' : '❌ Inactivo';
        const tableData = {
            '── Modules ──': { section: 'Module Options', status: toState(isModuleOptionsActive) },
            ' ': { section: 'Module Surface', status: toState(isModuleSurfaceActive) },
            '── Sections ──': { section: 'Home', status: toState(isSectionHomeActive) },
            '  ': { section: 'Explore', status: toState(isSectionExploreActive) },
            '   ': { section: 'Settings', status: toState(isSectionSettingsActive) },
            '── Sub-sections (Settings) ──': { section: 'Profile', status: toState(isSectionProfileActive) },
            '    ': { section: 'Login', status: toState(isSectionLoginActive) },
            '     ': { section: 'Accessibility', status: toState(isSectionAccessibilityActive) },
            '      ': { section: 'Purchase History', status: toState(isSectionPurchaseHistoryActive) },
        };
        console.group("ProjectLeviathan - State Overview");
        console.table(tableData);
        console.groupEnd();
    };

    const setMenuOptionsClosed = () => {
        moduleOptions.classList.add('disabled');
        moduleOptions.classList.remove('active');
        menuContentOptions.classList.add('disabled');
        menuContentOptions.classList.remove('active');
        isModuleOptionsActive = false;
    };

    const setMenuOptionsOpen = () => {
        if (!allowMultipleActiveModules && isModuleSurfaceActive) {
            setMenuSurfaceClosed();
        }
        moduleOptions.classList.remove('disabled');
        moduleOptions.classList.add('active');
        menuContentOptions.classList.remove('disabled');
        isModuleOptionsActive = true;
    };

    const closeMenuOptions = () => {
        if (isAnimating || !isModuleOptionsActive) return false;

        if (window.innerWidth <= 468 && menuContentOptions) {
            isAnimating = true;
            menuContentOptions.removeAttribute('style');
            moduleOptions.classList.remove('fade-in');
            moduleOptions.classList.add('fade-out');
            menuContentOptions.classList.remove('active');

            moduleOptions.addEventListener('animationend', () => {
                setMenuOptionsClosed();
                moduleOptions.classList.remove('fade-out');
                isAnimating = false;
            }, { once: true });
        } else {
            setMenuOptionsClosed();
        }
        return true;
    };

    const openMenuOptions = () => {
        if (isAnimating || isModuleOptionsActive) return false;

        setMenuOptionsOpen();

        if (window.innerWidth <= 468 && menuContentOptions) {
            isAnimating = true;
            moduleOptions.classList.remove('fade-out');
            moduleOptions.classList.add('fade-in');

            requestAnimationFrame(() => {
                menuContentOptions.classList.add('active');
            });

            moduleOptions.addEventListener('animationend', () => {
                moduleOptions.classList.remove('fade-in');
                isAnimating = false;
            }, { once: true });
        } else {
            menuContentOptions.classList.add('active');
        }
        return true;
    };

    const setMenuSurfaceClosed = () => {
        moduleSurface.classList.add('disabled');
        moduleSurface.classList.remove('active');
        surfaceMain.classList.add('disabled');
        surfaceMain.classList.remove('active');
        surfaceSettings.classList.add('disabled');
        surfaceSettings.classList.remove('active');
        isModuleSurfaceActive = false;
    };

    const setMenuSurfaceOpen = () => {
        if (!allowMultipleActiveModules && isModuleOptionsActive) {
            setMenuOptionsClosed();
        }
        moduleSurface.classList.remove('disabled');
        moduleSurface.classList.add('active');
        isModuleSurfaceActive = true;

        if (isSectionSettingsActive) {
            surfaceSettings.classList.remove('disabled');
            surfaceSettings.classList.add('active');
        } else {
            surfaceMain.classList.remove('disabled');
            surfaceMain.classList.add('active');
        }
    };

    const closeMenuSurface = () => {
        if (!isModuleSurfaceActive) return false;
        setMenuSurfaceClosed();
        return true;
    };

    const openMenuSurface = () => {
        if (isModuleSurfaceActive) return false;
        setMenuSurfaceOpen();
        return true;
    };

    const updateMainMenuButtons = (activeButton) => {
        [toggleSectionHomeButton, toggleSectionExploreButton].forEach(button => {
            if (button) button.classList.remove('active');
        });
        if (activeButton) {
            activeButton.classList.add('active');
        }
    };

    const updateSettingsMenuButtons = (activeButton) => {
        [toggleSectionProfileButton, toggleSectionLoginButton, toggleSectionAccessibilityButton, toggleSectionPurchaseHistoryFromSettingsButton].forEach(button => {
            if (button) button.classList.remove('active');
        });
        if (activeButton) {
            activeButton.classList.add('active');
        }
    };

    const setSectionActive = (sectionToShow, sectionsToHide, activeStateSetter, updateUrl = true) => {
        sectionToShow.classList.remove('disabled');
        sectionToShow.classList.add('active');
        sectionsToHide.forEach(section => {
            section.classList.add('disabled');
            section.classList.remove('active');
        });

        isSectionHomeActive = activeStateSetter === 'home';
        isSectionExploreActive = activeStateSetter === 'explore';
        isSectionSettingsActive = activeStateSetter === 'settings';

        if (activeStateSetter !== 'settings') {
            isSectionProfileActive = false;
            isSectionLoginActive = false;
            isSectionAccessibilityActive = false;
            isSectionPurchaseHistoryActive = false;
        }

        if (isSectionSettingsActive) {
            surfaceMain.classList.add('disabled');
            surfaceMain.classList.remove('active');
            surfaceSettings.classList.remove('disabled');
            surfaceSettings.classList.add('active');
        } else {
            surfaceSettings.classList.add('disabled');
            surfaceSettings.classList.remove('active');
            surfaceMain.classList.remove('disabled');
            surfaceMain.classList.add('active');
        }

        if (updateUrl) {
            const subsection = isSectionSettingsActive ? (isSectionProfileActive ? 'profile' : isSectionLoginActive ? 'login' : isSectionAccessibilityActive ? 'accessibility' : 'purchaseHistory') : null;
            navigateToUrl(activeStateSetter, subsection);
        }
    };

    const setSubSectionActive = (sectionToShow, sectionsToHide, buttonToActivate, buttonsToDeactivate, activeStateSetter, updateUrl = true) => {
        sectionToShow.classList.remove('disabled');
        sectionToShow.classList.add('active');
        sectionsToHide.forEach(section => {
            section.classList.add('disabled');
            section.classList.remove('active');
        });

        buttonToActivate.classList.add('active');
        buttonsToDeactivate.forEach(button => {
            button.classList.remove('active');
        });

        isSectionProfileActive = activeStateSetter === 'profile';
        isSectionLoginActive = activeStateSetter === 'login';
        isSectionAccessibilityActive = activeStateSetter === 'accessibility';
        isSectionPurchaseHistoryActive = activeStateSetter === 'purchaseHistory';

        if (updateUrl) {
            navigateToUrl('settings', activeStateSetter);
        }
    };

    const handleNavigationChange = (section, subsection = null, updateUrl = true) => {
        if (section === 'home') {
            setSectionActive(sectionHome, [sectionExplore, sectionSettings], 'home', updateUrl);
            updateMainMenuButtons(toggleSectionHomeButton);
        } else if (section === 'explore') {
            setSectionActive(sectionExplore, [sectionHome, sectionSettings], 'explore', updateUrl);
            updateMainMenuButtons(toggleSectionExploreButton);
        } else if (section === 'settings') {
            setSectionActive(sectionSettings, [sectionHome, sectionExplore], 'settings', updateUrl);
            
            const sub = subsection || 'profile';
            if (sub === 'profile') {
                setSubSectionActive(sectionProfile, [sectionLogin, sectionAccessibility, sectionPurchaseHistory], 
                    toggleSectionProfileButton, [toggleSectionLoginButton, toggleSectionAccessibilityButton, toggleSectionPurchaseHistoryFromSettingsButton], 'profile', updateUrl);
            } else if (sub === 'login') {
                setSubSectionActive(sectionLogin, [sectionProfile, sectionAccessibility, sectionPurchaseHistory], 
                    toggleSectionLoginButton, [toggleSectionProfileButton, toggleSectionAccessibilityButton, toggleSectionPurchaseHistoryFromSettingsButton], 'login', updateUrl);
            } else if (sub === 'accessibility') {
                setSubSectionActive(sectionAccessibility, [sectionProfile, sectionLogin, sectionPurchaseHistory], 
                    toggleSectionAccessibilityButton, [toggleSectionProfileButton, toggleSectionLoginButton, toggleSectionPurchaseHistoryFromSettingsButton], 'accessibility', updateUrl);
            } else if (sub === 'purchaseHistory') {
                setSubSectionActive(sectionPurchaseHistory, [sectionProfile, sectionLogin, sectionAccessibility], 
                    toggleSectionPurchaseHistoryFromSettingsButton, [toggleSectionProfileButton, toggleSectionLoginButton, toggleSectionAccessibilityButton], 'purchaseHistory', updateUrl);
            }
        }
        
        if (window.innerWidth <= 468) {
            closeMenuSurface();
            closeMenuOptions();
        }
        
        updateLogState();
    };

    const handleResize = () => {
        if (isModuleOptionsActive) {
            if (window.innerWidth <= 468) {
                if (!menuContentOptions.classList.contains('active')) {
                    menuContentOptions.classList.add('active');
                }
            } else {
                menuContentOptions.classList.remove('active');
                menuContentOptions.removeAttribute('style');
            }
        }
    };

    // Event Listeners
    toggleOptionsButton.addEventListener('click', (e) => {
        e.stopPropagation();
        isModuleOptionsActive ? closeMenuOptions() : openMenuOptions();
        updateLogState();
    });

    toggleSurfaceButton.addEventListener('click', (e) => {
        e.stopPropagation();
        isModuleSurfaceActive ? closeMenuSurface() : openMenuSurface();
        updateLogState();
    });

    // Main navigation
    if (toggleSectionHomeButton) {
        toggleSectionHomeButton.addEventListener('click', () => {
            if (!isSectionHomeActive) {
                handleNavigationChange('home');
            }
        });
    }

    if (toggleSectionExploreButton) {
        toggleSectionExploreButton.addEventListener('click', () => {
            if (!isSectionExploreActive) {
                handleNavigationChange('explore');
            }
        });
    }

    // Navigation from options menu
    if (toggleSectionSettingsButton) {
        toggleSectionSettingsButton.addEventListener('click', () => {
            handleNavigationChange('settings', 'profile');
            closeMenuOptions();
        });
    }

    if (toggleSectionPurchaseHistoryButton) {
        toggleSectionPurchaseHistoryButton.addEventListener('click', () => {
            handleNavigationChange('settings', 'purchaseHistory');
            closeMenuOptions();
        });
    }

    // Navigation from settings surface
    if (toggleSectionHomeFromSettingsButton) {
        toggleSectionHomeFromSettingsButton.addEventListener('click', () => {
            handleNavigationChange('home');
        });
    }

    if (toggleSectionProfileButton) {
        toggleSectionProfileButton.addEventListener('click', () => {
            if (!isSectionProfileActive) {
                handleNavigationChange('settings', 'profile');
            }
        });
    }

    if (toggleSectionLoginButton) {
        toggleSectionLoginButton.addEventListener('click', () => {
            if (!isSectionLoginActive) {
                handleNavigationChange('settings', 'login');
            }
        });
    }

    if (toggleSectionAccessibilityButton) {
        toggleSectionAccessibilityButton.addEventListener('click', () => {
            if (!isSectionAccessibilityActive) {
                handleNavigationChange('settings', 'accessibility');
            }
        });
    }

    if (toggleSectionPurchaseHistoryFromSettingsButton) {
        toggleSectionPurchaseHistoryFromSettingsButton.addEventListener('click', () => {
            if (!isSectionPurchaseHistoryActive) {
                handleNavigationChange('settings', 'purchaseHistory');
            }
        });
    }

    // Click outside to close menus
    if (closeOnClickOutside) {
        document.addEventListener('click', (e) => {
            if (isAnimating) return;
            let optionsStateChanged = false;
            let surfaceStateChanged = false;

            if (isModuleOptionsActive) {
                if (window.innerWidth <= 468) {
                    if (e.target === moduleOptions) {
                        optionsStateChanged = closeMenuOptions();
                    }
                } else {
                    if (!moduleOptions.contains(e.target) && !toggleOptionsButton.contains(e.target)) {
                        optionsStateChanged = closeMenuOptions();
                    }
                }
            }

            if (isModuleSurfaceActive && !moduleSurface.contains(e.target) && !toggleSurfaceButton.contains(e.target)) {
                surfaceStateChanged = closeMenuSurface();
            }

            if (optionsStateChanged || surfaceStateChanged) {
                updateLogState();
            }
        });
    }

    // Close with Escape key
    if (closeOnEscape) {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const optionsClosed = closeMenuOptions();
                const surfaceClosed = closeMenuSurface();
                if (optionsClosed || surfaceClosed) {
                    updateLogState();
                }
            }
        });
    }

    window.addEventListener('resize', handleResize);
    initDragController(closeMenuOptions, () => isAnimating);
    
    // Initialize state based on current URL
    updateLogState();
    console.log('ProjectLeviathan initialized with URL routing support');
}

export { initMainController };