/**
 * WholeAuth SDK - Forms module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('forms', '0.1.0');
    // defaults options
    var $defaults = {
    url: 'module/upload',
    uploads: '#uploads',
    onupload: function(id) {
    }
    };
    // registred uploaders
    var $uploaders = [];
    // document flag
    var $onDocument = false;
    $this.uploader = function(selector, options) {
        // extend options
        var $options = $.extend($defaults, options);
        // check for 'drop' event on document
        if (!$onDocument)
            // add event
            _onDocument($options);
        // upload files
        $(selector).each(function() {
            // pointer
            var $uploader = $(this);
            // create form
            // add hidden form
            $uploader.append($('<form>'));
            // set actions
            $uploader.on('dragenter', function(e) {
                e.stopPropagation();
                e.preventDefault();
                $uploader.addClass('active');
            }).on('dragover', _die).on('drop', function(e) {
                e.stopPropagation();
                e.preventDefault();
                _handleUploads($uploader, $options, e.originalEvent.dataTransfer.files);
                $uploader.removeClass('active');
            });
            // register uploader
            $uploaders[$uploaders.length] = $uploader;
        });
    };
    var _onDocument = function($options) {
        // prevent 'drop' event on document
        $(document).on('gradenter', _die).on('dragover', function(e) {
            _die(e);
            for ( var i = 0; i < $uploaders.length; i++)
                $uploaders[i].removeClass('active');
        }).on('drop', _die);
        // change flag
        $onDocument = true;
    };
    var _die = function(e) {
        e.stopPropagation();
        e.preventDefault();
    };
    var _handleUploads = function($uploader, $options, $files) {
        for ( var i = 0; i < $files.length; i++) {
            var $form = new FormData();
            $form.append('file', $files[i]);
            //
            var $status = new _statusbar($uploader, $options.uploads);
            $status.setFileNameSize($files[i].name, $files[i].size);
            _uploadFile($form, $options.url, $status, $options.onupload);
        }
    };
    var _statusbar = function($uploader, $uploads) {
        this.statusbar = $('<div class="statusbar"/>');
        this.filename = $('<div class="filename"/>').appendTo(this.statusbar);
        this.size = $('<div class="size"/>').appendTo(this.statusbar);
        this.progressBar = $('<div class="progressbar"><div></div></div>').appendTo(this.statusbar);
        this.abort = $('<div class="abort"/>').appendTo(this.statusbar);
        if ($($uploads)[0] !== undefined)
            $($uploads).append(this.statusbar);
        this.setFileNameSize = function(name, size) {
            var sizeStr = "";
            var sizeKB = size / 1024;
            if (parseInt(sizeKB) > 1024) {
                var sizeMB = sizeKB / 1024;
                sizeStr = sizeMB.toFixed(2) + " MB";
            } else
                sizeStr = sizeKB.toFixed(2) + " KB";
            this.filename.html(name);
            this.size.html(sizeStr);
        };
        this.progress = function($percent) {
            this.progressBar.find('div').html($percent + "%").css({
                width: $percent + '%'
            });
            if (parseInt($percent) >= 100)
                this.abort.hide();
        };
        this.setAbort = function($upload) {
            var $statusBar = this.statusBar;
            this.abort.click(function() {
                $upload.abort();
                $statusBar.hide();
            });
        };
    };
    var _uploadFile = function($form, $url, $status, $callback) {
        // make upload
        var $upload = $.ajax({
        url: $url,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        data: $form,
        progress: function(e) {
            // get percent
            var $percent = Math.round((e.loaded / e.total) * 100);
            // update status
            $status.progress($percent);
        },
        success: function(data) {
            // update status to 100%
            $status.progress(100);
            // callback
            $callback(data.id);
        }
        });
        // bind abort
        $status.setAbort($upload);
    };
}(jQuery, WholeAuth));