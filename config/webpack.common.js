const path = require('path');
const webpack = require('webpack');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry: {
		main: './src/js/index.js',
		// target addon location as a shortcut fo development if addon gets not reinstalled
		'../../../assets/addons/contact_campaign/js/addon.contact_campaign': './src/js/addon.contact_campaign',
		// initial addon location. From there the files is being processed while installation routine
		'../../../redaxo/src/addons/contact_campaign/assets/js/addon.contact_campaign': './src/js/addon.contact_campaign'
    },
    output: {
		filename: 'js/[name][id].bundle.js',
		// path to use for the standalone FE package
		//path: path.resolve(__dirname, '../resources/dist')
		// path to use for separate backend package location 
		path: path.resolve(__dirname, '../../../terzozentrum-relaunch/docker-redaxo-5-9/html/resources/dist')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader"
                }
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'img/[name].[ext]'
                        }
                    }
                ]
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'font/[name].[ext]'
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        new HtmlWebpackPlugin({ template: './src/static/index.html' }),
        new webpack.ProvidePlugin({
            jQuery: 'jquery',
            $: 'jquery',
            jquery: 'jquery',
            'window.$': 'jquery',
            'window.jQuery': 'jquery',
        })
    ]
};