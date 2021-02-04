module.exports = {
    theme: {
        fontFamily: {
            'display': ['"Press Start 2P"', 'cursive']
        },
        extend: {
            height: theme => ({
                "1/7": "14%",
                "2/7": "28%",
                "3/7": "42%",
                "4/7": "56%",
                "5/7": "70%",
                "6/7": "84%",
                "1/8": "12.5%",
                "7/8": "87.5%",
                "1/9": "11%",
            }),
        },
    },
    variants: { display: ["responsive", "hover", "focus"] },
    plugins: [],
}
