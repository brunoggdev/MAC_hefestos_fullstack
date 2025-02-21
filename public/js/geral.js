/// <reference path="jquery.min.js" />
/// <reference path="helpers_hefestos.js" />
'use strict'; 
/**linhas auxiliares acima, evite apagar. @author Brunoggdev*/

(() => {
    'use strict'

    const getStoredTheme = () => localStorage.getItem('theme')
    const setStoredTheme = theme => localStorage.setItem('theme', theme)

    const getPreferredTheme = () => {
        const storedTheme = getStoredTheme()
        if (storedTheme) {
            return storedTheme
        }
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    }

    const setTheme = theme => {
        if (theme === 'auto') {
            document.documentElement.setAttribute(
                'data-bs-theme',
                window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            )
        } else {
            document.documentElement.setAttribute('data-bs-theme', theme)
        }
    }

    // Initialize theme and set the switcher's checked state
    const currentTheme = getPreferredTheme()
    setTheme(currentTheme)
    document.getElementById('theme-toggle').checked = currentTheme === 'dark'

    // Add event listener for the dark/light theme toggle
    document.getElementById('theme-toggle').addEventListener('change', (event) => {
        const theme = event.target.checked ? 'dark' : 'light'
        setStoredTheme(theme)
        setTheme(theme)
    })

    // Sync with system preferences
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        const storedTheme = getStoredTheme()
        if (!storedTheme || storedTheme === 'auto') {
            setTheme(getPreferredTheme())
        }
    })

    // Bootswatch theme link element
    const bootswatchLink = document.getElementById('bootswatch-link')

    // Function to change the Bootswatch theme
    const changeBootswatchTheme = (theme) => {
        bootswatchLink.href = `https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/${theme}/bootstrap.min.css`
        localStorage.setItem('bootswatch-theme', theme)
    }

    // Initialize the Bootswatch theme based on the stored preference or default to 'lumen'
    const storedBootswatchTheme = localStorage.getItem('bootswatch-theme') || 'lumen'
    changeBootswatchTheme(storedBootswatchTheme)

    // Add event listener for the Bootswatch theme selector
    document.getElementById('bootswatch-select').addEventListener('change', (event) => {
        const selectedTheme = event.target.value
        changeBootswatchTheme(selectedTheme)
    })

})()
