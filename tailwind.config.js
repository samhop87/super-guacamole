module.exports = {
    theme: {
        fontFamily: {
            'display': ['"Press Start 2P"', 'cursive']
        },
        extend: {
            height: theme => ({
                "1/7": "14%",
                "1/8": "12.5%",
                "1/9": "11%",
            }),
        },
    },
    variants: { display: ["responsive", "hover", "focus"] },
    plugins: [],
}
