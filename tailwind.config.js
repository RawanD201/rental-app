/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/js/*.js",
    ],

    theme: {
        fill: (theme) => ({
            white: theme("colors.white"),
            "cGold-100": theme("colors.cGold.100"),
            "cGold-200": theme("colors.cGold.200"),
            "cGold-logo": theme("colors.cGold.300"),
            "cGray-400": theme("colors.cGray.400"),
        }),
        extend: {
            screens: {
                print: {
                    raw: 'print'
                },
                screen: {
                    raw: 'screen'
                }
            },
            fontFamily: {
                raber: ["raber", "nrt"],
            },
            colors: {
                cBlack: "#212529",
                cGray: {
                    100: "#f5f5f5",
                    200: "#B3B3B3",
                    300: "#595858",
                    400: "#343A40",
                    500: "#868E96",
                },
                cBlueGray: {
                    100: "#607D8B",
                },
                cBlue: {
                    100: "#5CC5CD",
                    200: "#46b6fe",
                    300: "#03A9F4",
                },
                cIndigo: {
                    100: "#9988ff",
                },
                cGold: {
                    100: "#1B98D5",
                    200: "#1B98D5",
                    300: "#0C4764",
                },
                cGreen: {
                    100: "#82c885",
                    200: "#8BC34A",
                    300: "#04BE5B",
                    400: "#009688",
                },
                cRed: {
                    100: "#EE2558",
                },
            },
            keyframes: {
                hideMessage: {
                    from: {
                        opacity: "1",
                    },
                    to: {
                        opacity: "0",
                    },
                },
                showMessage: {
                    from: {
                        opacity: "0",
                    },
                    to: {
                        opacity: "1",
                    },
                },
                leftNavClose: {
                    from: {
                        width: "225px",
                    },
                    to: {
                        width: "65px",
                    },
                },
                leftNavOpen: {
                    from: {
                        width: "65px",
                    },
                    to: {
                        width: "225px",
                    },
                },
                smallLeftNavClose: {
                    from: {
                        width: "180px",
                    },
                    to: {
                        width: "65px",
                    },
                },
                smallLeftNavOpen: {
                    from: {
                        width: "65px",
                    },
                    to: {
                        width: "180px",
                    },
                },
                bodyNavClose: {
                    from: {
                        "margin-inline-start": "225px",
                    },
                    to: {
                        "margin-inline-start": "50px",
                    },
                },
                bodyNavOpen: {
                    from: {
                        "margin-inline-start": "50px",
                    },
                    to: {
                        "margin-inline-start": "225px",
                    },
                },
                homeMenuOpen: {
                    from: {
                        transform: "translateY(-100%)",
                    },
                    to: {
                        transform: "translateY(-2px)",
                    },
                },
                homeMenuClose: {
                    from: {
                        transform: "translateY(-2px)",
                    },
                    to: {
                        transform: "translateY(-100%)",
                    },
                },
            },
            animation: {
                showMessage: "showMessage 500ms ease",
                hideMessage: "hideMessage 4s ease",
                navClose: "leftNavClose 350ms ease",
                navOpen: "leftNavOpen 350ms ease",
                smallNavClose: "smallLeftNavClose 350ms ease",
                smallNavOpen: "smallLeftNavOpen 350ms ease",
                bodyClose: "bodyNavClose 200ms ease",
                bodyOpen: "bodyNavOpen 200ms ease",
                homeMenuClose: "homeMenuClose 300ms ease-out",
                homeMenuOpen: "homeMenuOpen 300ms ease-out",
            },
        },
    },
};

