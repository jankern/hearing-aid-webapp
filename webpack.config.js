// Webpack config to organize and build web frontend code 

// Require modulea and plugins
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');

// Set the npm runtime environment based on npm script call
let runtimeMode = { 'build-dev': 'development', 'build': 'production' };
const env = process.env.npm_lifecycle_event !== undefined ? runtimeMode[process.env.npm_lifecycle_event] : 'production';

// Setup the config object as function
module.exports = () => {

    // Config object
    let config = {};

    // Entry files to be bundled
    config.entry = {
        'vendor': ['materialize-css', 'materialize-css/dist/css/materialize.css'],
        'custom': './src/js/index.js',
        '/../../../redaxo/src/addons/contact_campaign/assets/js/addon_contact_campaign': './redaxo/src/addons/contact_campaign/src/js/addon_contact_campaign.js'
    };

    // Assigning runtime environment to the mode variable
    config.mode = env;

    // Output definition for location and filename of the bundle files
    config.output = {
        path: path.resolve(__dirname, 'resources/dist'),
        filename: 'js/[name].bundle.js',
    };

    // Plugin array to assign custom plgins to the bundle process
    config.plugins = [];

    config.plugins.push(

        // Automated assignment if bundling files to an index.html -> the file can be opened in a browser for test porposes
        new HtmlWebpackPlugin({
            template: './src/static/index.html',
            baseUrl: './',
            inject: 'body'
        }),

        // Write the css income stream to css bundle file(s)
        new MiniCssExtractPlugin({
            filename: 'css/[name].bundle.css',
            chunkFilename: 'css/[id].bundle.css'
        }),

        // Plugin to copy static web content (files without reference to js or scss files)
        new CopyWebpackPlugin([{
            from: path.join(__dirname, './src/static')
        }])
    );

    // Module object to keep the info how resources are being loaded
    config.module = {
        rules: [
            {
                // Rules how to process JS code
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
            , {
                // Rules how to process CSS/SCSS code
                test: /\.(sa|sc|c)ss$/,
                use: [
                    env !== 'production' ? 'style-loader' : MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader',
                ],
            }, {
                // Rules how to process images
                test: /\.(png|jpg|jpeg|gif)$/,
                loader: {
                    loader: 'file-loader',
                    options: {
                        publicPath: '/resources/dist/',
                        name: env !== 'production' ? 'img/[name].[ext]' : 'img/[name].[ext]'
                    }
                }
            }, {
                // Rules how to process font files
                test: /\.(svg|woff|woff2|ttf|eot)$/,
                loader: {
                    loader: 'file-loader',
                    options: {
                        publicPath: '/resources/dist/', 
                        name: env !== 'production' ? 'fonts/[name].[ext]' : 'fonts/[name].[ext]'
                    }
                }
            }, {
                // Rules how to process pure html code called by js code
                test: /\.html$/,
                loader: 'raw-loader'
            }
        ]
    };

    // Dev tool - source maps will be used in test/dev mode 
    if (env === 'development') {
        config.devtool = 'inline-source-map';
    }

    // Dev server - can be used while development ($ npm run build-dev)
    config.devServer = {
        contentBase: [path.join(__dirname, 'resources/dist'), path.join(__dirname, '')],
        compress: true,
        port: 9000,
        open: true,
    }

    // Return the config object
    return config;
}
