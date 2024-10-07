const Encore = require('@symfony/webpack-encore');
const path = require('path');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './src/TournamentManagement/Infrastructure/Presentation/Resources/assets/js/app.js')
    .addStyleEntry('styles', './src/TournamentManagement/Infrastructure/Presentation/Resources/assets/styles/base.scss')
    .enableStimulusBridge('./src/TournamentManagement/Infrastructure/Presentation/Resources/assets/controllers.json')
    .copyFiles({
        from: './src/TournamentManagement/Infrastructure/Presentation/Resources/assets/images',
        to: 'images/[path][name].[hash:8].[ext]',
    })
    .enableSassLoader()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })
    .configureBabelPresetEnv((options) => {
        options.useBuiltIns = 'usage';
        options.corejs = 3;
    })
    .enableSingleRuntimeChunk();

module.exports = Encore.getWebpackConfig();
