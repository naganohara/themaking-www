const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const extractSass = new ExtractTextPlugin({
    filename: "[name].css",
    disable: process.env.NODE_ENV === "development"
});

const exposeLoader = function (module, globals) {
    return {
        test: require.resolve(module),
        use: [].concat(globals).map(global => {
            return {
                loader: 'expose-loader',
                options: global,
            }
        })
    };
};

const ruleSourceMap = {
    test: /\.js$/,
    use: ["source-map-loader"],
    enforce: "pre"
};

const ruleSass = {
    test: /\.scss$/,
    use: extractSass.extract({
        use: [{
            loader: "css-loader",
            options: {sourceMap: true}
        }, {
            loader: "sass-loader",
            options: {sourceMap: true}
        }],
        // use style-loader in development
        fallback: "style-loader"
    })
};

const ruleBabel = {
    test: /\.js$/,
    exclude: /(node_modules|bower_components)/,
    use: {
        loader: 'babel-loader',
        options: {
            presets: ["env"]
        }
    }
};

const ruleJQuery = exposeLoader('jquery', ['jQuery', '$']);
const rulePopper = exposeLoader('popper.js', ['Popper']);

module.exports = {
    context: path.resolve(__dirname, 'resources/assets/'),
    entry: {
        app: './js/app.js',
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'public/assets')
    },
    module: {
        rules: [ruleBabel, ruleSass, ruleJQuery, rulePopper, ruleSourceMap]
    },
    plugins: [extractSass],
    devtool: "source-map",
};
