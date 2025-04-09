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
        const newHref = `https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/${theme}/bootstrap.min.css`
    
        // Create a temp link to preload the new theme
        const tempLink = document.createElement('link')
        tempLink.rel = 'stylesheet'
        tempLink.href = newHref
        tempLink.onload = () => {
            bootswatchLink.href = newHref
            localStorage.setItem('bootswatch-theme', theme)
            setTimeout(() => {
                tempLink.remove() // clean up
            }, 200);
        }
    
        document.head.appendChild(tempLink)
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
