<script>
    const initialTheme = localStorage.getItem("data-bs-theme") || "light";
    document.documentElement.setAttribute("data-bs-theme", initialTheme);
       // Set default class name based on the initial theme

    // Function to set theme mode and update Local Storage
    const setThemeMode = (mode) => {
        // Set theme mode in html tag attribute data-bs-theme
        document.documentElement.setAttribute("data-bs-theme", mode);
        // Save theme state into Local Storage
        localStorage.setItem("data-bs-theme", mode);
    };

    document.addEventListener('DOMContentLoaded', function() {
        const themeToggleButton = document.querySelector('.theme-selected-mode');

        // Function to handle the theme toggle
        const handleThemeToggle = () => {
            let currentTheme = localStorage.getItem("data-bs-theme");
            const newTheme = (currentTheme === 'dark') ? 'light' : 'dark';

            // Update the icon based on the selected theme
            const iconElement = themeToggleButton.querySelector('.theme-mode');
            setThemeMode(newTheme);
            if (newTheme === 'dark') {
                iconElement.classList.remove('bx-sun');
                iconElement.classList.add('bx-moon');
            } else {
                iconElement.classList.remove('bx-moon');
                iconElement.classList.add('bx-sun');

            }
        };

        // Add click event listener to the theme toggle button
        themeToggleButton.addEventListener('click', handleThemeToggle);
    });
</script>
<!doctype html>
<html data-layout="vertical" data-bs-theme="" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" lang="{{ app()->getLocale() }}" @if(app()->isLocale('ar')) dir="rtl" @endif>