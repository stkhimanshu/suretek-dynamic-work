<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet" />

<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1"
    rel="stylesheet" />

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<script>
    tailwind.config = {

        darkMode: "class",

        theme: {
            extend: {

                colors: {

                    primary: "#004e9f",

                    tertiary: "#004f9e",

                    "inverse-surface": "#27313f",

                    "surface": "#f8f9ff",

                    "surface-container-low": "#eff4ff",

                    "surface-container": "#e6eeff",

                    "outline-variant": "#c1c6d5",

                    "on-surface": "#121c2a",

                    "surface-variant": "#d9e3f6",

                    "primary-container": "#0066cc",

                    "tertiary-container": "#2b68ba",

                    "error": "#ba1a1a",

                    "error-container": "#ffdad6",

                },

                spacing: {
                    gutter: "24px",
                    sidebar_width: "280px",
                    container_padding: "32px",
                    card_padding: "20px",
                },

                fontFamily: {
                    sans: ["Inter"],
                }

            }
        }
    }
</script>