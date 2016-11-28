<? if ( is_user_logged_in() ) { ?>
    <style>
        body:after {
            position: fixed;
            bottom: 0;
            right: 0;
            z-index: 1001;
            color: #fff;
            background: rgba(0, 0, 0, .8);
            opacity: .8;
            font: 12px/12px sans-serif;
            padding: .5em .75em;
            pointer-events: none;
            content: "xs / min-width: 0"
        }

        @media (min-width: 480px) {
            body:after {
                content: "xs / min-width: 480px"
            }
        }

        @media (min-width: 768px) {
            body:after {
                content: "sm / min-width: 768px"
            }
        }

        @media (min-width: 992px) {
            body:after {
                content: "md / min-width: 992px"
            }
        }

        @media (min-width: 1200px) {
            body:after {
                content: "lg / min-width: 1200px"
            }
        }
    </style>
<? } ?>

<?php if ( isset( $data ) ): ?>
    <script>
        console.log(<?= json_encode( $data ) ?>)
    </script>
<?php endif; ?>
