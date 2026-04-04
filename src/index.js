import './styles/style.scss';

// document.addEventListener('DOMContentLoaded', () => {
//     const headerInner = document.querySelector('.header--sidekick');
//     const logo = document.querySelector('.wp-block-site-logo');
//     // We target the inner ul container, not the whole nav block
//     const navContainer = document.querySelector('.wp-block-navigation__container');
//
//     if (!headerInner || !navContainer) return;
//
//     // Buffer space (to account for flex gap and safe breathing room)
//     const BUFFER = 80;
//     let requiredDesktopWidth = 0;
//
//     // Function to calculate how much horizontal space the items actually need
//     const calculateRequiredWidth = () => {
//         const logoWidth = logo ? logo.offsetWidth : 0;
//
//         // We only measure the nav if it's currently in desktop mode
//         if (window.getComputedStyle(navContainer).display !== 'none') {
//             // CRITICAL FIX: Use scrollWidth instead of offsetWidth
//             const navWidth = navContainer.scrollWidth;
//             return logoWidth + navWidth + BUFFER;
//         }
//         return requiredDesktopWidth; // Fallback to last known width
//     };
//
//     // The observer watches the header for pixel-perfect size changes
//     const observer = new ResizeObserver((entries) => {
//         const availableWidth = entries[0].contentRect.width;
//
//         // Update our required width ONLY when the desktop menu is visible
//         if (!headerInner.classList.contains('force-mobile-menu')) {
//             requiredDesktopWidth = calculateRequiredWidth();
//         }
//
//         // The Collision Logic
//         if (availableWidth < requiredDesktopWidth && requiredDesktopWidth > 0) {
//             headerInner.classList.add('force-mobile-menu');
//         } else {
//             headerInner.classList.remove('force-mobile-menu');
//         }
//     });
//
//     // Start watching the header
//     observer.observe(headerInner);
// });
