<!DOCTYPE html>
<html>
<head>
    <title>Redoc</title>
    <!-- needed for adaptive design -->
    <meta charset="utf-8"/>
    <link rel="icon" href="{{ asset('landing/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:300,400,700"
            rel="stylesheet"
    />

    <!--
    Redoc doesn't change outer page styles
    -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<!--
Redoc element with link to your OpenAPI definition
-->
<redoc spec-url="{{ url('/documentationFile') }}"></redoc>
<!--
Link to Redoc JavaScript on CDN for rendering standalone element
-->
<script src="https://cdn.redoc.ly/redoc/latest/bundles/redoc.standalone.js"></script>

<style>
    .sc-fujyAs + p {
        display: none;
    }

    .kfOTos {
        display: none !important;
    }

    .dolNKP {
        display: flex;
        justify-content: space-between;
    }

    .dYGhuI {
        width: 30%;
    }

    .bCOLCR {
        width: calc((100% - 450px) * 0.4) !important;
    }

    .sc-kizEQm {
        display: none;
    }

    .title_block {
        max-height: 0.5rem;
        display: flex;
        align-items: baseline;
    }

    .ml-1-2 {
        margin-left: 0.5rem;
    }

    .mobi_pay_logo {
        position: absolute;
        top: 3rem;
        left: 30rem;
    }

    @media (max-width: 1025px) {
        .dYGhuI {
            width: 100%;
        }
    }

</style>
</body>
</html>
