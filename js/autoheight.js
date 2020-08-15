/**
 * from http://dtp.jdash.info/archives/jQuery_iframe_auto_height_script
 */
(function(window, $) {
    $(window).on(
            "load",
            function() {
                $('iframe.tFrame').each(
                        function() {
                            var D = $(this).get(0).contentWindow.document;
                            /*
                             * console.log( D.body.scrollHeight,
                             * D.documentElement.scrollHeight,
                             * D.body.offsetHeight,
                             * D.documentElement.offsetHeight,
                             * D.body.clientHeight,
                             * D.documentElement.clientHeight );
                             */
                            var innerHeight = Math.min(D.body.scrollHeight,
                                    D.documentElement.scrollHeight - 120,
                                    D.body.offsetHeight - 120,
                                    D.documentElement.offsetHeight - 120,
                                    D.body.clientHeight - 120,
                                    D.documentElement.clientHeight - 120);
                            // $(this).removeAttr("height").css('height',
                            // innerHeight + 'px');
                            $(this).removeAttr("height").css('height',
                                    $(window).height() - 110 + 'px');
                        });
            });
})(window, jQuery);