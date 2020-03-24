const path = require('path');
var ModernizrWebpackPlugin = require('modernizr-webpack-plugin');
// require('imports?this=>window!modernizr/modernizr.js');

module.exports = {
    mode: 'production',
    entry: './local/templates/sitaraNew/js/all.js',
    output: {
        filename: 'build.js',
        path: path.resolve(__dirname , './local/templates/sitaraNew/js'),
    }, module: {
        rules: [
            {
                test: /jquery\.gray\.min\.js/,
                loader: 'imports-loader?this=>window!exports-loader?window.Modernizr'
            }
        ]
  },
    plugins: [
        new ModernizrWebpackPlugin()
    ]
};