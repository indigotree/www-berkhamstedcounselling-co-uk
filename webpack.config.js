const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		index: './wp-content/themes/indigotree-theme-2025/assets/js/main.js',
		editor: './wp-content/themes/indigotree-theme-2025/assets/js/editor.js',
		style: './wp-content/themes/indigotree-theme-2025/assets/sass/main.css',
		'editor-style': './wp-content/themes/indigotree-theme-2025/assets/sass/editor.css',
		'admin-style': './wp-content/themes/indigotree-theme-2025/assets/sass/admin.css',
	},
	output: {
		...defaultConfig.output,
		path: path.resolve( __dirname, './wp-content/themes/indigotree-theme-2025/build' ),
		filename: '[name].js',
		chunkFilename: '[id].[contenthash].js',
	},
	plugins: [
		...defaultConfig.plugins.filter(
			( plugin ) => !( plugin instanceof MiniCssExtractPlugin )
		),
		new MiniCssExtractPlugin( {
			filename: '[name].css',
			chunkFilename: '[id].[contenthash].css',
		} ),
	],
};
