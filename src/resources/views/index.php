<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHPChallenge - S2IT - Fabricio Rodrigues</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/yjsg.yjsgroundprogress.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.queryloader2.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.caroufredsel.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.resize.js"></script>
    <script src="js/SmoothScroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/scripts.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="onepage front" data-spy="scroll" data-target="#top" data-offset="100">
    <div id="load"></div>
    <div id="main">
        <div id="home">
            <div id="top">
                <div class="top2_wrapper" id="top2">
                    <div class="container">
                        <div class="top2 clearfix">
                            <header>
                                <div class="logo_wrapper">
                                    <a href="/" class="logo scroll-to">
                                        <img src="images/PHPChallengeS2IT.png" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </header>
                            <div class="navbar navbar_ navbar-default">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="navbar-collapse navbar-collapse_ collapse">
                                    <ul class="nav navbar-nav sf-menu clearfix">
                                        <li><a href="/">Home</a></li>
										<li><a href="/Manage">Manage Authentication</a></li>
                                        <li><a href="/docs">Documentation</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">

                    <div class="title1 animated" data-animation="fadeInUp" data-animation-delay="200">PHPChallenge - S2IT - Fabricio Rodrigues</div>

                    <br>
                    <br>
                    <div class="row about1 clearfix animated" data-animation="fadeInUp" data-animation-delay="200">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                            <div class="title2" style="color: #fff; font-family: 'Montserrat';">Select the XML files from your computer:</div>
                            <div class="point-border">
                                <form action="/" method="post" enctype="multipart/form-data" id="upload-form">
                                    <input type="text" name="file" id="file" class="new-file" style="color: #35373e; font-family: 'Montserrat';" placeholder="There's no file(s) selected" readonly="readonly">
                                    <input type="button" class="btn btn-info new-button" style="color: #fff; font-family: 'Montserrat';" value="Select File(s)">
                                    <input type="file" name="files[]" id="upload-field" multiple="" accept=".xml" style="display:none" class="new-arquivo"/>
                                    <button type="submit" class="btn btn-success" style="color: #fff; font-family: 'Montserrat';" id="upload-button" data-loading-text="Uploading...">Upload Files</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row about1 clearfix animated" data-animation="fadeInUp" data-animation-delay="200">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                            <div class="title2" style="color: #fff; font-family: 'Montserrat';">Or drag and drop the XML files:</div>
                            <div id="drop-files" class="dotted-border-form">
                                <div class="title1 animated" data-animation="fadeInUp" data-animation-delay="200">Just drag and drop files here</div>
                            </div>
                            <?php if (!empty($type)): ?>
                                <div class="alert alert-<?php echo $type; ?>" style="font-family:'Montserrat';">
                                    <?php echo $message; ?>
                                </div>
                                <?php endif; ?>
                                <div id="msg-container" style="font-family:'Montserrat';padding-top: 1%"></div>
                        </div>
                    </div>

                    <br>
                    <br>

                </div>

            </div>
        </div>

        <div class="bot2">
            <div class="container">
                copyright &copy; 2018 PHPChallenge - All Rights Reserved
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.new-button').on('click', function() {
            $('.new-arquivo').trigger('click');
        });

        $('.new-arquivo').on('change', function() {
            var fileName = "";
            for(var i = 0; i < $(this)[0].files.length; i++) {
                switch(i) {
                    case 0: fileName = $(this)[0].files[i].name; break;
                    default: fileName = fileName + ', ' + $(this)[0].files[i].name; break
                }
            }
            $('#file').val(fileName);
        });
    </script>
    <script>
        (function() {
            'use strict';

            var dropFiles = $('#drop-files'),
                uploadField = $('#upload-field'),
                uploadForm = $('#upload-form'),
                uploadButton = $('#upload-button'),
                msgContainer = $('#msg-container');

            dropFiles.on('dragover drop', function(e) {

                e.preventDefault();
                e.stopPropagation();

            }).on('drop', function(e) {

                msgContainer.html("");

                $.each(e.originalEvent.dataTransfer.files, function(key, file) {
                    if (file.type === 'text/xml' || file.type === 'application/xml') {
                        msgContainer.append('<div class="alert alert-success">' + file.name + ' is ready to import!</div>');
                        uploadField[0].files = e.originalEvent.dataTransfer.files;
                    } else {
                        msgContainer.append('<div class="alert alert-danger">' + file.name + ' has an invalid extension.</div>');
                    }
                });

                setTimeout(() => {
                    msgContainer.hide('slow', function() {
                        msgContainer.html("");
                        msgContainer.show();
                    });
                }, 3000);
            });

            uploadForm.on('submit', function(e) {

                msgContainer.html("");

                if (uploadField[0].files.length == 0) {
                    e.preventDefault();
                    msgContainer.append('<div class="alert alert-danger">Select at least one file to import.</div>');
                } else {
                    uploadButton.button('loading');
                }
            });

        })();
    </script>
</body>

</html>
