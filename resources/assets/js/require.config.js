require.config({
    baseUrl: '/resources/assets/js',
    paths: {
        'jquery': 'lib/jquery/dist/jquery',
        'bootstrap': 'lib/bootstrap/dist/js/bootstrap'
    },
    shim: {
        'jquery': {
            'exports': '$'
        },
        'bootstrap': {
            'deps': [
                'jquery'
            ]
        }
    }
});
